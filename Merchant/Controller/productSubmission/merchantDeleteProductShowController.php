<?php

if(!isset($_POST["id"])){
    header("Location: ../../View/Error/error.php");
}else{

    include "../../Model/model.php";
    $id = $_POST["id"];
   
    $sql = $pdo->prepare(
        "SELECT * FROM m_product_temp WHERE id = :id"
    );
    $sql->bindValue(":id",$id);
    $sql->execute();
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($res);
}

?>