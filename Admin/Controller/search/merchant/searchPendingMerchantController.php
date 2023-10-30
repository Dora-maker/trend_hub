<?php
session_start();
include "../../../Model/model.php";
$searchName = $_POST["searchText"];

if (isset($_POST["sortBy"])) {
    $sortPendingMerchant = $_POST["sortBy"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE (approval = 0 AND del_flg = 0)
        AND m_name LIKE :search
        ORDER BY $sortPendingMerchant"
    );
    $sql->bindValue(":search", '%'.$searchName.'%');
}else{
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE (approval = 0 AND del_flg = 0)
        AND m_name LIKE :search 
        ORDER BY m_name"
    );
    $sql->bindValue(":search", '%'.$searchName.'%');
}

$sql->execute();
$pendingMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($pendingMerchantList);
