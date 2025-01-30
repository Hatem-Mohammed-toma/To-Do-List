<?php
namespace Route\classes\Validation;

require_once 'Required.php';
require_once 'Str.php';
 //use Route\classes\Validation\\Required ;

class Validation{
    private $errors=[] ;
     public function validate($key,$value,$rules){
        foreach ($rules as $rule) { // required and string 
            $rule="Route\classes\Validation\\".$rule; // 3 rule namespace 
            $object=new $rule;  // مفروض هنا انا بدي اسم ال كلاس اللي هستخدم  owncheck 
                                // فا انا هستخد القاعده التالته بتاعت ال نيم اسبيس
                            // عشان تيجي صح يبقى لازم اخلي النيم بتاعت ال required and strنفس النيم اسبيس
       
           $objectError=$object->check($key,$value); // هنا خزنتها في قيمه عشان اتشيك عليها هترجعلي قيمه
           
         if($objectError!=false){
            $this->errors[] = $objectError;
         }
        }

     }
     // خليها في فانكشن لوحدها احسن 
     public function geterror(){
        return  $this->errors ;
     }
}