<?php

if (!isset($_POST["id"])) {
    header("Location: ../../View/Error/error.php");
}else{

    include "../../Model/model.php";
    $id = $_POST["id"];

    $sql = $pdo->prepare(
        "SELECT m_products.*, m_categories.category_name FROM m_products 
        JOIN m_categories
        ON m_products.category_id = m_categories.id  
        WHERE m_products.id = :id
        "
    );
    $sql->bindValue(":id",$id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
} 



?>