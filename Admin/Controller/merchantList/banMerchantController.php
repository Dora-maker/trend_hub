<?php
session_start();
ob_start();
$email = $_POST["m_Email"];
$name = $_POST['m_Name'];
$reason = ($_POST['banReason'] == "") ? "suspicious activity" : $_POST['banReason'];

include "../../View/resources/common/mailSender.php";
include "../../Model/model.php";
$sql = $pdo->prepare(
    "SELECT DISTINCT m_marchents.*, t_orders.order_status 
    FROM m_marchents
    JOIN t_orders ON t_orders.merchant_id = m_marchents.id
    WHERE m_marchents.m_email = :email
    AND t_orders.order_status = 0;
    "
);
$sql->bindValue(":email", $email);
$sql->execute();
$existingOrderResult = $sql->fetchAll(PDO::FETCH_ASSOC);

//no orders left to fulfil
if (count($existingOrderResult) == 0) {
    $sql = $pdo->prepare(
            "UPDATE m_marchents SET
        banned = :banned 
        WHERE m_email= :email"
        );
    $sql->bindValue(":banned", 1);
    $sql->bindValue(":email", $email);
    $sql->execute();
    $_SESSION["view"] = 0;

    $imgs = ['../../Mail/banMerchantTemplate/images/image-1.png'];

    // send email 
    $domain = $_SERVER["SERVER_NAME"];
    $body = file_get_contents("../../Mail/banMerchantTemplate/index.html");
    $body = str_replace("REPLACE", "$reason", $body);
    $mail = new SendMail();
    $mail->sendMail(
        $email,
        "TrendHUB Merchant Account Banned",
        $body,
        true,
        $imgs
    );
    
} else { //orders left to fulfil
    $_SESSION["view"] = 1;
}
ob_clean();
$_SESSION["banControllerPassed"] = true;

if(isset($_POST["allMerchant"])){
    header("Location: ../../View/merchantList/allMerchant.php");
} else if(isset($_POST["newMerchant"])){
    header("Location: ../../View/merchantList/newMerchant.php");
}
