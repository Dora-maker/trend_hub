<?php
ini_set('display_errors', 1);


$banner5 = $_FILES["banner5"]["name"];
$banner5Tmp = $_FILES["banner5"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($banner5Tmp, "../../../../Storage/banner/".$banner5)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        banner5 = :banner5
        WHERE id = 0;
        "
    );

    $sql->bindValue(":banner5", "/Storage/banner/".$banner5);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}


