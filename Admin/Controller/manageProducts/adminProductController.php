<?php

session_start();
include "../../Model/model.php";

$sql = $pdo->prepare(
    "SELECT m_products.*, m_categories.category_name FROM m_products 
    JOIN m_categories 
    ON m_products.category_id = m_categories.id 
    WHERE m_products.merchant_id = :id 
    AND m_products.del_flg = 0
    ORDER BY m_products.p_name
    "
);
$sql->bindValue(":id", 1);
$sql->execute();
$products = $sql->fetchAll(PDO::FETCH_ASSOC);
$_SESSION["totalCount"] = count($products);
$_SESSION["adminProducts"] = $products;

$sql = $pdo->prepare(
    "SELECT * FROM m_categories WHERE del_flg = 0"
);
$sql->execute();
$_SESSION["allCategories"] = $sql->fetchAll(PDO::FETCH_ASSOC);
header("Location: ../../View/manageProduct/adminProducts.php");

?>