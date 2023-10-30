<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
}else{
   $cardColor = $_POST["cardColor"];

   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    price_card_color = :cardColor
    WHERE id = 0;
    "
   );

   $sql->bindValue(":cardColor",$cardColor);
   $sql->execute();
 
   header("Location: ../../../View/uiElements/ui.php");



}



