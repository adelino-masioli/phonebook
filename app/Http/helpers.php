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
          $link = null;
          $link .= '<a class="mr-1" target="_blank" href="https://api.whatsapp.com/send?phone='.only_number($phone).'&text=Hi%20how%20are%20you%20?.">'.icon_phone($type).'</a>';
          $link .= '  <a target="_blank" href="tel:'.only_number($phone).'">'.icon_phone(1).'</a>';
          return $link;
       }else{
         return '<a target="_blank" href="tel:'.only_number($phone).'">'.icon_phone($type).'</a>';
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

 if (! function_exists('only_number')) {
   function only_number($number)
   {
      return preg_replace('/[^0-9]/','',$number);
   }
 }