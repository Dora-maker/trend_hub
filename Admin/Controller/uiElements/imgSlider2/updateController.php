<?php
ini_set('display_errors', 1);


$slide2 = $_FILES["slide2"]["name"];
$slide2Tmp = $_FILES["slide2"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($slide2Tmp, "../../../../Storage/slider/".$slide2)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        image_silder2 = :slide2
        WHERE id = 0;
        "
    );

    $sql->bindValue(":slide2", "/Storage/slider/".$slide2);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}



