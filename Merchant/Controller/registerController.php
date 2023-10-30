<?php

session_start();

if(!isset($_POST["register"])){
    header("Location: ../View/Error/error.php");
}else{
    $businessName = $_POST["business-name"];
    $mLicense = ($_POST["business-license"] == "") ? null : $_POST["business-license"];
    $mName = $_POST["name"];
    $mAddress = $_POST["address"];
    $mEmail = $_POST["email"];
    $mPhone = $_POST["phone"];
    $mPassword = $_POST["password"];
    $mConfirmPassword = $_POST["confirm_password"];

    include "../Model/model.php";

    // To check email already exits or not 
    $sql = $pdo->prepare(
        "SELECT * FROM m_marchents WHERE m_email = :email"
    );
    $sql->bindValue(":email", $mEmail);
    $sql->execute();
    $searchEmailResult = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Check email already exits or not 
    if(count($searchEmailResult) > 0){
        $_SESSION["emailError"] = "Email is already exists!";
        $_SESSION["mbusinessName"] = $businessName;
        $_SESSION["mLicense"] = $mLicense;
        $_SESSION["mName"] = $mName;
        $_SESSION["mAddress"] = $mAddress;
        $_SESSION["mEmail"] = $mEmail;
        $_SESSION["mPhone"] = $mPhone;
        header("Location: ../View/registration/registration.php");

        // Check password and confirm password are the same or not 
    } elseif ($mPassword != $mConfirmPassword) {
        $_SESSION["pwdError"] = "Password must be the same!";
        $_SESSION["mbusinessName"] = $businessName;
        $_SESSION["mLicense"] = $mLicense;
        $_SESSION["mName"] = $mName;
        $_SESSION["mAddress"] = $mAddress;
        $_SESSION["mEmail"] = $mEmail;
        $_SESSION["mPhone"] = $mPhone;
        header("Location: ../View/registration/registration.php");
    } else {
        // Import commonFunction to use getToken function 
        include "../View/resources/common/commonFunction.php";

        // Genereate token 
        $token = getToken(128);

        // insert into database 
        $sql = $pdo->prepare(
            "INSERT INTO m_marchents
                (
                    m_name,
                    m_bname,
                    m_email,
                    m_phone,
                    m_password,
                    m_licene,
                    m_address,
                    token,
                    create_date
                )
                VALUES
                (
                    :mName,
                    :mBName,
                    :mEmail,
                    :mPhone,
                    :mPassword,
                    :mLicene,
                    :mAddress,
                    :token,
                    :createDate
                )           
            "
        );


        $sql->bindValue(":mName", $mName);
        $sql->bindValue(":mBName", $businessName);
        $sql->bindValue(":mEmail", $mEmail);
        $sql->bindValue(":mPhone", $mPhone);
        $sql->bindValue(":mPassword", password_hash($mPassword, PASSWORD_DEFAULT));
        $sql->bindValue(":mLicene", $mLicense);
        $sql->bindValue(":mAddress", $mAddress);
        $sql->bindValue(":token", $token);
        $sql->bindValue(":createDate", date("Y-m-d"));

        $sql->execute();

        // import mailSender 
        include "../View/resources/common/mailSender.php";
        // send email 
        $domain = $_SERVER["SERVER_NAME"];
        $mail = new SendMail();
        $mail->sendMail(
            $mEmail,
            "Welcome To TrendHUB", 
            "<p>Thank you for registeration!</p>
            <a href='http://$domain/Trend_HUB/Merchant/Controller/verifyController.php?token=$token'>Click here to veirfy your account!</a>"
        );

        $_SESSION["registerd"] = "Your merchant account sign-up requires admin approval for access to our platform. The review process may take some time. Please check your email for your email varification and admin approval.";
        header("Location: ../View/Login/login.php");
    }


    

}

// print_r($_POST);
