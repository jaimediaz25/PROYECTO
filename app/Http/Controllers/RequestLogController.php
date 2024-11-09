<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestLog;


class RequestLogController extends Controller
{
    public function index()
    {
        //$logs = RequestLog::all();
        //return view('request_logs.index', compact('logs'));
        $logs = RequestLog::simplePaginate(10);
        return view('request_logs.index', compact('logs'));
    }
}
