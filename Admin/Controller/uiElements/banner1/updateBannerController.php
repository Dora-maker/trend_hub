<?php
ini_set('display_errors', 1);


$banner1 = $_FILES["banner1"]["name"];
$banner1Tmp = $_FILES["banner1"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($banner1Tmp, "../../../../Storage/banner/".$banner1)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        banner1 = :banner1
        WHERE id = 0;
        "
    );

    $sql->bindValue(":banner1", "/Storage/banner/".$banner1);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}



