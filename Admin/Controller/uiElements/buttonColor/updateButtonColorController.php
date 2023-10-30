<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
}else{
   $buttonColor = $_POST["buttonColor"];
   $buttonText = $_POST["buttonText"];



   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    buy_button_color= :buttonColor,
    button_text= :buttonText
  
    WHERE id = 0;
    "
   );

   $sql->bindValue(":buttonColor",$buttonColor);
   $sql->bindValue(":buttonText",$buttonText);


   $sql->execute();
 

   header("Location: ../../../View/uiElements/ui.php");


}



