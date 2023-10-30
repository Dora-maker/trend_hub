<?php

if (!isset($_GET["cartItems"])) {
    header("Location: ../View/Error/error.php");
}else{
    session_start();
    $items = $_GET["cartItems"];
    $cartItemsJson = urldecode($_GET["cartItems"]);
    $cartItems = json_decode($cartItemsJson, true);
    echo "<pre>";
    print_r($cartItems);
    include "../Model/model.php";
    foreach($cartItems as $item){
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
            $_SESSION["noStock".$id] = "Your Input Amount is not currently in the store. Only $stockInStore left!";
            header("Location: ../Controller/shoppingCartController.php?cartItems=$items");
            exit();
        }
    }

    $_SESSION["subTotal"] = $_GET["subTotal"];
    header("Location: ../View/Checkout/checkout.php");

}








?>