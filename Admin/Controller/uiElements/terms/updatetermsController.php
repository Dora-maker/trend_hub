<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../../View/Error/error.php");
}else{
   $terms = $_POST["terms"];
  


   include "../../../Model/model.php";


   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
   
    terms = :terms
    WHERE id = 0;
    "
   );

   $sql->bindValue(":terms",$terms);


   $sql->execute();
 

   header("Location: ../../../View/uiElements/ui.php");



}



