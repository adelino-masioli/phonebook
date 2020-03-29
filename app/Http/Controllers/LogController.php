<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Log;
use App\Services\LogService;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::latest()->paginate(5);
        LogService::log(30, 'select', 'list all logs with admin');
        return view('logs.index',compact('logs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
