<?php

namespace Route\to_do_list\classes ;

// get / post / checkget / checkpost // checkmethod -> request method
class Request{

    public function get($key) {
        return (isset($_GET[$key]))?$_GET[$key] :"key not found";
        }

        public function post($key) {
            return (isset($_POST[$key]))?$_POST[$key] :"key not found";
         }

         public function checkpost($key){
            return isset($_POST[$key]);
        }
        public function checkget($key){
            return isset($_GET[$key]);
        }
        public function clean($key){
            return trim(htmlspecialchars($key));
        } 
        public function checkmethod(){
            return $_SERVER['REQUEST_METHOD'];
        }
        public function redirect($file){
            return header("location:$file");
        }
}