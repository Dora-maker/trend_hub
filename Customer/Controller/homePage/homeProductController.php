<?php
// session_start();
include "../Model/model.php";

$sql = $pdo->prepare(
    "SELECT p.*, COUNT(wd.product_id) AS frequency, m.m_name
    FROM m_products p
    JOIN t_wishlist_details wd ON p.id = wd.product_id
    JOIN m_marchents m ON p.merchant_id = m.id
    WHERE p.p_stock >= 1 AND p.del_flg = 0
    GROUP BY p.id, p.p_name
    ORDER BY frequency DESC LIMIT 4"
);
$sql->execute();
$trendingProductsList = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT p.*, SUM(od.qty) AS total_quantity_sold, m.m_name
    FROM m_products p
    JOIN t_order_details od ON p.id = od.product_id
    JOIN m_marchents m ON p.merchant_id = m.id
    WHERE p.p_stock >= 1 AND p.del_flg = 0
    GROUP BY p.id, p.p_name
    ORDER BY total_quantity_sold DESC LIMIT 4"
);
$sql->execute();
$bestSellerProductsList = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT p.*, m.m_name
    FROM m_products p
    JOIN m_marchents m ON p.merchant_id = m.id
    WHERE (p.create_date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)) AND (p.p_stock >= 1 AND p.del_flg = 0)
    ORDER BY p.create_date DESC LIMIT 4"
);
$sql->execute();
$newProductsList = $sql->fetchAll(PDO::FETCH_ASSOC);
