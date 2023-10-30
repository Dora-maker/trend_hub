<?php
ini_set('display_errors', 1);


$banner2 = $_FILES["banner2"]["name"];
$banner2Tmp = $_FILES["banner2"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($banner2Tmp, "../../../../Storage/banner/".$banner2)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        banner2 = :banner2
        WHERE id = 0;
        "
    );

    $sql->bindValue(":banner2", "/Storage/banner/".$banner2);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}


