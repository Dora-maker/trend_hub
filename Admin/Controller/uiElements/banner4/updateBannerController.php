<?php
ini_set('display_errors', 1);


$banner4 = $_FILES["banner4"]["name"];
$banner4Tmp = $_FILES["banner4"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($banner4Tmp, "../../../../Storage/banner/".$banner4)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        banner4 = :banner4
        WHERE id = 0;
        "
    );

    $sql->bindValue(":banner4", "/Storage/banner/".$banner4);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}


