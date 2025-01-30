<?php
require_once '../App.php';

  // id   // catch // validate // errors // update with pdo

if($request->checkget("id") && $request->checkget("name")){
    $id=$request->get("id");
    $status=$request->get("name");
        
 
    $result = $conn->prepare("select * from to_do where id=:id");
    $result->bindparam(":id",$id,PDO::PARAM_INT);
    $out=$result->execute();
    
    // update with pdo 
    if($out>0){
        $result = $conn->prepare("update to_do set `status`=:status where id=:id");
        $result->bindparam(":id",$id,PDO::PARAM_INT);
        $result->bindparam(":status",$status,PDO::PARAM_STR);
        $check=$result->execute();
        if($check){
            $session->set("success",["status updated success"]);
            $request->redirect('../index.php');
        }else{
            $session->set("errors",["status error"]); // انا حتطها في ارراي عشان هلوب علليها 
             $request->redirect('../edit.php');
        }
    }else{
        $session->set("errors",["not found"]);
        $request->redirect("../index.php");
    } 
}else{
    $request->redirect("../index.php");
}



