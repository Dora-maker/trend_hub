<?php
session_start();
ob_start();
include "../../View/resources/common/mailSender.php";
include "../../Model/model.php";

$name = $_POST["m_name"];
$bname = $_POST["m_bname"];
$email = $_POST["m_email"];

$sql = $pdo->prepare(
    "UPDATE m_marchents SET
    approval = :approved,
    create_date = :date
    WHERE m_email = :email
    "
);
$sql->bindValue(":approved", 1);
$sql->bindValue(":date", date("Y-m-d"));
$sql->bindValue(":email", $email);
$sql->execute();

$receiver = $name."(".$bname.")";
$imgs = ['../../Mail/approveMerchantTemplate/images/image-1.png'];

// send email 
$domain = $_SERVER["SERVER_NAME"];
$body = file_get_contents("../../Mail/approveMerchantTemplate/index.html");
$body = str_replace("REPLACE", "$receiver", $body);
$mail = new SendMail();
$mail->sendMail(
    $email,
    "TrendHUB Merchant Account Accepted",
    $body,
    true,
    $imgs
);
ob_clean();
header("Location: ../../View/merchantList/pendingMerchant.php");