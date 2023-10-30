<?php
ini_set('display_errors', 1);


$logo = $_FILES["logoImg"]["name"];
$logoTmp = $_FILES["logoImg"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($logoTmp, "../../../../Storage/logo/".$logo)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        logo = :logo
        WHERE id = 0;
        "
    );

    $sql->bindValue(":logo", "/Storage/logo/".$logo);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}


