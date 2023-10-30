<?php

$id = $_POST["id"];
include "../../Model/model.php";
$sql = $pdo->prepare(
    "SELECT t_product_submit_details.*, m_categories.category_name
        FROM t_product_submit_details
        JOIN m_categories
        ON t_product_submit_details.category_id = m_categories.id
        WHERE t_product_submit_details.id = :id"
);

$sql->bindValue(":id", $id);
$sql->execute();
$eachDetail = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($eachDetail);

