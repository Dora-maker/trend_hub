<?php
session_start();
ob_start();
include "../../View/resources/common/mailSender.php";
include "../../Model/model.php";

$email = $_POST["m_email"];
$reason = $_POST["rejectReason"];
$reason = ($reason == "") ? "There is no confirmed reason yet." : "";

$sql = $pdo->prepare(
    "UPDATE m_marchents SET
    del_flg = 1
    WHERE m_email = :email
    "
);

$sql->bindValue(":email", $email);
$sql->execute();

// send email 
$domain = $_SERVER["SERVER_NAME"];
$body = file_get_contents("../../Mail/rejectMerchantTemplate/index.html");
$body = str_replace("REPLACE", "$reason", $body);
$mail = new SendMail();
$mail->sendMail(
    $email,
    "Rejected registration to TrendHUB",
    $body
);
ob_clean();
header("Location: ../../View/merchantList/pendingMerchant.php");