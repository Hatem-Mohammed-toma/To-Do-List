<?php
namespace Route\classes\Validation; //


use Route\classes\Validation\validator;
require_once 'validator.php';
 
class Str implements Validator{

    public function check($key,$value){
        if(is_numeric($value)){
            return "$key  must be string";
        }else{
            return false ;
        }

    } 
}