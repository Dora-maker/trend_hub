<?php
ini_set('display_errors', 1);


$slide1 = $_FILES["slide1"]["name"];
$slide1Tmp = $_FILES["slide1"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($slide1Tmp, "../../../../Storage/slider/".$slide1)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        image_silder1 = :slide1
        WHERE id = 0;
        "
    );

    $sql->bindValue(":slide1", "/Storage/slider/".$slide1);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}



