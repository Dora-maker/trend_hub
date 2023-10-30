<?php

session_start();

include "../../Model/model.php";
$sql = $pdo->prepare(
    "SELECT m_products.*, m_categories.category_name, m_marchents.m_name, m_marchents.m_bname 
    FROM m_products 
    JOIN m_categories ON m_products.category_id = m_categories.id 
    JOIN m_marchents ON m_products.merchant_id = m_marchents.id
    WHERE m_products.del_flg = 0 AND m_products.merchant_id != 1
    ORDER BY m_name
        "
);
$sql->execute();
$products = $sql->fetchAll(PDO::FETCH_ASSOC);
$_SESSION["merchantProducts"] = $products;
$_SESSION["totalMerchantProduct"] = count($products);
header("Location: ../../View/manageProduct/merchantProducts.php");

?>