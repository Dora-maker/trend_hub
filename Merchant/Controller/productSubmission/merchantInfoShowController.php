<?php
if (!isset($_SESSION)) {
    session_start();
}
$merchantId =  $_SESSION["currentMerchantLogin"];

include "../../Model/model.php";

$sql = $pdo->prepare("SELECT * FROM m_marchents WHERE id = :id");
$sql->bindValue(":id",$merchantId);
$sql->execute();
$merchantInfo = $sql->fetchAll(PDO::FETCH_ASSOC);


// echo "<pre>";
// print_r($merchantInfo);
