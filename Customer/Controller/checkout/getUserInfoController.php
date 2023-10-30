<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include "../../Model/model.php";
$customerId = $_SESSION["currentLoginUser"];
$sql = $pdo->prepare(
    "SELECT *
    FROM m_customers
    WHERE m_customers.id = :id"
);
$sql->bindValue(":id", $customerId);
$sql->execute();
$customerInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT *
    FROM m_townships
    WHERE region_id = :id"
);
$sql->bindValue(":id", $customerInfo[0]["region_id"]);
$sql->execute();
$townshipLists = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT delivery_fee
    FROM m_regions
    WHERE id = :id"
);
$sql->bindValue(":id", $customerInfo[0]["region_id"]);
$sql->execute();
$deliFee = $sql->fetchAll(PDO::FETCH_ASSOC);

?>