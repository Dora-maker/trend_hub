<?php
session_start();
include "../../../Model/model.php";
$searchName = $_POST["searchText"];

if (isset($_POST["sortBy"])) {
    $sortBannedMerchant = $_POST["sortBy"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE banned = 1 AND m_name LIKE :search
        ORDER BY $sortBannedMerchant"
    );
    $sql->bindValue(":search", '%'.$searchName.'%');
}else{
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE banned = 1
        AND m_name LIKE :search
        ORDER BY m_name"
    );
    $sql->bindValue(":search", '%'.$searchName.'%');
}

$sql->execute();
$bannedMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($bannedMerchantList);
