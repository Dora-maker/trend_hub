<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../../Model/model.php";
$id =  $_SESSION["currentLoginUser"];


// Fetch wishlist details along with product information from the t_wishlist_details and m_products tables
$sql = $pdo->prepare("
    SELECT t_wishlist_details.*, m_products.p_name, m_products.sell_price, m_products.p_path
    FROM t_wishlist_details
    JOIN m_products ON t_wishlist_details.product_id = m_products.id
    JOIN m_customers ON t_wishlist_details.wishlist_id = m_customers.wishlist_id
    WHERE m_customers.id = :id AND t_wishlist_details.del_flg = 0;
");

$sql->bindValue(":id", $id);
$sql->execute();
$wishlistProducts = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
