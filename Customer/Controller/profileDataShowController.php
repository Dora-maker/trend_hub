<?php
if(!isset($_SESSION)) {
    header("Location: ../Error/error.php");
}else{
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if (!isset($_SESSION["currentLoginUser"])) {
        header("Location: ../Error/error.php");
    } else {

    include "../../Model/model.php";
    $id =  $_SESSION["currentLoginUser"];
    
  
    $sql = $pdo->prepare("SELECT * FROM m_customers WHERE id = :id;");
    $sql->bindValue(":id", $id);
    $sql->execute();

    // $_SESSION["edit"] = $sql->fetchAll(PDO::FETCH_ASSOC);

    $edit = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
   

?>
