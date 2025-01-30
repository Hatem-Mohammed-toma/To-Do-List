<?php
namespace Route\classes\Validation; //

use Route\classes\Validation\validator;
require_once 'validator.php';
 
class Required implements validator {
    public function check($key,$value){

        if(empty($value)){
            return "$key is required";
        }else{
            return false ;
        }
    }

    
}