<?php


if (!isset($_POST["changeOrderStatus"])) {
    header("Location: ../../../View/Error/error.php");
} else {
    $orderId = $_POST["orderId"];
    $orderDate = $_POST["orderDate"];
    $cname = $_POST["customerName"];
    $orderStatus = $_POST["orderStatus"];
    $paymentStatus = $_POST["paymentStatus"];
    //echo $orderId. " " . $orderDate . " " . $cname . " " . $orderStatus . " ". $paymentStatus . " ";
    if ($orderStatus == "Completed" && $paymentStatus == "Completed") {
        include "../../../Model/model.php";
        $sql = $pdo->prepare(
            "UPDATE t_orders SET 
            order_status = :orderStatus,
            payment_status = :paymentStatus,
            update_date = :updateDate
            WHERE id = :id
            "
        );
        $sql->bindValue(":orderStatus", 1);
        $sql->bindValue(":paymentStatus", 1);
        $sql->bindValue(":updateDate", date("Y-m-d"));
        $sql->bindValue(":id", $orderId);
        $sql->execute();
    }
    header("Location: ../../../View/orderList/adminOrder.php");
}
