<?php


if(!isset($_POST["addProduct"])){
    header("Location: ../../View/Error/error.php");
}else{
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

    if(move_uploaded_file($imageTmp,"../../../Storage/adminProducts/".$image)){

        // $sql = $pdo->prepare(
        //     "SELECT * FROM m_products ORDER BY id DESC LIMIT 1"
        // );
        // $sql->execute();
        // $result =$sql->fetchAll(PDO::FETCH_ASSOC);
        // $lastID = $result[0]["id"];
        
        $sql = $pdo->prepare(
            "INSERT INTO m_products
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
                :merchantID,
                :createDate
            )
            "
        );

        $sql->bindValue(":pName", $productName);
        $sql->bindValue(":pCategory", $category);
        $sql->bindValue(":pBrand", $brand);
        $sql->bindValue(":pPath", "/Storage/adminProducts/".$image);
        $sql->bindValue(":pStock", $qty);
        $sql->bindValue(":pDescription", $description);
        $sql->bindValue(":pDetail", $detail);
        $sql->bindValue(":buyPrice", $buyPrice);
        $sql->bindValue(":sellPrice", $sellPrice);
        $sql->bindValue(":merchantID", 1);
        $sql->bindValue(":createDate", date("Y-m-d"));

        $sql->execute();
        header("Location: ./adminProductController.php");

    } else {
        header("Location: ../../View/Error/error.php");
    }
}



?>