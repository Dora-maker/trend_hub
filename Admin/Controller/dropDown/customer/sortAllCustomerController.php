<?php
session_start();
include "../../../Model/model.php";
$sortAllCustomer = $_POST["sortBy"];

if (isset($_POST["searchText"])) {
    $searchName = $_POST["searchText"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers 
        WHERE banned = 0 AND c_name LIKE :search
        ORDER BY $sortAllCustomer"
    );
    $sql->bindValue(":search", '%' . $searchName . '%');
} else {
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers 
        WHERE banned = 0 
        ORDER BY $sortAllCustomer"
    );
}
$sql->execute();
$sortAllCustomersList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($sortAllCustomersList);
