<?php
session_start();
$merchantId =  $_SESSION["currentMerchantLogin"];
if (isset($_POST['deleteProduct'])) {

    $idToDelete = $_POST['product_id'];

    include "../../Model/model.php";
    $sql = $pdo->prepare("UPDATE m_products SET del_flg = 1 WHERE id = :id");
    $sql->bindValue(":id", $idToDelete);
    $sql->execute();
    header("Location: ../../View/allProduct/allProduct.php");
}else if(isset($_POST["editProduct"])) {

    $id = $_POST["editID"];
    $sellPrice = $_POST["sellPrice"];
    $buyPrice = $_POST["buyPrice"];
    $stock = $_POST["quantity"];
    $detail = $_POST["productDetail"];
    $description = $_POST["productDescription"];


    include "../../Model/model.php";

    // Check if a new file was uploaded
    if (!empty($_FILES["fileUpload"]["name"])) {
        $pphoto = $_FILES["fileUpload"]["name"];
        $pphototmp = $_FILES["fileUpload"]["tmp_name"];

        if (move_uploaded_file($pphototmp, "../../../Storage/marchentProductSubmit/".$pphoto)) {
            $pPath = "/Storage/marchentProductSubmit/".$pphoto;
        } else {
            // Handle the file upload error
            header("Location: ../View/Error/error.php");
            exit();
        }
    } else {
        // If no new file uploaded, get the existing profile path from the database
        $sql = $pdo->prepare("SELECT p_path FROM m_products WHERE id = :id");
        $sql->bindValue(":id", $merchantId);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $pPath = $row["p_path"];
    }


    $sql = $pdo->prepare(
        "UPDATE m_products SET
            sell_price = :sellPrice,
            buy_price = :buyPrice,
            p_stock = :stock,
            p_detail = :detail,
            p_description = :description,
            p_path = :pPath,
            update_date = :updateDate
            WHERE id = :id
            "
    );

    $sql->bindValue(":sellPrice", $sellPrice);
    $sql->bindValue(":buyPrice", $buyPrice);
    $sql->bindValue(":stock", $stock);
    $sql->bindValue(":detail", $detail);
    $sql->bindValue(":description", $description);
    $sql->bindValue(":pPath", $pPath);
    $sql->bindValue(":updateDate", date("Y-m-d"));
    $sql->bindValue(":id", $id);
    $sql->execute();


    header("Location: ../../View/allProduct/allProduct.php");
} else {
    header("Location: ../../View/Error/error.php");
}

