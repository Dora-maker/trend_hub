<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../../Model/model.php";
$merchantId =  $_SESSION["currentMerchantLogin"];



$sql = $pdo->prepare("
    SELECT m_products.*, m_categories.*,m_products.id AS pId
    FROM m_products
    JOIN m_categories ON m_products.category_id = m_categories.id
    WHERE m_products.merchant_id = :id
    AND m_products.del_flg = 0
    ORDER BY m_products.p_name;
");

$sql->bindValue(":id", $merchantId);
$sql->execute();
$allProduct= $sql->fetchAll(PDO::FETCH_ASSOC);
$totalCount = count($allProduct);
// echo "<pre>";
// print_r($allProduct);
$sql = $pdo->prepare("
SELECT p.p_name, COUNT(p.p_name) AS num
FROM m_products p
JOIN t_wishlist_details w ON p.id = w.product_id
JOIN m_marchents m ON p.merchant_id = m.id
WHERE m.id = :id
GROUP BY p.p_name;
");

$sql->bindValue(":id", $merchantId);
$sql->execute();
$wishlist = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

