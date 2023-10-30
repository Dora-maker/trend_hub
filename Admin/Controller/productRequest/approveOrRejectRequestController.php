<?php
session_start();
$_SESSION["passReqDetailController"] = true;
if ((!isset($_POST["approve"])) && (!isset($_POST["reject"]))) {
    header("Location: ../../View/Error/error.php");
} else {
    $id = $_POST["productReqDetailId"];
    $tableSubmitId = $_POST["p_submit_id"];
    $email = $_POST["merchantEmail"];
    $merchantId = $_POST["merchantId"];
    $category = $_POST["category"];
    $pname = $_POST["productName"];
    $brandName = $_POST["brandName"];
    $sellPrice = $_POST["sellPrice"];
    $buyPrice = $_POST["buyPrice"];
    $quantity = $_POST["quantity"];
    $image = $_POST["pImage"];
    $productDetail = $_POST["productDetail"];
    $productDescription = $_POST["productDescription"];
    include "../../Model/model.php";
    
    if (isset($_POST["approve"])) {
        $title = "Product " . $pname . " Accepted";
        $message = "
        Dear Sir/Madam,         
        We are thrilled to inform you that your product submission has been approved! Your product is now live and available for purchase on our platform. Congratulations! Thank you for adhering to our guidelines and providing a high-quality product. Your dedication to excellence is greatly appreciated.
        We value our partnership with you and look forward to your continued success on our platform.
        
        Best regards,
        TrendHub";

        //update product_submit_details table(approved = 1 and del_flg = 1)
        $sql = $pdo->prepare(
            "UPDATE t_product_submit_details SET 
            approved = 1,
            del_flg = 1
            WHERE id = :id"
        );
        $sql->bindValue(":id", $id);
        $sql->execute();

        //search category id for inserting into product database
        $sql = $pdo->prepare(
            "SELECT id 
            FROM m_categories
            WHERE category_name = :categoryName"
        );
        $sql->bindValue(":categoryName", $category);
        $sql->execute();
        $result =$sql->fetchAll(PDO::FETCH_ASSOC);
        $categoryId = $result[0]["id"];

        //to insert product into database
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
        $sql->bindValue(":pName", $pname);
        $sql->bindValue(":pCategory", $categoryId);
        $sql->bindValue(":pBrand", $brandName);
        $sql->bindValue(":pPath", $image);
        $sql->bindValue(":pStock", $quantity);
        $sql->bindValue(":pDescription", $productDescription);
        $sql->bindValue(":pDetail", $productDetail);
        $sql->bindValue(":buyPrice", $buyPrice);
        $sql->bindValue(":sellPrice", $sellPrice);
        $sql->bindValue(":merchantID", $merchantId);
        $sql->bindValue(":createDate", date("Y-m-d"));

        $sql->execute();

        //to notify merchant of approval of the product
        $sql = $pdo->prepare(
            "INSERT INTO t_notify_to_merchant
            (
                title,
                message,
                merchant_id,
                create_date
            )
            VALUES
            (
                :title,
                :message,
                :id,
                :createDate
            )
            "
        );
        $sql->bindValue(":title", $title);
        $sql->bindValue(":message", $message);
        $sql->bindValue(":id", $merchantId);
        $sql->bindValue(":createDate", date("Y-m-d"));
        $sql->execute();
    } else {
        $title = "Product " . $pname . " Rejected";
        $message = "
        Dear Sir/Madam,         
        Sorry to inform you that this product has been rejected. We look forward to seeing other types of product requests that meet our standards to be able to sell on our platform.
        
        Best regards,
        TrendHub";

        //to update the database (reject = 1 and del_flg = 1)
        $sql = $pdo->prepare(
            "UPDATE t_product_submit_details SET 
            rejected = 1,
            del_flg = 1,
            update_date = :updateDate
            WHERE id = :id"
        );
        $sql->bindValue(":updateDate", date("Y-m-d"));
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        //to notify merchant of rejection
        $sql = $pdo->prepare(
            "INSERT INTO t_notify_to_merchant
            (
                title,
                message,
                merchant_id,
                create_date
            )
            VALUES
            (
                :title,
                :message,
                :id,
                :createDate
            )
            "
        );
        $sql->bindValue(":title", $title);
        $sql->bindValue(":message", $message);
        $sql->bindValue(":id", $merchantId);
        $sql->bindValue(":createDate", date("Y-m-d"));
        $sql->execute();
    }

    //to update the session[reqdetail]
    $sql = $pdo->prepare(
        "SELECT t_product_submit_details.*, m_categories.category_name
        FROM t_product_submit_details
        JOIN m_categories
        ON t_product_submit_details.category_id = m_categories.id
        WHERE product_submit_id = :id"
    );
    
    $sql->bindValue(":id", $tableSubmitId);
    $sql->execute();
    $reqDetails = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["reqDetails"] = $reqDetails;

    //check total req of each merchant
    $sql = $pdo->prepare(
        "SELECT COUNT(product_submit_id) AS totalReq
        FROM t_product_submit_details
        WHERE product_submit_id = :id;"
    );
    
    $sql->bindValue(":id", $tableSubmitId);
    $sql->execute();
    $result1 = $sql->fetchAll(PDO::FETCH_ASSOC);

    //check finished approve or reject by searching del_flg
    $sql = $pdo->prepare(
        "SELECT COUNT(del_flg) AS finish
        FROM t_product_submit_details
        WHERE product_submit_id = :id AND del_flg = 1;"
    );
    
    $sql->bindValue(":id", $tableSubmitId);
    $sql->execute();
    $result2 = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $_SESSION["allFinished"] = ($result1[0]["totalReq"] == $result2[0]["finish"]) ?  true : false;
    if($result1[0]["totalReq"] == $result2[0]["finish"]){
        $sql = $pdo->prepare(
            "UPDATE t_product_submits SET 
            del_flg = 1,
            update_date = :updateDate
            WHERE id = :id"
        );
        
        $sql->bindValue(":updateDate", date("Y-m-d"));
        $sql->bindValue(":id", $tableSubmitId);
        $sql->execute();
    }
    header("Location: ../../View/productRequest/productReqDetail.php");
}
