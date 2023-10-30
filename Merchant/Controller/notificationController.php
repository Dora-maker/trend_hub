<?php
 session_start();
 if(!isset( $_SESSION["currentMerchantLogin"]) || $_SESSION["currentMerchantLogin"]==''){
    header("Location: ../../View/Error/error.php" );
}else{
   $merchantId =  $_SESSION["currentMerchantLogin"];

    include "../../Model/model.php";

    $sql = $pdo->prepare(
        "SELECT * FROM t_notify_to_merchant WHERE merchant_id = :id ORDER BY create_date DESC");
    $sql->bindValue(":id", $merchantId);

    $sql->execute();
    $notifications = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

