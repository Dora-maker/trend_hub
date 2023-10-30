<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../../View/Error/error.php");
}else{
   $question2 = $_POST["questionTwo"];
   $answer2= $_POST['answerTwo'];


   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    question2= :questionTwo,
    answer2 = :answerTwo
    WHERE id = 0;
    "
   );

   $sql->bindValue(":questionTwo",$question2);
   $sql->bindValue(":answerTwo",$answer2);

   $sql->execute();
 

   header("Location: ../../../View/uiElements/ui.php");




}



