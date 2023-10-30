<?php
session_start();
include "../../../Model/model.php";
$sortPendingMerchant = $_POST["sortBy"];

if (isset($_POST["searchText"])) {
    $searchName = $_POST["searchText"];
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE (approval = 0 AND del_flg = 0)
        AND m_name LIKE :search
        ORDER BY $sortPendingMerchant"
    );
    $sql->bindValue(":search", '%'.$searchName.'%');
} else {
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents 
        WHERE (approval = 0 AND del_flg = 0)
        ORDER BY $sortPendingMerchant"
    );
}
$sql->execute();
$sortPendingMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($sortPendingMerchantList);
