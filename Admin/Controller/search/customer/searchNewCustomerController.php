<?php
session_start();
include "../../../Model/model.php";
$searchName = $_POST["searchText"];
$date = new DateTime(date("Y-m-d"));
$date2 = new DateTime(date("Y-m-d"));
date_add($date2, date_interval_create_from_date_string("3 days"));
date_sub($date, date_interval_create_from_date_string("3 days"));

if (isset($_POST["sortBy"])) {
    $sortNewCustomer = $_POST["sortBy"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers
        WHERE ((create_date BETWEEN :date1 and :date2) AND banned = 0)
        AND c_name LIKE :search
        ORDER BY $sortNewCustomer"
    );
    $sql->bindValue(":date1", date_format($date, "Y-m-d"));
    $sql->bindValue(":date2", date_format($date2, "Y-m-d"));
    $sql->bindValue(":search", '%' . $searchName . '%');
} else {
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers
        WHERE ((create_date BETWEEN :date1 and :date2) AND banned = 0)
        AND c_name LIKE :search
        ORDER BY c_name"
    );
    $sql->bindValue(":date1", date_format($date, "Y-m-d"));
    $sql->bindValue(":date2", date_format($date2, "Y-m-d"));
    $sql->bindValue(":search", '%' . $searchName . '%');
}

$sql->execute();
$searchNewCustomersList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($searchNewCustomersList);
