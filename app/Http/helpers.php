<?php

  if (! function_exists('define_footer')) {
    function define_footer()
    {
        return config('app.name', 'Phone Book') ." | © ". date('Y');
    }
  }
  if (! function_exists('href_phone')) {
    function href_phone($type, $phone)
    {
       if($type == 2){
          return 'https://api.whatsapp.com/send?phone='.$phone.'&text=Hi%20how%20are%20you%20?.';
       }else{
          return 'tel:'.$phone;
       }
    }
  }
  if (! function_exists('icon_phone')) {
   function icon_phone($type)
   {
      if($type == 2){
         return '<i class="fab fa-whatsapp text-success"></i>';
      }else{
         return '<i class="fas fa-phone-volume text-secondary"></i>';
      }
   }
 }