<template>
    <div v-if="showLoader" class="loader-container">
        <span class="loader"></span>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form class="pt-5" @submit="sendForm">
                    <div v-for="item in data" class="d-flex gap-4 mb-3 w-100">
                        <div class="w-50">
                            <label for="">key</label>
                            <input type="text" class="form-control" v-model="item.key">
                        </div>
                        <div class="w-50">
                            <label for="">value</label>
                            <input type="text" class="form-control" v-model="item.value">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">send</button>
                        <button type="button" class="btn btn-primary" @click="addRow">+</button>
                    </div>
                </form>
                <div v-if="result.length > 0">
                    <p>Result</p>
                    <pre>{{ result }}</pre>
                </div>
                <div v-if="resultIsEmpty">
                    <p>Список пуст</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
/* $offset: 187;
$duration: 1.4s; */

.loader-container {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader {
    width: 48px;
    height: 48px;
    border: 5px solid #000;
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
} 
</style>

<script>
import {reactive, toRefs} from "vue";
import axios from "axios";

export default {
    name: 'Home',
    components: {
    
    },

    setup(props) {
        const state = reactive({
            data: [
                {
                    key: "",
                    value: ""
                }
            ],
            showLoader: false,
            result: [],
            resultIsEmpty: false
        })

        const addRow = () => {
            state.data.push({key: '', value: ''})
        }

        const sendForm = (e) => {
            e.preventDefault()
            
            state.showLoader = true
            state.data = state.data.filter(item => item.key != '' && item.value != '')

            axios.post('/api/search', state.data).then((res) => {
                state.result = res.data
                if(res.data.length == 0) {
                    state.resultIsEmpty = true
                }
                else {
                    state.resultIsEmpty = false
                }
                state.showLoader = false
            })
        }

        return {
            ...toRefs(state),
            addRow,
            sendForm
        }
    }
}
</script>