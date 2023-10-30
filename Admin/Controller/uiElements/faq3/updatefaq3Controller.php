<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../../View/Error/error.php");
}else{
   $question3 = $_POST["questionThree"];
   $answer3= $_POST['answerThree'];


   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    question3= :questionThree,
    answer3 = :answerThree
    WHERE id = 0;
    "
   );

   $sql->bindValue(":questionThree",$question3);
   $sql->bindValue(":answerThree",$answer3);

   $sql->execute();
 

   header("Location: ../../../View/uiElements/ui.php");


}



