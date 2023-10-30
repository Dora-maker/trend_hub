<?php
session_start();
ob_start();

if (!isset($_POST["m_forgotPw"])) {
    header("Location: ../View/Error/error.php");
} else {
    $mEmail = $_POST["m_email"];
    include "../Model/model.php";
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents WHERE m_email = :email"
    );
    $sql->bindValue(":email", $mEmail);
    $sql->execute();
    $searchEmailResult = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (count($searchEmailResult) > 0) {
        $verifyMail = $searchEmailResult[0]["verify"];
        $adminApproval = $searchEmailResult[0]["approval"];
        if ($verifyMail == "1" && $adminApproval == "1") {
            // Import commonFunction to use getToken function 
        include "../View/resources/common/commonFunction.php";
        include "../View/resources/common/mailSender.php";        

        // Genereate token 
        $token = getVerifyEmailToken();
        // send email 
        $domain = $_SERVER["SERVER_NAME"];
        $name = $searchEmailResult[0]["m_name"];
        $body = file_get_contents("../Mail/verifyEmailTemplate/index.html");
        $body = str_replace("REPLACE", "$token", $body);
        $body = str_replace("USERNAME", "$name", $body);
        $mail = new SendMail();
        $mail->sendMail(
            $cEmail,
            "Verify Email for Change Password",
            $body
        );
        ob_clean();
        $_SESSION["m_verifyPwToken"] = $token;
        $_SESSION["m_emailUsername"] = $name;
        //for later use in verifyPassword's resend Token function 
        $_SESSION["m_verifyEmail"] = $_POST["m_email"];
        header("Location: ../View/Login/verify.php");
        } else {
            $_SESSION["m_forgotError"] = "You have not verify your email or admin has not approved your account!";
            header("Location: ../View/Login/forgot.php");
        }
    } else {
        $_SESSION["m_forgotError"] = "Email not found! Please type in the email you registered with us!";
        header("Location: ../View/Login/forgot.php");
    }
}
