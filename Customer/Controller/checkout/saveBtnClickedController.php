<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include "../../Model/model.php";

$_SESSION["saveDeliveryAddress"] = true;
$_SESSION["regionChangeCheckout"] = $_POST["regionCheckOutId"];
$_SESSION["townshipChangeCheckout"] = $_POST["townshipCheckOutId"];
$_SESSION["addressChangeCheckout"] = $_POST["addressCheckout"];
$sql = $pdo->prepare(
    "SELECT *
    FROM m_townships
    WHERE region_id = :id"
);
$sql->bindValue(":id", $_POST["regionCheckOutId"]);
$sql->execute();
$townshipLists = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT delivery_fee
    FROM m_regions
    WHERE id = :id"
);
$sql->bindValue(":id", $_POST["regionCheckOutId"]);
$sql->execute();
$deliFee = $sql->fetchAll(PDO::FETCH_ASSOC);
$_SESSION["checkoutTownshipList"] = $townshipLists;
$_SESSION["checkoutDeliFee"] = $deliFee[0]["delivery_fee"];

?>