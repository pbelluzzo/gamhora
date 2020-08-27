<?php

namespace app\core;

class Request{
  
  function post($variable)
  {
    $sanitizedVariable = filter_input(INPUT_POST,$variable,FILTER_SANITIZE_SPECIAL_CHARS);
    return $sanitizedVariable;
  }
  

}
