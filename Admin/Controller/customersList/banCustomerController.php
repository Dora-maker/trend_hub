<?php
session_start();
ob_start();
$email = $_POST["c_Email"];
$name = $_POST['c_Name'];
$reason = ($_POST['banReason'] == "") ? "suspicious activity" : $_POST['banReason'];

include "../../View/resources/common/mailSender.php";
include "../../Model/model.php";

$sql = $pdo->prepare(
    "UPDATE m_customers SET
        banned = :banned 
    WHERE c_email= :email"
);
$sql->bindValue(":banned", 1);
$sql->bindValue(":email", $email);
$sql->execute();

$imgs = ['../../Mail/banMerchantTemplate/images/image-1.png'];
// send email 
$domain = $_SERVER["SERVER_NAME"];
$body = file_get_contents("../../Mail/banMerchantTemplate/index.html");
$body = str_replace("REPLACE", "$reason", $body);
$mail = new SendMail();
$mail->sendMail(
    $email,
    "TrendHUB Customer Account Banned",
    $body,
    true,
    $imgs
);

ob_clean();

if (isset($_POST["allCustomer"])) {
    header("Location: ../../View/customersList/allCustomers.php");
} else if (isset($_POST["newCustomer"])) {
    header("Location: ../../View/customersList/newCustomers.php");
}
