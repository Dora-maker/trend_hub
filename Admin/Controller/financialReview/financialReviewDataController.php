<?php
include "../../Model/model.php";
$sql = $pdo->prepare(
    "SELECT SUM(total_amt) AS earning
    FROM t_orders
    WHERE payment_status = 1 AND merchant_id = 1;
    "
);
$sql->execute();
$earningFromCustomer = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT c.category_name, COUNT(*) AS order_count
    FROM t_order_details o
    JOIN m_products p ON o.product_id = p.id
    JOIN m_categories c ON p.category_id = c.id
    JOIN t_orders ON o.order_id = t_orders.id
    WHERE t_orders.merchant_id = 1
    GROUP BY c.id, c.category_name
    ORDER BY order_count DESC LIMIT 1
    "
);
$sql->execute();
$mostSoldCategory = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT p.p_name, COUNT(*) AS product_count
    FROM t_order_details o
    JOIN m_products p ON o.product_id = p.id
    JOIN t_orders ON o.order_id = t_orders.id
    WHERE t_orders.merchant_id = 1
    GROUP BY p.id, p.p_name
    ORDER BY product_count DESC LIMIT 1
    "
);
$sql->execute();
$mostSoldProduct = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT COUNT(id) AS total_order
    FROM t_orders
    WHERE merchant_id = 1    
    "
);
$sql->execute();
$totalOrders = $sql->fetchAll(PDO::FETCH_ASSOC);

//if has orders in february, get february in select option
$sql = $pdo->prepare(
    "SELECT DISTINCT m.month
    FROM t_orders o
    JOIN m_months m ON MONTH(o.create_date) = m.id 
    WHERE o.merchant_id = 1
    ORDER BY m.id
    "
);
$sql->execute();
$totalPaymentMonth = $sql->fetchAll(PDO::FETCH_ASSOC);

//January - 3 order
//February - 4 order
$sql = $pdo->prepare(
    "SELECT m.month, COUNT(o.id) AS order_count
    FROM t_orders o
    JOIN m_months m ON MONTH(o.create_date) = m.id
    WHERE o.merchant_id = 1
    GROUP BY m.month ORDER BY m.id 
    "
);
$sql->execute();
$eachMonthTotalOrder = $sql->fetchAll(PDO::FETCH_ASSOC);


