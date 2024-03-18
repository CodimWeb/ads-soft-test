<?php

namespace App\Services;

use App\Models\Record;

class RecordService
{
    public function search($params)
    {
        $searchParams = [];
        foreach ($params as &$param) {
            if(is_numeric($param['value'])) {
                $param['value'] = $param['value'] * 1;
            }

            if($param['value'] == 'true') {
                $param['value'] = true;
            }

            if($param['value'] == 'false') {
                $param['value'] = false;
            }

            $searchParams = array_merge($searchParams, [$param['key'] => $param['value']]);
        }

        return Record::where('access', 1)->whereJsonContains('data', $searchParams)->get();
    }
}
