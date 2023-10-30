<?php

session_start();
if(!isset($_POST["checkout"])){
    header("Location: ../View/Error/error.php");
}else{
    $_SESSION["subTotal"] =  $_POST["subTotal"];
    
    // $userID = $_SESSION["currentLoginUser"];
    // include "../Model/model.php";
    // $sql = $pdo->prepare(
    //     "SELECT * FROM "
    // );
    






    header("Location: ../View/Checkout/checkout.php");
}








?>