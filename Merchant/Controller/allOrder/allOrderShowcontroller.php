<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../../Model/model.php";
$merchantId =  $_SESSION["currentMerchantLogin"];

$sql = $pdo->prepare(
    "SELECT t_orders.*, t_payment_method.payment_method, m_customers.c_name 
    FROM t_orders
    JOIN t_payment_method ON t_orders.payment_method_id = t_payment_method.id
    JOIN m_customers ON t_orders.customer_id = m_customers.id
    WHERE t_orders.merchant_id = :id"
);
$sql->bindValue(":id", $merchantId );
$sql->execute();
$orderPaymentInfo = $sql->fetchAll(PDO::FETCH_ASSOC);
// print_r($orderPaymentInfo);
$sql2 = $pdo->prepare(
    "SELECT t_order_details.*, m_products.* 
    FROM t_order_details
    JOIN m_products ON t_order_details.product_id = m_products.id
    WHERE t_order_details.order_id IN (
        SELECT id FROM t_orders WHERE merchant_id = :id
    )"
);
$sql2->bindValue(":id", $merchantId );
$sql2->execute();
$orderDetailsInfo = $sql2->fetchAll(PDO::FETCH_ASSOC);

?>