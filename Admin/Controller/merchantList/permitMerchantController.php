<?php
session_start();
ob_start();
include "../../View/resources/common/mailSender.php";
include "../../Model/model.php";

$email = $_POST["m_Email"];
$name = $_POST["m_Name"];
$sql = $pdo->prepare(
    "UPDATE m_marchents SET
        banned = :banned 
        WHERE m_email= :email"
);
$sql->bindValue(":banned", 0);
$sql->bindValue(":email", $email);
$sql->execute();

// send email 
$domain = $_SERVER["SERVER_NAME"];
$mail = new SendMail();
$mail->sendMail(
    $email,
    "TrendHUB Merchant Account Returned",
    "<p>Hello sir/madam!
    Good news, $name! You have been permitted to use our services in TrendHUB again. Your old account can be reused to login our website.
    <a href='http://$domain/Trend_HUB/Merchant/View/Login/login.php'>Click here to login to your account!</a>
    </p>"
);
ob_clean();
header("Location: ../../View/merchantList/bannedMerchant.php");
