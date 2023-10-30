<?php
include "../../Model/model.php";

$sql = $pdo->prepare(
    "SELECT * FROM m_marchents 
    WHERE (approval = 1 and banned = 0) AND id != 1
    ORDER BY m_name"
);
$sql->execute();
$allMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);

$date = new DateTime(date("Y-m-d"));
$date2 = new DateTime(date("Y-m-d"));
date_add($date2,date_interval_create_from_date_string("3 days"));
date_sub($date,date_interval_create_from_date_string("3 days"));

$sql = $pdo->prepare(
    "SELECT * FROM m_marchents
    WHERE (create_date BETWEEN :date1 and :date2)
    AND (approval = 1 and banned = 0) AND id != 1
    ORDER BY m_name"
);
$sql->bindValue(":date1", date_format($date,"Y-m-d"));
$sql->bindValue(":date2", date_format($date2,"Y-m-d"));
$sql->execute();
$newMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT * FROM m_marchents 
    WHERE (approval = 0 AND del_flg = 0) AND id != 1
    ORDER BY m_name"
);
$sql->execute();
$pendingMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT * FROM m_marchents WHERE banned = 1 ORDER BY m_name"
);
$sql->execute();
$bannedMerchantList = $sql->fetchAll(PDO::FETCH_ASSOC);
