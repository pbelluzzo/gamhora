<?php

namespace app\core;

class Request{
  
  static function post($variable)
  {
    /*
    var_dump(INPUT_POST);
    $sanitizedVariable = filter_input(INPUT_POST,$variable,FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($sanitizedVariable);
    return $sanitizedVariable;
    */
    return $_POST["${variable}"];
  }
  

}
