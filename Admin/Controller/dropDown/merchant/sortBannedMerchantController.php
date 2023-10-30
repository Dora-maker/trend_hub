<?php
session_start();
include "../../../Model/model.php";
$sortBannedMerchant = $_POST["sortBy"];

if (isset($_POST["searchText"])) {
    $searchName = $_POST["searchText"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE banned = 1 AND m_name LIKE :search
        ORDER BY $sortBannedMerchant"
    );
    $sql->bindValue(":search", '%'.$searchName.'%');
} else {
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE banned = 1
        ORDER BY $sortBannedMerchant"
    );
}
$sql->execute();
$sortBannedMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($sortBannedMerchantList);
