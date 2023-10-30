<?php

session_start();

if (!isset($_POST["register"])) {
    header("Location: ../View/Error/error.php");
} else {
    $cUsername = $_POST["username"];
    $cEmail = $_POST["email"];
    $cRegion = $_POST["region"];
    $cTownship = $_POST["township"];
    $cAddress = $_POST["address"];
    $cPhone = $_POST["phone"];
    $cPassword = $_POST["password"];
    $cConfirmPassword = $_POST["confirm_password"];

    include "../Model/model.php";

    // To check email already exits or not 
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers WHERE c_email = :email"
    );
    $sql->bindValue(":email", $cEmail);
    $sql->execute();
    $searchEmailResult = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Check email already exits or not 
    if (count($searchEmailResult) > 0) {
        $_SESSION["emailError"] = "Email is already exists!";
        $_SESSION["cUsername"] = $cUsername;
        $_SESSION["cEmail"] = $cEmail;
        $_SESSION["cRegion"] = $cRegion;
        $_SESSION["cTownship"] = $cTownship;
        $_SESSION["cAddress"] = $cAddress;
        $_SESSION["cPhone"] = $cPhone;
        header("Location: ../View/Login/signup.php");

        // Check password and confirm password are the same or not 
    } elseif ($cPassword != $cConfirmPassword) {
        $_SESSION["pwdError"] = "Password must be the same!";
        $_SESSION["cUsername"] = $cUsername;
        $_SESSION["cEmail"] = $cEmail;
        $_SESSION["cRegion"] = $cRegion;
        $_SESSION["cTownship"] = $cTownship;
        $_SESSION["cAddress"] = $cAddress;
        $_SESSION["cPhone"] = $cPhone;
        header("Location: ../View/Login/signup.php");
    } else {
        // Import commonFunction to use getToken function 
        include "../View/resources/common/commonFunction.php";

        // Genereate token 
        $token = getToken(128);

        // To check email already exits or not 
        $sql = $pdo->prepare(
            "SELECT id FROM m_customers ORDER BY id DESC LIMIT 1"
        );
        $sql->execute();
        $searchIdResult = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // insert into database 
        $sql = $pdo->prepare(
            "INSERT INTO m_customers
                (
                    c_name,
                    c_email,
                    c_phone,
                    c_password,
                    region_id,
                    township_id,
                    c_address,
                    wishlist_id,
                    token,
                    create_date
                )
                VALUES
                (
                    :cUsername,
                    :cEmail,
                    :cPhone,
                    :cPassword,
                    :cRegion,
                    :cTownship,
                    :cAddress,
                    :wishlist,
                    :token,
                    :createDate
                )           
            "
        );
        if(count($searchIdResult) == 0){
            $id = 1;
        }else{
            $id = $searchIdResult[0]["id"] + 1;
        }
        
        $sql->bindValue(":cUsername", $cUsername);
        $sql->bindValue(":cEmail", $cEmail);
        $sql->bindValue(":cPhone", $cPhone);
        $sql->bindValue(":cPassword", password_hash($cPassword, PASSWORD_DEFAULT));
        $sql->bindValue(":cRegion", $cRegion);
        $sql->bindValue(":cTownship", $cTownship);
        $sql->bindValue(":cAddress", $cAddress);
        $sql->bindValue(":wishlist", $id);
        $sql->bindValue(":token", $token);
        $sql->bindValue(":createDate", date("Y-m-d"));

        $sql->execute();

        // import mailSender 
        include "../View/resources/common/mailSender.php";
        // send email 
        $domain = $_SERVER["SERVER_NAME"];
        $mail = new SendMail();
        $mail->sendMail(
            $cEmail,
            "Welcome To TrendHUB",
            "<p>Thank you for your customer registeration!</p>
            <a href='http://$domain/Trend_HUB/Customer/Controller/verifyController.php?token=$token'>Click here to veirfy your account!</a>"
        );

        $_SESSION["registerd"] = "Registration is completed! You need to verify your account before login. Please Check your email to verify your account!";
        header("Location: ../View/Login/login.php");
    }
}

// print_r($_POST);
