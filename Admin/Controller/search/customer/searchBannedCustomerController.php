<?php
session_start();
include "../../../Model/model.php";
$searchName = $_POST["searchText"];

if (isset($_POST["sortBy"])) {
    $sortBannedCustomer = $_POST["sortBy"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers 
        WHERE banned = 1 AND c_name LIKE :search
        ORDER BY $sortBannedCustomer"
    );
    $sql->bindValue(":search", '%' . $searchName . '%');
}else{
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers 
        WHERE banned = 1 AND c_name LIKE :search
        ORDER BY c_name"
    );
    $sql->bindValue(":search", '%'.$searchName.'%');
}

$sql->execute();
$searchBannedCustomersList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($searchBannedCustomersList);
