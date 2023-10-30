<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(count($_POST) == 0){
    echo "ERROR";
    header("Location: ../../../View/Error/error.php");
}else{
   $question1 = $_POST["questionOne"];
   $answer1= $_POST['answerOne'];


   include "../../../Model/model.php";

   $sql = $pdo->prepare(
    " UPDATE ui_setting SET 
    question1= :questionOne,
    answer1 = :answerOne
    WHERE id = 0;
    "
   );

   $sql->bindValue(":questionOne",$question1);
   $sql->bindValue(":answerOne",$answer1);

   $sql->execute();
 

   header("Location: ../../../View/uiElements/ui.php");



}



