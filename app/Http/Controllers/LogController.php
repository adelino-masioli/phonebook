<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Log;
use App\Services\LogService;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:log-list|log-create|log-edit|log-delete', ['only' => ['index','store']]);
         $this->middleware('permission:log-create', ['only' => ['create','store']]);
         $this->middleware('permission:log-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:log-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $user_id = \Auth::user()->id;
        $user = \App\User::whereHas('roles', function($query) use ($user_id) {
            $query->where('name', 'Admin');
        })->where('id', $user_id)->count();

        if($user > 0){
            return self::admin($request, $search);
        }else{
            return self::users($request, $search);
        }
    }
    public function admin($request, $search)
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
    public function users($request, $search)
    {
        $search = $request->get('search');
        $user = \Auth::user();
        if($search && $search != ''){
            $logs = Log::where('user_id', $user->id)
            ->whereHas('user', function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->orWhere('action', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->paginate(5);
            LogService::log(30, 'select', 'filter to logs with <strong>'.$search.'</strong> and user: <strong>'.$user->name.'</strong>');
        }else{
            $logs = Log::where('user_id', $user->id )->orderBy('id')->paginate(5);
            LogService::log(30, 'select', 'list all logs with user: <strong>'.$user->name.'</strong>');
        }
        return view('logs.logs',compact('logs', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
