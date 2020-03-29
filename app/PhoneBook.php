<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    protected $fillable = [
        'name', 'email'
    ];

    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

    public static function get_all_phones($phone){
        $phones = Phone::where('phonebook_id', $phone);
        if($phones->count() > 1){
            $phones_skip = Phone::where('phonebook_id', $phone)->skip(1)->take(99)->get();
            return $phones_skip;
        }else{  
            return $phones->get();
        }   
    }

    public static function get_first_phone($phone){
        $first_phone = Phone::where('phonebook_id', $phone)
                        ->first();
        return $first_phone['phone'];
    }
}
