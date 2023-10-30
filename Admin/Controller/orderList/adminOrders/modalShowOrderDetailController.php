<?php
include "../../../Model/model.php";

$orderId = $_POST["id"];
$sql = $pdo->prepare(
    "SELECT t_orders.*, t_payment_method.payment_method, m_customers.c_name, m_customers.c_phone, m_customers.c_address 
    FROM t_orders
    JOIN t_payment_method ON t_orders.payment_method_id = t_payment_method.id
    JOIN m_customers ON t_orders.customer_id = m_customers.id
    WHERE t_orders.merchant_id = :id AND t_orders.id = :order_id
    ORDER BY order_status, t_orders.id;
    "
);
$sql->bindValue(":id", 1);
$sql->bindValue(":order_id", $orderId);
$sql->execute();
$detailOrderList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($detailOrderList);
?>