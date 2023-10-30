<?php
session_start();
if(!isset( $_SESSION["currentMerchantLogin"]) || $_SESSION["currentMerchantLogin"]==''){
    header("Location: ../../View/Error/error.php" );
}else{

    include "../../Model/model.php";

    $merchantId =  $_SESSION["currentMerchantLogin"];

    $sql = $pdo->prepare("SELECT * FROM m_marchents WHERE id = :id;");
    $sql->bindValue(":id", $merchantId );
    $sql->execute();

    // $_SESSION["edit"] = $sql->fetchAll(PDO::FETCH_ASSOC);

    $merchant = $sql->fetchAll(PDO::FETCH_ASSOC);
    // print_r($merchant);
}

?>
