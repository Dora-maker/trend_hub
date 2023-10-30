<?php

if (!isset($_GET["cartItems"])) {
    header("Location: ../../View/Error/error.php");
} else {
    session_start();
    $items = $_GET["cartItems"];
    $cartItemsJson = urldecode($_GET["cartItems"]);
    $cartItems = json_decode($cartItemsJson, true);
    echo "<pre>";
    print_r($cartItems);
    include "../../Model/model.php";
    foreach ($cartItems as $item) {
        $id = $item["productID"];
        $inputQty = $item["qty"];
        $sql = $pdo->prepare(
            "SELECT p_stock FROM m_products WHERE id = :id"
        );
        $sql->bindValue(":id", $id);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        $stockInStore = $result[0]["p_stock"];
        if ($stockInStore < $inputQty) {
            $_SESSION["noStock" . $id] = "Your Input Amount is not currently in the store. Only $stockInStore left!";
            header("Location: ../../Controller/shoppingCartController.php?cartItems=$items");
            exit();
        }
    }

    //stock update
    foreach ($cartItems as $item) {
        $id = $item["productID"];
        $inputQty = $item["qty"];
        //get stock from each product
        $sql = $pdo->prepare(
            "SELECT p_stock FROM m_products WHERE id = :id"
        );
        $sql->bindValue(":id", $id);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        //remain stock
        $remainQty = $result[0]["p_stock"] - $inputQty;

        if($remainQty == 0){
            $sql = $pdo->prepare(
                "UPDATE m_products SET
                del_flg = 1
                WHERE id = :id"
            );
            $sql->bindValue(":id", $id);
        }else{
            $sql = $pdo->prepare(
                "UPDATE m_products SET
                p_stock = :stock
                WHERE id = :id"
            );
            $sql->bindValue(":id", $id);
            $sql->bindValue(":stock", $remainQty);
        }
        $sql->execute();
    }

    $sql = $pdo->prepare(
        "SELECT merchant_id FROM m_products WHERE id = :id LIMIT 1"
    );
    $sql->bindValue(":id", $cartItems[0]["productID"]);
    $sql->execute();
    $merchantIDResult = $sql->fetchAll(PDO::FETCH_ASSOC);
    $merchantId = $merchantIDResult[0]["merchant_id"];

    $customerId = $_SESSION["currentLoginUser"];
    $regionId = $_SESSION["regionChangeCheckout"];
    $townshipId = $_SESSION["townshipChangeCheckout"];
    $address = $_SESSION["addressChangeCheckout"];
    $deliFee = $_SESSION["checkoutDeliFee"];
    $subTotalString = $_SESSION["subTotal"];
    $amountString = preg_replace("/[^0-9]/", "", $subTotalString);
    $subTotal = (int)$amountString;
    $grandTotal = $subTotal + $deliFee;
    $paymentId = $_GET["paymentMethod"];
    $pStatus = ($paymentId == 1 || $paymentId == 2) ? 1 : 0;

    $sql = $pdo->prepare(
        "INSERT INTO t_orders
        (
            customer_id,
            merchant_id,
            total_amt,
            payment_method_id,
            township_id,
            region_id,
            address,
            payment_status,
            create_date
        )
        VALUES
        (
            :cId,
            :mId,
            :total,
            :payId,
            :tId,
            :rId,
            :addr,
            :pStatus,
            :createDate
        )
        "
    );
    $sql->bindValue(":cId", $customerId);
    $sql->bindValue(":mId", $merchantId);
    $sql->bindValue(":total", $grandTotal);
    $sql->bindValue(":payId", $paymentId);
    $sql->bindValue(":tId", $townshipId);
    $sql->bindValue(":rId", $regionId);
    $sql->bindValue(":addr", $address);
    $sql->bindValue(":pStatus", $pStatus);
    $sql->bindValue(":createDate", date("Y-m-d"));
    $sql->execute();

    $sql = $pdo->prepare(
        "SELECT id FROM t_orders WHERE customer_id = :id ORDER BY id DESC LIMIT 1"
    );
    $sql->bindValue(":id", $customerId);
    $sql->execute();
    $orderIdResult = $sql->fetchAll(PDO::FETCH_ASSOC);
    $orderId = $orderIdResult[0]["id"];

    foreach ($cartItems as $item) {
        $productId = $item["productID"];
        $qty = $item["qty"];

        $sql = $pdo->prepare(
            "SELECT sell_price FROM m_products WHERE id = :id"
        );
        $sql->bindValue(":id", $productId);
        $sql->execute();
        $sellPriceResult = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sellPrice = $sellPriceResult[0]["sell_price"];
        $total = $qty * $sellPrice;

        $sql = $pdo->prepare(
            "INSERT INTO t_order_details
            (
                order_id,
                product_id,
                qty,
                total_amt,
                create_date
            )
            VALUES
            (
                :oId,
                :pId,
                :qty,
                :total,
                :createDate
            )
            "
        );
        $sql->bindValue(":oId", $orderId);
        $sql->bindValue(":pId", $productId);
        $sql->bindValue(":qty", $qty);
        $sql->bindValue(":total", $total);
        $sql->bindValue(":createDate", date("Y-m-d"));
        $sql->execute();
    }

    $message = "You have successfully purchased the order.";
    $sql = $pdo->prepare(
        "INSERT INTO t_notify_to_customers
    (
        title,
        message,
        customer_id,
        create_date
    )
    VALUES
    (
        :title,
        :message,
        :id,
        :createDate
    )
    "
    );
    $sql->bindValue(":title", "Order Complete");
    $sql->bindValue(":message", $message);
    $sql->bindValue(":id", $customerId);
    $sql->bindValue(":createDate", date("Y-m-d"));
    $sql->execute();

    $_SESSION["hasEnough"] = true;
    $_SESSION["orderId"] = $orderId;
    $_SESSION["passCheckout"] = true;
    header("Location: ../../View/Payment/payment.php");
}
