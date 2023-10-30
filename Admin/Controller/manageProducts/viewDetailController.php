<?php

if(!isset($_POST["id"])) {
    header("Location: ../../View/Error/error.php");
}else{

    include "../../Model/model.php";
    $id = $_POST["id"];

    $sql = $pdo->prepare(
        "SELECT m_products.*, m_marchents.m_bname FROM m_products 
        JOIN m_marchents
        ON m_products.merchant_id = m_marchents.id  
        WHERE m_products.id = :id
        "
    );
    $sql->bindValue(":id",$id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

?>