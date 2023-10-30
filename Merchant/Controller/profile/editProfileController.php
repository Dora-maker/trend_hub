<?php
// profile_controller.php
session_start();
if(!isset($_POST["profileChange"])){
    header("Location: ../../View/Error/error.php");
 
}else{
    
    $merchantId =  $_SESSION["currentMerchantLogin"];
    $m_name = $_POST["m_name"];
    $b_name = $_POST["b_name"];
    $b_licene = $_POST["b_licene"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    include "../../Model/model.php";


     // Check if a new file was uploaded
     if (!empty($_FILES["merimg"]["name"])) {
        $pphoto = $_FILES["merimg"]["name"];
        $pphototmp = $_FILES["merimg"]["tmp_name"];
        
        if (move_uploaded_file($pphototmp, "../../../Storage/merchantLogos/".$pphoto)) {
            $profilePath = "/Storage/merchantLogos/".$pphoto;
        } else {
            // Handle the file upload error
            header("Location: ../View/Error/error.php");
            exit();
        }
    } else {
        // If no new file uploaded, get the existing profile path from the database
        $sql = $pdo->prepare("SELECT m_logo FROM m_marchents WHERE id = :id");
        $sql->bindValue(":id",  $merchantId);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $profilePath = $row["m_logo"];
    }
    

   
    $sql = $pdo->prepare("UPDATE m_marchents SET
     m_name = :name, 
     m_logo = :logoPath,
     m_bname= :bname,
     m_licene= :licene, 
     m_phone= :phone, 
     m_email= :email, 
     m_address= :address 
      WHERE id= :id");
   

   $sql->bindValue(":name", $m_name);
   $sql->bindValue(":logoPath", $profilePath); 
   $sql->bindValue(":bname",$b_name);
   $sql->bindValue(":licene",$b_licene);
   $sql->bindValue(":phone",$phone);
   $sql->bindValue(":email",$email);
   $sql->bindValue(":address",$address);
   $sql->bindValue(":id", $merchantId);
   
 
   $sql->execute();
   $_SESSION["saveChangeController"] = true;
   $_SESSION["changeView"] = 1;

 
   header("Location: ../../View/ProfileEdit/profile.php");


 
}
?>




