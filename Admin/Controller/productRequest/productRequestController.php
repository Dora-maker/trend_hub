<?php

include "../../Model/model.php";
$sql = $pdo->prepare(
    "SELECT t_product_submits.*, m_marchents.m_name, m_marchents.m_bname, m_marchents.m_email 
    FROM t_product_submits
    JOIN m_marchents
    ON t_product_submits.merchant_id = m_marchents.id
    WHERE t_product_submits.del_flg = 0
    ORDER BY create_date
    "
);
$sql->execute();
$productRequests = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare(
    "SELECT COUNT(t_product_submits.id)
    AS totalRequest
    FROM t_product_submits
    WHERE del_flg = 0
    "
);
$sql->execute();
$totalReqs = $sql->fetchAll(PDO::FETCH_ASSOC);