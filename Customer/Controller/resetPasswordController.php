<?php
session_start();
ob_start();

if (!isset($_POST["changePwd"])) {
    header("Location: ../View/Error/error.php");
} else {
    $changePwd = $_POST["new_password"];
    $confirmChangePwd = $_POST["confirm_password"];
    if ($changePwd == $confirmChangePwd) {
        include "../Model/model.php";
        include "../View/resources/common/mailSender.php";
        $c_mail = $_SESSION["c_verifyEmail"];
        $name = $_SESSION["c_emailUsername"];

        $sql = $pdo->prepare(
            "
                UPDATE m_customers SET
                    c_password = :pwd
                WHERE c_email = :email 
            "
        );
        $sql->bindValue(":pwd", password_hash($changePwd, PASSWORD_DEFAULT));
        $sql->bindValue(":email", $c_mail);
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

        $_SESSION["verifyPwToken"] = "";
        $_SESSION["changeAccept"] = "";
        ob_clean();
        header("Location: ../View/Login/login.php");
    } else {
        $_SESSION["diffPwd"] = "You have entered different passwords. Please redo!";
        header("Location: ../View/Login/resetPassword.php");
    }
}
