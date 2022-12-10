<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $count = Log::query()
            ->searchName($request->serviceNames)
            ->searchStatus($request->statusCode)
            ->startDate($request->startDate)
            ->endDate($request->endDate)
            ->count();

        return response()->json(["count" => $count]);
    }
}
