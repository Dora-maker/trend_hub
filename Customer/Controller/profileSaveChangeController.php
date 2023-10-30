<?php
session_start();
if (!isset($_POST["saveChange"])) {
    header("Location: ../View/Error/error.php");
} else {
    $id = $_SESSION["currentLoginUser"];
    $u_name = $_POST["username"];
    $phone = $_POST["phone"];
    $regionID = $_POST["region"];
    $townshipID = $_POST["township"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    
    include "../Model/model.php";
    
    // Check if a new file was uploaded
    if (!empty($_FILES["userimg"]["name"])) {
        $pphoto = $_FILES["userimg"]["name"];
        $pphototmp = $_FILES["userimg"]["tmp_name"];
        
        if (move_uploaded_file($pphototmp, "../Storage/profiles/".$pphoto)) {
            $profilePath = "/Storage/profiles/".$pphoto;
        } else {
            // Handle the file upload error
            header("Location: ../View/Error/error.php");
            exit();
        }
    } else {
        // If no new file uploaded, get the existing profile path from the database
        $sql = $pdo->prepare("SELECT c_profile FROM m_customers WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $profilePath = $row["c_profile"];
    }
    
    $sql = $pdo->prepare("UPDATE m_customers SET
            c_name = :username, 
            c_phone = :phone,
            c_profile = :ppath,
            region_id = :region, 
            township_id = :township, 
            c_email = :email, 
            c_address = :address 
            WHERE id = :id");

    $sql->bindValue(":username",  $u_name);
    $sql->bindValue(":phone", $phone);
    $sql->bindValue(":ppath", $profilePath); // Use the selected profile path
    $sql->bindValue(":region", $regionID);
    $sql->bindValue(":township", $townshipID);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":address", $address);
    $sql->bindValue(":id", $id);

    $sql->execute();

    $_SESSION["userSaveChangeController"] = true;
    $_SESSION["userChangeView"] = 1;
    
    $sql = $pdo->prepare(
        "SELECT * FROM m_customers WHERE id = :id"
    );
    $sql->bindValue(":id", $id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["userProfilePic"] = $result[0]["c_profile"];
    header("Location: ../View/Profile/user_profile.php");
    exit();
}
