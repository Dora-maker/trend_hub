<?php
session_start();
include "../../Model/model.php";
$merchantId =  $_SESSION["currentMerchantLogin"];

$sql = $pdo->prepare("
    SELECT * FROM m_product_temp WHERE merchant_id = :id AND del_flg = 0 AND submitted = 0");
$sql->bindValue(":id", $merchantId);
$sql->execute();
$submittedProducts = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(" INSERT INTO  t_product_submits (merchant_id,create_date)  VALUES (:merchantId,:createDate)");
$sql->bindValue(":merchantId", $merchantId);
$sql->bindValue(":createDate", date("Y-m-d"));
$sql->execute();



//search the last id+1 to get product submit id 
$sql = $pdo->prepare("SELECT id FROM t_product_submits ORDER BY id DESC LIMIT 1");
$sql->execute();
$getSubmitId = $sql->fetchAll(PDO::FETCH_ASSOC);



foreach ($submittedProducts as $product) {
    // Prepare the INSERT statement
    $insertSql = $pdo->prepare("
        INSERT INTO t_product_submit_details
        (product_submit_id,merchant_id, p_name, category_id, brand_name, p_path, p_stock, p_description, p_detail, buy_price, sell_price,create_date)
        VALUES
        (:product_submit_id,:merchant_id,:p_name, :category_id, :brand_name, :p_path, :p_stock, :p_description, :p_detail, :buy_price, :sell_price,:create_date)
    ");
    
    // Bind values from the product array to the parameters
    $insertSql->bindValue(":product_submit_id", $getSubmitId[0]['id']);
    $insertSql->bindValue(":merchant_id", $product['merchant_id']);
    $insertSql->bindValue(":p_name", $product['p_name']);
    $insertSql->bindValue(":category_id", $product['category_id']);
    $insertSql->bindValue(":brand_name", $product['brand_name']);
    $insertSql->bindValue(":p_path", $product['p_path']);
    $insertSql->bindValue(":p_stock", $product['p_stock']);
    $insertSql->bindValue(":p_description", $product['p_description']);
    $insertSql->bindValue(":p_detail", $product['p_detail']);
    $insertSql->bindValue(":buy_price", $product['buy_price']);
    $insertSql->bindValue(":sell_price", $product['sell_price']);
    $insertSql->bindValue(":create_date", date("Y-m-d"));
    $insertSql->execute();
}



$sql = $pdo->prepare("UPDATE m_product_temp SET submitted = 1 WHERE del_flg = 0");
$sql->execute();
$_SESSION["productSubmitController"] = true;
$_SESSION["productSubmitView"] = 1;

 header("Location: ../../View/productSubmission/productSubmission.php");



?>
