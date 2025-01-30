
<?php
  if($session->check("success")){
    foreach($session->get("success") as $succes){?>
     <div class="alert alert-success"><?php echo $succes ?></div>
     <?php }
  $session->remove("success");
 }
                            ?>