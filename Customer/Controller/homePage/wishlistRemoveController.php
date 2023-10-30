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
    "UPDATE t_wishlist_details SET
    del_flg = 1
    WHERE wishlist_id = :id AND product_id = :pid
    "
);
$sql->bindValue(":id", $wishlistId);
$sql->bindValue(":pid", $productId);
$sql->execute();
$wishlistedProductIdList = $sql->fetchAll(PDO::FETCH_ASSOC);

?>