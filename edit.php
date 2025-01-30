<?php
require_once 'inc/header.php';
require_once 'App.php';
?>

<?php

 if($request->checkget("id")){
$id=$request->get("id"); 
      
$result = $conn->prepare("select * from to_do where id=:id");
$result->bindparam(":id",$id,PDO::PARAM_INT);
$check=$result->execute();

if($check ==1){
    $post = $result->fetch(PDO::FETCH_ASSOC);
    
}else{
    $request->redirect("index.php");
} 
}
?>

<body class="container w-50 mt-5">
    <form action="handle/edit.php?id=<?php echo $post['id']?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"> <?php echo $post['title'] ?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>

<?php
require_once 'handle/errors.php';
?>