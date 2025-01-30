<?php
require_once '../App.php';
if($request->checkpost("submit")){
  // id   // catch // validate // errors // update with pdo

  if($request->checkget("id")){
 $id=$request->get("id");
 $title = $request->clean($request->post("title"));

$validation->validate('title', $title,['Required','Str']);
$errors= $validation->geterror();

 if(!empty($errors)){
    $session->set('error',$errors);
    $request->redirect('../edit.php');
 }else{
    $result = $conn->prepare("select * from to_do where id=:id");
    $result->bindparam(":id",$id,PDO::PARAM_INT);
    $out=$result->execute();
    
    // update with pdo 
    if($out>0){
        $result = $conn->prepare("update to_do set `title`=:title where id=:id");
        $result->bindparam(":id",$id,PDO::PARAM_INT);
        $result->bindparam(":title",$title,PDO::PARAM_STR);
        $check=$result->execute();
        if($check){
            $session->set("success",["data updated success"]);
            $request->redirect('../index.php');
        }else{
            $session->set("errors",["update error"]); // انا حتطها في ارراي عشان هلوب علليها 
             $request->redirect('../edit.php');
        }
    }else{
        $session->set("errors",["not found"]);
        $request->redirect("../index.php");
    }

 }
   
}else{
    $request->redirect("../index.php");
}

}else{
    $request->redirect("../index.php");
}
