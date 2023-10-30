<?php
session_start();
include "../../../Model/model.php";
$searchName = $_POST["searchText"];

if (isset($_POST["sortBy"])) {
    $sortAllCustomer = $_POST["sortBy"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers 
        WHERE banned = 0 AND c_name LIKE :search
        ORDER BY $sortAllCustomer"
    );
    $sql->bindValue(":search", '%' . $searchName . '%');
}else{
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers 
        WHERE banned = 0 AND c_name LIKE :search
        ORDER BY c_name"
    );
    $sql->bindValue(":search", '%'.$searchName.'%');
}

$sql->execute();
$searchAllCustomersList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($searchAllCustomersList);
