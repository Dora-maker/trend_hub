<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include "../../Model/model.php";
$id =  $_SESSION["currentLoginUser"];

$sql = $pdo->prepare("SELECT * FROM t_notify_to_customers WHERE customer_id = :id ORDER BY create_date DESC;");
$sql->bindValue(":id", $id);
$sql->execute();
$notifications  = $sql->fetchAll(PDO::FETCH_ASSOC);

?>



