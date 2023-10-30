<?php
session_start();
if (!isset($_POST["sortText"])) {
    header("Location: ../../View/Error/error.php");
} else {
    $sortOrder = $_POST["sortText"];
    $sortStatus;
    $sortStatus = ($sortOrder == "pending") ? 1 : 0;

    include "../../Model/model.php";
    $merchantId = $_SESSION["currentMerchantLogin"];

    $sql = $pdo->prepare(
        "SELECT t_orders.*, t_payment_method.payment_method, m_customers.c_name 
        FROM t_orders
        JOIN t_payment_method ON t_orders.payment_method_id = t_payment_method.id
        JOIN m_customers ON t_orders.customer_id = m_customers.id
        WHERE t_orders.merchant_id = :id  ORDER BY t_orders.order_status = $sortStatus"
    );
    $sql->bindValue(":id", $merchantId);
 
    $sql->execute();
    $orderPaymentInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = $pdo->prepare(
        "SELECT t_order_details.*, m_products.*,t_orders.* 
        FROM t_order_details
        JOIN m_products ON t_order_details.product_id = m_products.id
        JOIN t_orders ON t_order_details.order_id = t_orders.id
        WHERE t_order_details.order_id IN (
            SELECT id FROM t_orders WHERE merchant_id = :id ORDER BY t_orders.order_status = $sortStatus
        )"
    );
    $sql2->bindValue(":id", $merchantId );
    $sql2->execute();
    $orderDetailsInfo = $sql2->fetchAll(PDO::FETCH_ASSOC);

    $data = [$orderPaymentInfo,  $orderDetailsInfo];
    echo json_encode($data);
}
?>
