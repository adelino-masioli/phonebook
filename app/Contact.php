<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email'
    ];

    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

    public static function get_all_phones($contact, $skip=null){
        $phones = Phone::where('contact_id', $contact);
        if($skip != null){
            return Phone::where('contact_id', $contact)->get();
        }else{
            if($phones->count() > 1){
                $phones_skip = Phone::where('contact_id', $contact)->skip(1)->take(99)->get();
                return $phones_skip;
            }else{  
                return [];
            }
        }
    }

    public static function get_first_phone($contact){
        $first_phone = Phone::where('contact_id', $contact);
        if($first_phone->count() > 0){
            return $first_phone->first();
        }else{
            return ['type' => null, 'phone' => null];
        }
    }
}
