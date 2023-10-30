<?php
session_start();
ob_start();

if (!isset($_POST["mVerifyBtn"]) && !isset($_POST["m_resendToken"])) {
    header("Location: ../View/Error/error.php");
} else {
    if(isset($_POST["mVerifyBtn"])){
        $verifyCode = $_POST["mVerify_code"];
        $generatedToken = $_SESSION["m_verifyPwToken"];
        if($verifyCode == $generatedToken){
            $_SESSION["m_changeAccept"] = "true";
            header("Location: ../View/Login/reset.php");
        }else{
            $_SESSION["m_verifyCodeError"] = "You have entered wrong token! Please recheck!";
            header("Location: ../View/Login/verify.php");
        }
    }else{
        //if resend is clicked
        // Import commonFunction to use getToken function 
        include "../View/resources/common/commonFunction.php";
        include "../View/resources/common/mailSender.php";

        // Genereate token 
        $token = getVerifyEmailToken();
        // send email 
        $c_mail = $_SESSION["m_verifyEmail"];
        $name = $_SESSION["m_emailUsername"];
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
        $_SESSION["m_verifyPwToken"] = $token;
        $_SESSION["m_resendStatus"] = "We have sent a new token! Check your Email again!";
        header("Location: ../View/Login/verify.php");
    }    
}
?>