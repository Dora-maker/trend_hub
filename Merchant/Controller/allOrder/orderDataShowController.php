<?php


include "../../Model/model.php";
$merchantId =  $_SESSION["currentMerchantLogin"];

$sql = $pdo->prepare(
    "SELECT SUM(total_amt) AS earning
    FROM t_orders
    WHERE payment_status = 1 AND merchant_id = :id;
    "
);
$sql->bindValue(":id",$merchantId);
$sql->execute();
$earningFromCustomer = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT COUNT(id) AS total_pending
    FROM t_orders
    WHERE merchant_id = :id AND order_status = 0;   
    "
);
$sql->bindValue(":id",$merchantId);
$sql->execute();
$totalPending = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT COUNT(id) AS total_complete
    FROM t_orders
    WHERE merchant_id = :id AND order_status = 1;   
    "
);
$sql->bindValue(":id",$merchantId);
$sql->execute();
$totalComplete = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT COUNT(id) AS total_order
    FROM t_orders
    WHERE merchant_id = :id    
    "
);
$sql->bindValue(":id",$merchantId);
$sql->execute();
$totalOrders = $sql->fetchAll(PDO::FETCH_ASSOC);





?>