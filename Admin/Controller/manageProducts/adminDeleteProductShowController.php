<?php

if(!isset($_POST["id"])){
    header("Location: ../../View/Error/error.php");
}else{

    include "../../Model/model.php";
    $id = $_POST["id"];

    $sql = $pdo->prepare(
        "SELECT * FROM m_products WHERE id = :id"
    );
    $sql->bindValue(":id",$id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

?>