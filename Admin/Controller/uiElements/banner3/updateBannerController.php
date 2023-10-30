<?php
ini_set('display_errors', 1);


$banner3 = $_FILES["banner3"]["name"];
$banner3Tmp = $_FILES["banner3"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($banner3Tmp, "../../../../Storage/banner/".$banner3)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        banner3 = :banner3
        WHERE id = 0;
        "
    );

    $sql->bindValue(":banner3", "/Storage/banner/".$banner3);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}


