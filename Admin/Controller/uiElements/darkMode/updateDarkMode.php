<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
}else{
   $h1_color = $_POST["startTime"];
   $h2_color = $_POST['endTime'];


   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    h1_color= :h1_color,
    h2_color = :h2_color
    WHERE id = 0;
    "
   );

   $sql->bindValue(":h1_color",$h1_color);
   $sql->bindValue(":h2_color",$h2_color);

   $sql->execute();
 

   header("Location: ../../../View/uiElements/ui.php");


}



