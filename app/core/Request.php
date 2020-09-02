<?php

namespace app\core;

class Request
{
  static function post($variable)
  {
    /*
    $sanitizedVariable = filter_input($_POST["${variable}"],$variable,FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($sanitizedVariable);
    return $sanitizedVariable;
    */
    return $_POST["${variable}"];
  }
}
