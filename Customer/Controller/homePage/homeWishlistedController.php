<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include "../Model/model.php";

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
    WHERE t_wishlist_details.wishlist_id = :id AND t_wishlist_details.del_flg = 0"
);

$sql->bindValue(":id", $wishlistId);
$sql->execute();
$wishlistedProductIdList = $sql->fetchAll(PDO::FETCH_ASSOC);

?>