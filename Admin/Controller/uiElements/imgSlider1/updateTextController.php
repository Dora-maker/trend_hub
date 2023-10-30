<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
}else{

   $imgTitleOne = $_POST["imgTitleOne"];
   $imgDscOne = $_POST['imgDscOne'];
   $slideBg1 = $_POST['slideBg1'];
   $slideTextColor1 = $_POST["slide_text_color1"];
   
  


   include "../../../Model/model.php";



   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    image_silder_title1 = :imgTitleOne,
    image_silder_dsc1  = :imgDscOne,
    slide_bg1 = :slideBg1,
    slide_text_color1 = :slideTextColor1


    WHERE id = 0;
    "
   );

   $sql->bindValue(":imgTitleOne",$imgTitleOne);
   $sql->bindValue(":imgDscOne",$imgDscOne);
   $sql->bindValue(":slideBg1",$slideBg1);
   $sql->bindValue(":slideTextColor1", $slideTextColor1);




   $sql->execute();
 
   header("Location: ../../../View/uiElements/ui.php");



}



