<?php
include "../../Model/model.php";

$sql = $pdo->prepare(
    "SELECT m.month, COUNT(c.id) AS customer_count
    FROM m_customers c
    JOIN m_months m ON MONTH(c.create_date) = m.id
    GROUP BY m.month ORDER BY m.id 
    "
);
$sql->execute();
$customerCountsEachMonth = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT COUNT(c.id) AS total_customers
    FROM m_customers c
    "
);
$sql->execute();
$totalCustomers = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT m.month, COUNT(u.id) AS merchant_count
    FROM m_marchents u
    JOIN m_months m ON MONTH(u.create_date) = m.id
    GROUP BY m.month ORDER BY m.id 
    "
);
$sql->execute();
$merchantCountsEachMonth = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT COUNT(m.id) AS total_merchants
    FROM m_marchents m
    "
);
$sql->execute();
$totalMerchants = $sql->fetchAll(PDO::FETCH_ASSOC);
?>