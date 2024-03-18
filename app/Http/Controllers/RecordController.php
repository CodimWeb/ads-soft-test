<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Services\RecordService;

class RecordController extends Controller
{
    public function search(Request $request, RecordService $recordService)
    {
        return $recordService->search($request->all());
    }

    public function show(Record $record)
    {
        return $record;
    }
}
