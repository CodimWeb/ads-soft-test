<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'data' => '{"userId": 1, "id": 1, "title": "delectus aut autem", "completed": false}',
                'access' => 1
            ],
            [
                'data' => '{"userId": 1, "id": 2, "title": "quis ut nam facilis et officia qui", "completed": false}',
                'access' => 0
            ],
            [
                'data' => '{"userId": 1, "id": 3, "title": "fugiat veniam minus", "completed": false}',
                'access' => 1
            ],
            [
                'data' => '{"userId": 1, "id": 4, "title": "et porro tempora", "completed": true}',
                'access' => 0
            ],
            [
                'data' => '{"userId": 1, "id": 5, "title": "laboriosam mollitia et enim quasi adipisci quia provident illum", "completed": false}',
                'access' => 1
            ],
            [
                'data' => '{"userId": 1, "id": 6, "title": "qui ullam ratione quibusdam voluptatem quia omnis", "completed": false}',
                'access' => 0
            ],
            [
                'data' => '{"userId": 1, "id": 7,"title": "illo expedita consequatur quia in", "completed": false}',
                'access' => 1
            ],
            [
                'data' => '{"userId": 1, "id": 8, "title": "quo adipisci enim quam ut ab", "completed": true}',
                'access' => 0
            ],
            [
                'data' => '{"userId": 1, "id": 9, "title": "molestiae perspiciatis ipsa", "completed": false}',
                'access' => 1
            ],
            [
                'data' => '{"userId": 2, "id": 33, "title": "sint sit aut vero", "completed": false}',
                'access' => 0
            ],
        ];

        foreach ($records as $record) {
            Record::updateOrCreate([
                'data' => $record['data'],
                'access' => $record['access']
            ]);
        }
    }
}
