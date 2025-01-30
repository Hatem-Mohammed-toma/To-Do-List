<?php
require_once '../App.php';
if($request->checkget("id")){
    $id=$request->get("id");

    // انا مفروض امسك البوست ب id
    // بعد م امسك البوست انا هعمل delete
    
    $result = $conn->prepare("select * from to_do where id=:id");
    $result->bindparam(":id",$id,PDO::PARAM_INT);
    $check=$result->execute();
    
    if($check>0){
        // انا كدا مسكت البوست مفروض اعمل ال delete 
        $result=$conn->prepare("delete from to_do where id=:id");
        $result->bindparam(":id",$id,PDO::PARAM_INT);
        $out=$result->execute();
    if($out){   
        $session->set("success",["data deleted success"]);
        $request->redirect('../index.php');
    }else{
        $session->set("errors",["delete error"]); 
        $request->redirect('../index.php');
    }
    }else{
        $session->set("errors",["not found"]);
        $request->redirect("../index.php");
    }
}else{
    $request->redirect("../index.php");
}
