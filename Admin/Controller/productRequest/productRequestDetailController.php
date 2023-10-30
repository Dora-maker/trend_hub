<?php
session_start();
if (!isset($_POST["allReq"])) {
    header("Location: ../../View/Error/error.php");
} else {
    $id = $_POST["reqId"];
    $_SESSION["id"] = $_POST["reqId"];
    $_SESSION["bname"] = $_POST["bname"];
    $_SESSION["mid"] = $_POST["mid"];
    $_SESSION["m_email"] = $_POST["email"];

    include "../../Model/model.php";
    $sql = $pdo->prepare(
        "SELECT t_product_submit_details.*, m_categories.category_name
        FROM t_product_submit_details
        JOIN m_categories
        ON t_product_submit_details.category_id = m_categories.id
        WHERE product_submit_id = :id"
    );
    
    $sql->bindValue(":id", $id);
    $sql->execute();
    $reqDetails = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["reqDetails"] = $reqDetails;

    $sql = $pdo->prepare(
        "SELECT COUNT(t_product_submit_details.id) AS total
        FROM t_product_submit_details
        WHERE product_submit_id = :id"
    );
    $sql->bindValue(":id", $id);
    $sql->execute();
    $eachMerchantTotalReq = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["total"] = $eachMerchantTotalReq;

    
    $_SESSION["passReqDetailController"] = true;
    
    header("Location: ../../View/productRequest/productReqDetail.php");
}
