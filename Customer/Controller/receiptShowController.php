<?php
session_start();

if (!isset($_SESSION["orderId"])) {
    header("Location: ../../View/Error/error.php");
} else {
    $orderId = $_SESSION["orderId"];

    include "../../Model/model.php";
    $sql = $pdo->prepare(
        "SELECT t_orders.*, t_payment_method.payment_method, m_customers.*, m_regions.delivery_fee
        FROM t_orders
        JOIN t_payment_method ON t_orders.payment_method_id = t_payment_method.id
        JOIN m_customers ON t_orders.customer_id = m_customers.id
        JOIN m_regions ON t_orders.region_id = m_regions.id
        WHERE t_orders.id = :id"
    );
    $sql->bindValue(":id", $orderId);
    $sql->execute();
    $selectedOrder = $sql->fetchAll(PDO::FETCH_ASSOC);



    $sql2 = $pdo->prepare(
        "SELECT t_order_details.*, m_products.* 
        FROM t_order_details
        JOIN m_products ON t_order_details.product_id = m_products.id
        WHERE t_order_details.order_id = :id;
        )"
    );

    $sql2->bindValue(":id", $orderId);
    $sql2->execute();
    $orderDetails = $sql2->fetchAll(PDO::FETCH_ASSOC);
    //to notify to merchants for new order

    $sql = $pdo->prepare(
        "SELECT m_marchents.*, m_marchents.id AS merchantId, t_orders.*
    FROM m_marchents
    JOIN  t_orders ON  t_orders.merchant_id = m_marchents.id
    WHERE  t_orders.id = :id;"
    );
    $sql->bindValue(":id", $orderId);
    $sql->execute();
    $merchant = $sql->fetchAll(PDO::FETCH_ASSOC);
    $merchantId = $merchant[0]['merchantId'];
    $customerId = $merchant[0]['customer_id'];
   

    $merchantName =  $merchant[0]['m_name'];

    $title = "New Order for Your Products";
    $text = "A new order has been placed for your products. Please review the order details and prepare for delivery.";
    if (($merchant[0]['merchantId']) == 1) {
        $sql = $pdo->prepare(
            "INSERT INTO t_contact_customers
        (
          customer_id,
          msg_text,
          create_date
        )
        VALUES
        (
          :customerID,
          :msg_text,
          :create_date
        )
        "
        );

        $sql->bindValue(":customerID", $customerId);
        $sql->bindValue(":msg_text", $text);
        $sql->bindValue(":create_date", date("Y-m-d"));
        $sql->execute();
    } else {
        $sql = $pdo->prepare(
            "INSERT INTO t_notify_to_merchant
        (
           merchant_id,
           title,
           message,
           create_date
        )
        VALUES
        (
           :merchant_id,
           :title,
           :message,
           :create_date
        )
        "
        );
        $sql->bindValue(":merchant_id", $merchantId);
        $sql->bindValue(":title", $title);
        $sql->bindValue(":message", $text);
        $sql->bindValue(":create_date", date("Y-m-d"));
        $sql->execute();
    }
}
