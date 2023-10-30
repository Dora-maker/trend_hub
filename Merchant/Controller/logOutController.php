<?php
session_start(); 

$_SESSION['currentMerchantLogin'] = ""; 


header("Location: ../View/Login/login.php");

exit;
?>