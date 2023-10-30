<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (count($_POST) == 0) {
    echo "ERROR";
    header("Location: ../../View/Error/error.php");
} else {

    $imgTitleThree = $_POST["imgTitleThree"];
    $imgDscThree = $_POST['imgDscThree'];
    $slideBg3 = $_POST["slideBg3"];
    $slideTextColor3 = $_POST["slide_text_color3"];




    include "../../../Model/model.php";



    $sql = $pdo->prepare(
        " UPDATE ui_setting SET 
    image_silder_title3 = :imgTitleThree,
    image_silder_dsc3  = :imgDscThree,
    slide_bg3  = :slideBg3,
    slide_text_color3 = :slideTextColor3


    WHERE id = 0;
    "
    );

    $sql->bindValue(":imgTitleThree", $imgTitleThree);
    $sql->bindValue(":imgDscThree", $imgDscThree);
    $sql->bindValue(":slideBg3", $slideBg3);
   $sql->bindValue(":slideTextColor3", $slideTextColor3);





    $sql->execute();

    header("Location: ../../../View/uiElements/ui.php");
}
