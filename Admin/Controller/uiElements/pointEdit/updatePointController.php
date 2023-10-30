<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../../View/Error/error.php");
}else{
   $moneyAmt = $_POST["moneyAmt"];
   $pointAmt = $_POST['pointAmt'];


   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    money_amout = :moneyAmt,
    point_amount = :pointAmt
    WHERE id = 0;
    "
   );

   $sql->bindValue(":moneyAmt",$moneyAmt);
   $sql->bindValue(":pointAmt",$pointAmt);

   $sql->execute();
 
   header("Location: ../../../View/uiElements/ui.php");
  


}
