<?php
$productId = $_POST["productID"];
//echo $productId;
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include "../../Model/model.php";
$customerId = $_SESSION["currentLoginUser"];
$sql = $pdo->prepare(
    "SELECT wishlist_id
    FROM m_customers
    WHERE m_customers.id = :id"
);
$sql->bindValue(":id", $customerId);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
$wishlistId = $result[0]["wishlist_id"];

$sql = $pdo->prepare(
    "SELECT product_id
    FROM t_wishlist_details
    WHERE product_id = :id AND wishlist_id = :wId"
);
$sql->bindValue(":id", $productId);
$sql->bindValue(":wId", $wishlistId);
$sql->execute();
$existProductId = $sql->fetchAll(PDO::FETCH_ASSOC);

if(count($existProductId) > 0){
    $sql = $pdo->prepare(
        "UPDATE t_wishlist_details SET
        del_flg = 0,
        update_date = :date
        WHERE wishlist_id = :id AND product_id = :pid
        "
    );
    $sql->bindValue(":date", date("Y-m-d"));
    $sql->bindValue(":id", $wishlistId);
    $sql->bindValue(":pid", $productId);
    $sql->execute();
}else{
    $sql = $pdo->prepare(
        "INSERT INTO t_wishlist_details
        (
            wishlist_id,
            product_id,
            create_date
        )
        VALUES
        (
            :wId,
            :pId,
            :createDate
        )
        "
    );
    $sql->bindValue(":wId", $wishlistId);
    $sql->bindValue(":pId", $productId);
    $sql->bindValue(":createDate", date("Y-m-d"));
    $sql->execute();
}
