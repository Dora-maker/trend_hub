<?php
session_start();
include "../../Model/model.php";

$merchantId =  $_SESSION["currentMerchantLogin"];
$month = $_SESSION["paymentMonth"];
$sql = $pdo->prepare(
    "SELECT o.*, c.c_name, pm.payment_method
    FROM t_orders o
    JOIN m_months m ON MONTH(o.create_date) = m.id
    JOIN t_payment_method pm ON o.payment_method_id = pm.id
    JOIN m_customers c ON o.customer_id = c.id
    WHERE m.month = :month AND o.payment_status = 1 AND o.merchant_id = :id
    "
);
$sql->bindValue(":id", $merchantId);
$sql->bindValue(":month", $month);
$sql->execute();
$eachMonthPaymentHistory = $sql->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($eachMonthPaymentHistory);

$sql = $pdo->prepare(
    "SELECT SUM(o.total_amt) AS earning
    FROM t_orders o
    JOIN m_months m ON MONTH(o.create_date) = m.id
    JOIN t_payment_method pm ON o.payment_method_id = pm.id
    JOIN m_customers c ON o.customer_id = c.id
    WHERE m.month = :month AND o.payment_status = 1 AND o.merchant_id = :id
    "
);
$sql->bindValue(":id", $merchantId);
$sql->bindValue(":month", $month);
$sql->execute();
$totalEarningEachMonth = $sql->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($totalEarningEachMonth);

$_SESSION["eachMonthHistory"] = $eachMonthPaymentHistory;
$_SESSION["eachMonthEarning"] = $totalEarningEachMonth;

header("Location: ../../View/Financials/paymentHistory.php");

?>