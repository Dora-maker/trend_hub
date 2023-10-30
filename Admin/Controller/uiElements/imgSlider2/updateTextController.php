<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
}else{

   $imgTitleTwo = $_POST["imgTitleTwo"];
   $imgDscTwo = $_POST['imgDscTwo'];
   $slideBg2 = $_POST["slideBg2"];
   $slideTextColor2 = $_POST["slide_text_color2"];
   
  


   include "../../../Model/model.php";



   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    image_silder_title2 = :imgTitleTwo,
    image_silder_dsc2  = :imgDscTwo,
    slide_bg2 = :slideBg2,
    slide_text_color2 = :slideTextColor2


    WHERE id = 0;
    "
   );

   $sql->bindValue(":imgTitleTwo",$imgTitleTwo);
   $sql->bindValue(":imgDscTwo",$imgDscTwo);
   $sql->bindValue(":slideBg2",$slideBg2);
   $sql->bindValue(":slideTextColor2", $slideTextColor2);





   $sql->execute();
 
   header("Location: ../../../View/uiElements/ui.php");



}



