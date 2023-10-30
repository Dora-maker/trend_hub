<?php
$productId = $_POST["productId"];
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
    del_flg = 1,
    update_date = :date
    WHERE wishlist_id = :id AND product_id = :pid
    "
);
$sql->bindValue(":date", date("Y-m-d"));
$sql->bindValue(":id", $wishlistId);
$sql->bindValue(":pid", $productId);
$sql->execute();

$sql = $pdo->prepare("
    SELECT t_wishlist_details.*, m_products.p_name, m_products.sell_price, m_products.p_path
    FROM t_wishlist_details
    JOIN m_products ON t_wishlist_details.product_id = m_products.id
    JOIN m_customers ON t_wishlist_details.wishlist_id = m_customers.wishlist_id
    WHERE m_customers.id = :id AND t_wishlist_details.del_flg = 0;
");

$sql->bindValue(":id", $customerId);
$sql->execute();
$wishlistProducts = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($wishlistProducts);
?>