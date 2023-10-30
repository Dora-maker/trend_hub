<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (count($_POST) == 0) {
    echo "ERROR";
    header("Location: ../../../View/Error/error.php");
} else {
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST['gmail'];
    $address = $_POST['address'];
    $serviceTime = $_POST['time'];
    $location = $_POST['location'];
    


    include "../../../Model/model.php";

    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
    phoneNumber = :phoneNumber,
    email = :email,
    address = :address,
    time = :time,
    locationLink = :location
    WHERE id = 0;
    "
    );

    $sql->bindValue(":phoneNumber", $phoneNumber);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":address", $address);
    $sql->bindValue(":time", $serviceTime);
    $sql->bindValue(":location", $location);


    $sql->execute();

    header("Location: ../../../View/uiElements/ui.php");
}



