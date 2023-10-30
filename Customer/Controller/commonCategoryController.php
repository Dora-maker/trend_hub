<?php
// session_start();
include "../../Model/model.php";

$sql = $pdo->prepare(
    "SELECT * FROM m_categories"
);
$sql->execute();
$categoriesResult = $sql->fetchAll(PDO::FETCH_ASSOC);
?>