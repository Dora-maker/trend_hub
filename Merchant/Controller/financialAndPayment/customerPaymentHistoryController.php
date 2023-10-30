<?php
session_start();
if(isset($_POST["chooseMonth"]) && isset($_POST["paymentMonth"])){

    $_SESSION["paymentMonth"] = $_POST["paymentMonth"];
    header("Location: ./eachMonthHistoryController.php");
}else{
    header("Location: ../../View/Error/error.php");
}
?>