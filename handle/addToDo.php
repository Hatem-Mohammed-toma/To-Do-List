<?php
require_once '../App.php';
if($request->checkpost("submit")){
    // catch
    // $title = $request->post("title");
   $title = $request->clean($request->post("title"));

    // validate
    // required , str 
  
    // open closed  // هعمل كلاس لكل حاجه
 // class any error required / str 
    // $errors=[];
  
     $validation->validate('title', $title,['Required','Str']);
     $errors= $validation->geterror();
   
  //  var_dump($errors);

      if(!empty($errors)){

        $session->set("errors",$errors);
        $request->redirect('../index.php');
      }else{
        $result = $conn->prepare("insert into to_do(`title`) values(:title)");
        $result->bindparam(":title",$title,PDO::PARAM_STR);
        $check=$result->execute();
        if($check){
         $session->set("success",["data inserted success"]);
         $request->redirect('../index.php');
        }else{
            $session->set("errors",["insert error"]); // انا حتطها في ارراي عشان هلوب علليها 
            $request->redirect('../index.php');
        }
        
      }

}else{
 $request->redirect('../index.php');
}

