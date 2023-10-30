<?php

session_start();
if(!isset( $_SESSION["currentMerchantLogin"]) || $_SESSION["currentMerchantLogin"]==''){
    header("Location: ../../View/Error/error.php" );
}else{
include "../../Model/model.php";
$merchantId =  $_SESSION["currentMerchantLogin"];

$sql = $pdo->prepare("
    SELECT m_products.*, m_categories.category_name
    FROM m_products
    JOIN m_categories ON m_products.category_id = m_categories.id
    WHERE m_products.merchant_id = :id AND m_products.del_flg = 0;
");

$sql->bindValue(":id",$merchantId );
$sql->execute();
$allReview= $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
