<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
}else{
   $priceColor = $_POST["priceColor"];
   $navColor= $_POST['navColor'];
   $titleColor= $_POST['titleColor'];


   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    price_text_color= :priceColor,
    nav_text_color = :navColor,
    title_color = :titleColor
    WHERE id = 0;
    "
   );

   $sql->bindValue(":priceColor",$priceColor);
   $sql->bindValue(":navColor",$navColor);
   $sql->bindValue(":titleColor",$titleColor);

   $sql->execute();
 
   header("Location: ../../../View/uiElements/ui.php");



}



