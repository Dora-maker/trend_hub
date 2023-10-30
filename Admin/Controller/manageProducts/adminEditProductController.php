<?php

if(!isset($_POST["saveEdit"])){
    header("Location: ../../View/Error/error.php");
}else{
    $id = $_POST["editID"];
    $sellPrice = $_POST["editSellPrice"];
    $buyPrice = $_POST["editBuyPrice"];
    $stock = $_POST["editQuantity"];
    $detail = $_POST["editProductDetail"];
    $description = $_POST["editProductDescription"];
    $previousPath = $_POST["previousPath"];
    $image = $_FILES["editProductImg"]["name"];
    $imageTmp = $_FILES["editProductImg"]["tmp_name"];

    include "../../Model/model.php";

    if(move_uploaded_file($imageTmp,"../../../Storage/adminProducts/".$image)){
        
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
        $sql->bindValue(":pPath", "/Storage/adminProducts/".$image);
        $sql->bindValue(":updateDate", date("Y-m-d"));
        $sql->bindValue(":id", $id);
        $sql->execute();
        header("Location: ./adminProductController.php");

    }elseif(!move_uploaded_file($imageTmp,"../../../Storage/adminProducts/".$image) && isset($previousPath)){
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
        $sql->bindValue(":pPath", $previousPath);
        $sql->bindValue(":updateDate", date("Y-m-d"));
        $sql->bindValue(":id", $id);
        $sql->execute();
        header("Location: ./adminProductController.php");
    } else {
        header("Location: ../../View/Error/error.php");
    }
}




?>