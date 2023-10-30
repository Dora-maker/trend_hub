<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

include "../../Model/model.php";
// $id =  $_SESSION["currentLoginUser"];
$id =  $_SESSION["currentLoginUser"];

// First query to join t_orders and t_payment_method
$sql1 = $pdo->prepare(
    "SELECT t_orders.*, t_payment_method.payment_method 
    FROM t_orders
    JOIN t_payment_method ON t_orders.payment_method_id = t_payment_method.id
    WHERE t_orders.customer_id = :id"
);
$sql1->bindValue(":id", $id);
$sql1->execute();
$orderPaymentInfo = $sql1->fetchAll(PDO::FETCH_ASSOC);

// Second query to join t_order_details and m_products.p_name
$sql2 = $pdo->prepare(
    "SELECT t_order_details.*, m_products.p_name 
    FROM t_order_details
    JOIN m_products ON t_order_details.product_id = m_products.id
    WHERE t_order_details.order_id IN (
        SELECT id FROM t_orders WHERE customer_id = :id
    )"
);
$sql2->bindValue(":id", $id);
$sql2->execute();
$orderDetailsInfo = $sql2->fetchAll(PDO::FETCH_ASSOC);



?>
