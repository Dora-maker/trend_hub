<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
}else{
   $display = $_POST["displayAnno"];
   $textAnno = $_POST["textAnno"];
//    $buttonText = $_POST["buttonText"];



   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    displayAnno= :display,
    textAnno = :textAnno
   
  
    WHERE id = 0;
    "
   );

//    $sql->bindValue(":buttonColor",$buttonColor);
   $sql->bindValue(":display",$display);
   $sql->bindValue(":textAnno",$textAnno);


   $sql->execute();
 

   header("Location: ../../../View/uiElements/ui.php");


}



