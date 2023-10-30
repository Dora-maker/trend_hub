<?php
session_start();
ob_start();
include "../../View/resources/common/mailSender.php";
include "../../Model/model.php";

$email = $_POST["c_Email"];
$name = $_POST["c_Name"];
$sql = $pdo->prepare(
    "UPDATE m_customers SET
        banned = :banned 
        WHERE c_email= :email"
);
$sql->bindValue(":banned", 0);
$sql->bindValue(":email", $email);
$sql->execute();

// send email 
$domain = $_SERVER["SERVER_NAME"];
$mail = new SendMail();
$mail->sendMail(
    $email,
    "TrendHUB Customer Account Returned",
    "<p>Hello sir/madam!
    Good news, $name! You have been permitted to use our services in TrendHUB again. Your old account can be reused to login our website.
    <a href='http://$domain/Trend_HUB/Customer/View/Login/login.php'>Click here to login to your account!</a>
    </p>"
);
ob_clean();
header("Location: ../../View/customersList/bannedCustomers.php");
