<?php
session_start();
include "../../../Model/model.php";
$sortAllMerchant = $_POST["sortBy"];

if (isset($_POST["searchText"])) {
    $searchName = $_POST["searchText"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE (approval = 1 and banned = 0) and m_name LIKE :search 
        ORDER BY $sortAllMerchant"
    );
    $sql->bindValue(":search", '%' . $searchName . '%');
    // $sql->bindParam(":selected", $sortAllMerchant);
} else {
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE (approval = 1 and banned = 0) ORDER BY $sortAllMerchant"
    );
}
$sql->execute();
$sortAllMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($sortAllMerchantList);
echo json_encode($sortAllMerchantList);
