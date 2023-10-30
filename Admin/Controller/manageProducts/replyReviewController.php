<?php

if (!isset($_POST["replyToCustomer"])) {
    header("Location: ../../View/Error/error.php");
}else{
    $replyCustomerID = $_POST["replyCustomerID"];
    $productDetailID = $_POST["productDetailID"];
    $replyText = $_POST["replyText"];

    include "../../Model/model.php";
    $sql = $pdo->prepare(
        "UPDATE t_review_details SET
        reply_text = :replyText,
        update_date = :updateDate
        WHERE customer_id = :customerID
        AND product_id = :productID
        "
    );
    $sql->bindValue(":replyText", $replyText);
    $sql->bindValue(":updateDate", date("Y-m-d"));
    $sql->bindValue(":customerID", $replyCustomerID);
    $sql->bindValue(":productID", $productDetailID);
    $sql->execute();
    header("Location: ../../View/manageProduct/adminProducts.php");

}





?>