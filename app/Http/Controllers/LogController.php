<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Log;
use App\Services\LogService;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        if($search && $search != ''){
            $logs = Log::whereHas('user', function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->orWhere('action', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->paginate(5);
            LogService::log(30, 'select', 'filter to logs with <strong>'.$search.'</strong>');
        }else{
            $logs = Log::orderBy('id')->paginate(5);
            LogService::log(30, 'select', 'list all logs with admin');
        }
        return view('logs.index',compact('logs', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
