<?php
ini_set('display_errors', 1);


$slide3 = $_FILES["slide3"]["name"];
$slide3Tmp = $_FILES["slide3"]["tmp_name"];
include "../../../Model/model.php";


if (move_uploaded_file($slide3Tmp, "../../../../Storage/slider/".$slide3)) {
    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
        image_silder3 = :slide3
        WHERE id = 0;
        "
    );

    $sql->bindValue(":slide3", "/Storage/slider/".$slide3);
    $sql->execute();
    header("Location: ../../../View/uiElements/ui.php");
} else {
    header("Location: ../../../View/Error/error.php");
}



