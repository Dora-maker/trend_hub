<?php
session_start(); 
unset($_SESSION['currentLoginUser']);
// $_SESSION["currentLoginUser"] = false; 
// echo "<" . $_SESSION["currentLoginUser"] . ">";
// echo $_SESSION["currentLoginUser"];
echo "Ok";
header("Location: ../View/index.php");

?>