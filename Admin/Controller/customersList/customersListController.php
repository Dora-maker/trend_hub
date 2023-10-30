<?php
include "../../Model/model.php";

$sql = $pdo->prepare(
    "SELECT * FROM m_customers WHERE banned = 0 ORDER BY c_name"
);
$sql->execute();
$allCustomersList = $sql->fetchAll(PDO::FETCH_ASSOC);

$date = new DateTime(date("Y-m-d"));
$date2 = new DateTime(date("Y-m-d"));
date_add($date2, date_interval_create_from_date_string("3 days"));
date_sub($date, date_interval_create_from_date_string("3 days"));

$sql = $pdo->prepare(
    "SELECT * FROM m_customers
    WHERE (create_date BETWEEN :date1 and :date2)
    AND banned = 0
    ORDER BY c_name"
);
$sql->bindValue(":date1", date_format($date, "Y-m-d"));
$sql->bindValue(":date2", date_format($date2, "Y-m-d"));
$sql->execute();
$newCustomersList = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT t_orders.*, m_customers.c_name, m_customers.c_email
    FROM t_orders
    JOIN m_customers
    ON t_orders.customer_id = m_customers.id
    ORDER BY c_name;"
);
$sql->execute();
$eachCustomersTotalOrdersList = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT * FROM m_customers WHERE banned = 1 ORDER BY c_name"
);
$sql->execute();
$bannedCustomersList = $sql->fetchAll(PDO::FETCH_ASSOC);
