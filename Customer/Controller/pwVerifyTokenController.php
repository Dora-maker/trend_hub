<?php
session_start();
ob_start();

if (!isset($_POST["verifyBtn"]) && !isset($_POST["resendToken"])) {
    header("Location: ../View/Error/error.php");
} else {
    if(isset($_POST["verifyBtn"])){
        $verifyCode = $_POST["verify_code"];
        $generatedToken = $_SESSION["verifyPwToken"];
        if($verifyCode == $generatedToken){
            $_SESSION["changeAccept"] = "true";
            header("Location: ../View/Login/resetPassword.php");
        }else{
            $_SESSION["verifyCodeError"] = "You have entered wrong token! Please recheck!";
            header("Location: ../View/Login/verifyPassword.php");
        }
    }else{
        //if resend is clicked
        // Import commonFunction to use getToken function 
        include "../View/resources/common/commonFunction.php";
        include "../View/resources/common/mailSender.php";

        // Genereate token 
        $token = getVerifyEmailToken();
        // send email 
        $c_mail = $_SESSION["c_verifyEmail"];
        $name = $_SESSION["c_emailUsername"];
        $domain = $_SERVER["SERVER_NAME"];
        $body = file_get_contents("../Mail/verifyEmailTemplate/index.html");
        $body = str_replace("REPLACE", "$token", $body);
        $body = str_replace("USERNAME", "$name", $body);
        $mail = new SendMail();
        $mail->sendMail(
            $c_mail,
            "Resend Token for Verify",
            $body
        );
        ob_clean();
        $_SESSION["verifyPwToken"] = $token;
        $_SESSION["resendStatus"] = "We have sent a new token! Check your Email again!";
        header("Location: ../View/Login/verifyPassword.php");
    }    
}
?>