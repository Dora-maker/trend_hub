<?php

if(!isset($_POST["sortText"])){
    header("Location: ../../View/Error/error.php");
}else{
    $sortProduct = $_POST["sortText"];
    include "../../Model/model.php";

    $sql = $pdo->prepare(
        "SELECT m_products.*, m_categories.category_name, m_marchents.m_name, m_marchents.m_bname FROM m_products 
            JOIN m_categories
            JOIN m_marchents 
            ON m_products.category_id = m_categories.id 
            WHERE m_products.del_flg = 0
            AND m_products.merchant_id != 1
            ORDER BY $sortProduct
            "
    );
    $sql->execute();
    $merchantProducts = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($merchantProducts);

}


?>