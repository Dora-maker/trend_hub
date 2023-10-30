<?php

if (!isset($_POST["sortText"])) {
    header("Location: ../../View/Error/error.php");
} else {
    $sortProduct = $_POST["sortText"];
    include "../../Model/model.php";

    $sql = $pdo->prepare(
        "SELECT m_products.*, m_categories.category_name FROM m_products 
    JOIN m_categories 
    ON m_products.category_id = m_categories.id 
    WHERE m_products.merchant_id = :id 
    AND m_products.del_flg = 0
    ORDER BY m_products.$sortProduct
    "
    );
    $sql->bindValue(":id", 1);
    $sql->execute();
    $products = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);
}

?>