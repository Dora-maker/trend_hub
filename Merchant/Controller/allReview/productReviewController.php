<?php

if (!isset($_POST["id"])) {
    header("Location: ../../View/Error/error.php");
}else{
    include "../../Model/model.php";
    $reviewProductID =  $_POST["id"];


    $sql = $pdo->prepare(
        "SELECT t_review_details.*, m_products.p_name, m_products.p_path, m_customers.c_name 
        FROM t_review_details
        JOIN m_products
        ON t_review_details.product_id = m_products.id
        JOIN m_customers
        ON t_review_details.customer_id = m_customers.id
        WHERE product_id = :id
        "
    );
    $sql->bindValue(":id", $reviewProductID);
    $sql->execute();
    $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($reviews);

}
?>