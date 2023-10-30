<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
}else{
   $backgroundPrimary = $_POST["bgPrimary"];
   $backgroundSecondary= $_POST['bgSecondary'];
   $backgroundTertiary= $_POST['bgTertiary'];
   $lightTertiary = $_POST['lightTertiary'];


   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    primary_color= :primary_color,
    secondary_color = :secondary_color,
    tertiary_color = :tertiary,
    light_tertiary = :lightTertiary 
    WHERE id = 0;
    "
   );

   $sql->bindValue(":primary_color",$backgroundPrimary);
   $sql->bindValue(":secondary_color",$backgroundSecondary);
   $sql->bindValue(":tertiary",$backgroundTertiary);
   $sql->bindValue(":lightTertiary",$lightTertiary);

   $sql->execute();
 

   header("Location: ../../../View/uiElements/ui.php");


}



