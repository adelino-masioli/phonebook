<?php

namespace App\Services;

use App\Log;
use Carbon\Carbon;

class LogService
{
    public static function log($delay, $action, $description)
    {

      $user_id = \Auth::user()->id;
      $start  = Log::select('created_at')
                    ->where('user_id', $user_id)
                    ->where('action', $action)
                    ->orderby('id', 'desc');
      $end    = Carbon::now();

      if($start->count() > 0){
        $timer = $start->first()->created_at->diff($end)->format('%S');

        if($timer > $delay){
          $data = [
            'user_id'     => $user_id,
            'action'      => $action,
            'description' => $description
          ];
          Log::create($data);
        }
      }else{
        $data = [
          'user_id'     => $user_id,
          'action'      => $action,
          'description' => $description
        ];
        Log::create($data);
      }
    }

}
