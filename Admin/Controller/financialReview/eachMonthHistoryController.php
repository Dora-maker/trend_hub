<?php
session_start();
include "../../Model/model.php";
$month = $_SESSION["paymentMonth"];
$sql = $pdo->prepare(
    "SELECT o.*, c.c_name, pm.payment_method
    FROM t_orders o
    JOIN m_months m ON MONTH(o.create_date) = m.id
    JOIN t_payment_method pm ON o.payment_method_id = pm.id
    JOIN m_customers c ON o.customer_id = c.id
    JOIN m_marchents ON o.merchant_id = m_marchents.id
    WHERE (m.month = :month AND o.payment_status = 1) AND m_marchents.id = 1
    "
);
$sql->bindValue(":month", $month);
$sql->execute();
$eachMonthPaymentHistory = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT SUM(o.total_amt) AS earning
    FROM t_orders o
    JOIN m_months m ON MONTH(o.create_date) = m.id
    JOIN t_payment_method pm ON o.payment_method_id = pm.id
    JOIN m_customers c ON o.customer_id = c.id
    JOIN m_marchents ON o.merchant_id = m_marchents.id
    WHERE (m.month = :month AND o.payment_status = 1) AND m_marchents.id = 1
    "
);
$sql->bindValue(":month", $month);
$sql->execute();
$totalEarningEachMonth = $sql->fetchAll(PDO::FETCH_ASSOC);

$_SESSION["eachMonthHistory"] = $eachMonthPaymentHistory;
$_SESSION["eachMonthEarning"] = $totalEarningEachMonth;

header("Location: ../../View/financialReview/customerPayment.php");
?>