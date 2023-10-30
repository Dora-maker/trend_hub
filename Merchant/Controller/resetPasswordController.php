<?php
session_start();
ob_start();

if (!isset($_POST["mChangePwd"])) {
    header("Location: ../View/Error/error.php");
} else {
    $changePwd = $_POST["m_newPassword"];
    $confirmChangePwd = $_POST["m_confirmPassword"];
    if ($changePwd == $confirmChangePwd) {
        include "../Model/model.php";
        include "../View/resources/common/mailSender.php";
        $m_mail = $_SESSION["m_verifyEmail"];
        $name = $_SESSION["m_emailUsername"];

        $sql = $pdo->prepare(
            "
                UPDATE m_marchents SET
                    m_password = :pwd
                WHERE m_email = :email 
            "
        );
        $sql->bindValue(":pwd", password_hash($changePwd, PASSWORD_DEFAULT));
        $sql->bindValue(":email", $m_mail);
        $sql->execute();

        // send email 
        $domain = $_SERVER["SERVER_NAME"];
        $body = file_get_contents("../Mail/resetPasswordCompleteTemplate/index.html");
        $body = str_replace("REPLACE_NAME", "$name", $body);
        $mail = new SendMail();
        $mail->sendMail(
            $c_mail,
            "Reset Password Finish",
            $body,
            true
        );

        $_SESSION["m_verifyPwToken"] = "";
        $_SESSION["m_changeAccept"] = "";
        ob_clean();
        header("Location: ../View/Login/login.php");
    } else {
        $_SESSION["m_diffPwd"] = "You have entered different passwords. Please redo!";
        header("Location: ../View/Login/reset.php");
    }
}
