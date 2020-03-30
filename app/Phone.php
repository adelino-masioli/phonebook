<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'contact_id', 'phone', 'type'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public static function create_phone($phones, $contact){
        $delete = Phone::where('contact_id', $contact->id);
        $delete->delete();

        foreach ($phones as $key => $item) {
        
                $phone_['contact_id'] = $contact->id;
                $phone_['phone']      = $item['phone'];
                $phone_['type']       = $item['type'];

                $phone = new Phone($phone_);
                $phone->save();

        }
    }
}
