<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'contact_id', 'phone'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public static function create_phone($phones, $contact){
        $delete = Phone::where('contact_id', $contact->id);
        $delete->delete();
        
        foreach ($phones as $phone) {
            $phone_['contact_id'] = $contact->id;
            $phone_['phone']        = $phone;
            $phone_['main']         = 0;
            
            $phone = new Phone($phone_);
            $phone->save();
        }
    }
}
