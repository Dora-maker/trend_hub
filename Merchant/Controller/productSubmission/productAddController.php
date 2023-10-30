<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_POST["addProduct"])) {
   
} else {
    $merchantId =  $_SESSION["currentMerchantLogin"];
   
    $category = $_POST["category"];
    $productName = $_POST["productName"];
    $brand = (isset($_POST["brand"])) ? $_POST["brand"] : null;
    $sellPrice = $_POST["sellPrice"];
    $buyPrice = $_POST["buyPrice"];
    $qty = $_POST["quantity"];
    $detail = $_POST["productDetail"];
    $description = $_POST["productDescription"];
    // get photo
    $image = $_FILES["productImg"]["name"];
    $imageTmp = $_FILES["productImg"]["tmp_name"];


    include "../../Model/model.php";

    if (move_uploaded_file($imageTmp, "../../../Storage/marchentProductSubmit/" . $image)) {



        $sql = $pdo->prepare(
            "INSERT INTO m_product_temp
    (
       
        p_name,
        category_id,
        brand_name,
        p_path,
        p_stock,
        p_description,
        p_detail,
        buy_price,
        sell_price,
        merchant_id,
        create_date
    )
    VALUES
    (
        
        :pName,
        :pCategory,
        :pBrand,
        :pPath,
        :pStock,
        :pDescription,
        :pDetail,
        :buyPrice,
        :sellPrice,
        :id,
        :createDate
    )"
        );



        $sql->bindValue(":pName", $productName);
        $sql->bindValue(":pCategory", $category);
        $sql->bindValue(":pBrand", $brand);
        $sql->bindValue(":pPath", "/Storage/marchentProductSubmit/" . $image);
        $sql->bindValue(":pStock", $qty);
        $sql->bindValue(":pDescription", $description);
        $sql->bindValue(":pDetail", $detail);
        $sql->bindValue(":buyPrice", $buyPrice);
        $sql->bindValue(":sellPrice", $sellPrice);
        $sql->bindValue(":id", $merchantId);
        $sql->bindValue(":createDate", date("Y-m-d"));

        $sql->execute();
       
        header("Location: ../../View/productSubmission/productSubmission.php");
      
    } else {
        header("Location: ../../View/Error/error.php");
    }
}