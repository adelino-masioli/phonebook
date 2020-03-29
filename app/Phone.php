<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'phonebook_id', 'phone'
    ];

    public function phone_book()
    {
        return $this->belongsTo('App\PhoneBook');
    }

    public static function create_phone($phones, $phone_book){
        $delete = Phone::where('phonebook_id', $phone_book->id);
        $delete->delete();
        
        foreach ($phones as $phone) {
            $phone_['phonebook_id'] = $phone_book->id;
            $phone_['phone']        = $phone;
            $phone_['main']         = 0;
            
            $phone = new Phone($phone_);
            $phone->save();
        }
    }
}
