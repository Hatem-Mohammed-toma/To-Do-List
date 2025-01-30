<?php
require_once 'inc\connection.php';
require_once 'classes\Request.php';
require_once 'classes\session.php';
// require_once 'classes\Validation\Required.php';
require_once 'classes\Validation\Validation.php';
use Route\to_do_list\classes\Request;
use Route\to_do_list\classes\Session;
//use  Route\classes\Validation\Required;
use Route\classes\Validation\Validation;
$request=new Request();
$session=new Session();
$validation = new Validation();
//$required=new Required();



