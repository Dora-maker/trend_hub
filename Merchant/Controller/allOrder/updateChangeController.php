<?php
session_start();
if (isset($_POST['changeStatus'])) {

    include "../../Model/model.php";

    $id = $_POST['order_id'];
    $orderStatus = $_POST['orderStatus'];
    if ($orderStatus == "Pending") {
        $orderStatus = 0;
    } else {
        $orderStatus = 1;
    }


    if (isset($_POST['paymentStatus'])) {
        $paymentStatus = $_POST['paymentStatus'];
        if ($paymentStatus == "Pending") {
            $paymentStatus = 0;
        } else {
            $paymentStatus = 1;
        }
        $sql = $pdo->prepare("UPDATE t_orders SET 
        order_status = :orderStatus,
        payment_status = :paymentStatus
        WHERE id = :id");


        $sql->bindValue(":id", $id);
        $sql->bindValue(":orderStatus", $orderStatus);
        $sql->bindValue(":paymentStatus", $paymentStatus);
    }else{
        $sql = $pdo->prepare("UPDATE t_orders SET 
        order_status = :orderStatus
        WHERE id = :id");


        $sql->bindValue(":id", $id);
        $sql->bindValue(":orderStatus", $orderStatus);
    }


    $sql->execute();
     header("Location: ../../View/allOrder/allOrder.php");
}
