<?php

$token = $_GET["token"];

include "../Model/model.php";

$sql = $pdo->prepare(
    "SELECT id FROM m_marchents WHERE token = :token"
);
$sql->bindValue(":token", $token);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

if(count($result) > 0){
    $id = $result[0]["id"];
    $sql = $pdo->prepare(
        "UPDATE m_marchents SET
        verify = 1
        WHERE id=:id
        "
    );
    
    $sql->bindValue(":id",$id);
    $sql->execute();
    header("Location: ../View/Login/login.php");
} else {
    header("Location: ../View/Error/error.php");
}

?>