<?php

  if (! function_exists('define_footer')) {
    function define_footer()
    {
        return config('app.name', 'Phone Book') ." | © ". date('Y');
    }
  }