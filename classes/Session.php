<?php
 // اول حاجه لازم اعمل session start 
 namespace Route\to_do_list\classes ;

class Session {
 
    // انا بخزنها في كونستراكتور عشان تشتغل معايا على طول 
    public function __construct() {
        //if (session_status() == PHP_SESSION_NONE) {
            session_start();
       // }
    }
    // انا بدخل القيم هنا 

    public function set($key,$value){ // setter
        $_SESSION[$key] = $value;
    }
    // get echo $_Session[key]
    // انا هنا بقرا القيم اللي متخزنه جوه السيشن
    public function get($key){ // geter
     return(isset($_SESSION[$key]))?$_SESSION[$key] : "key not found ";
    }
   
    public function remove($key){
        unset($_SESSION[$key]);
    }
   
    public function destroy() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_unset();
            return session_destroy();
        }
        return false;
    }

    public function check($key){
        return (isset($_SESSION[$key]));
    }

}
