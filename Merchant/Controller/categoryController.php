<?php 

include "../../Model/model.php";
$sql = $pdo->prepare(
    "SELECT * FROM m_categories"
);
$sql->execute();
$categories = $sql->fetchAll(PDO::FETCH_ASSOC);


?>