<?php
session_start();

if (isset($_GET["productId"])) {
    $productID = $_GET["productId"]; //get method
    $customerID = $_SESSION["currentLoginUser"];
    $_SESSION["currentDetailPrdocutID"] = $productID;
    include "../Model/model.php";

    //For detail card
    $sql = $pdo->prepare(
        "SELECT m_products.*, m_marchents.m_name 
    FROM m_products 
    JOIN m_marchents 
    ON m_products.merchant_id = m_marchents.id
    WHERE m_products.id = :id"
    );
    $sql->bindValue(":id", $productID);
    $sql->execute();
    $_SESSION["productDetail"] = $sql->fetchAll(PDO::FETCH_ASSOC);


    $sql = $pdo->prepare(
        "SELECT SUM(rating) as total_rating  
    FROM t_review_details
    WHERE product_id = :id
    "
    );
    $sql->bindValue(":id", $productID);
    $sql->execute();
    $sumRating = $sql->fetchAll(PDO::FETCH_ASSOC);


    $sql = $pdo->prepare(
        "SELECT *  FROM t_review_details
    WHERE product_id = :id
    "
    );
    $sql->bindValue(":id", $productID);
    $sql->execute();
    $totalReviews = $sql->fetchAll(PDO::FETCH_ASSOC);
    $totalRating = count($totalReviews);
    $_SESSION["averageRating"] = ($sumRating[0]["total_rating"] > 0) ? $sumRating[0]["total_rating"] / $totalRating : 5;
    $_SESSION["totalRatedCustomer"] = ($totalRating > 0) ? $totalRating : "none";


    $sql = $pdo->prepare(
        "SELECT * FROM t_review_details
    WHERE product_id = :id
    AND rating = :rating
    "
    );
    $sql->bindValue(":id", $productID);
    $sql->bindValue(":rating", 5);
    $sql->execute();
    $totalFivestarRating = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["totalFivestarRating"] = count($totalFivestarRating);


    $sql = $pdo->prepare(
        "SELECT * FROM t_review_details
    WHERE product_id = :id
    AND rating = :rating
    "
    );
    $sql->bindValue(":id", $productID);
    $sql->bindValue(":rating", 4);
    $sql->execute();
    $totalFourstarRating = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["totalFourstarRating"] = count($totalFourstarRating);


    $sql = $pdo->prepare(
        "SELECT * FROM t_review_details
    WHERE product_id = :id
    AND rating = :rating
    "
    );
    $sql->bindValue(":id", $productID);
    $sql->bindValue(":rating", 3);
    $sql->execute();
    $totalThreestarRating = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["totalThreestarRating"] = count($totalThreestarRating);


    $sql = $pdo->prepare(
        "SELECT * FROM t_review_details
    WHERE product_id = :id
    AND rating = :rating
    "
    );
    $sql->bindValue(":id", $productID);
    $sql->bindValue(":rating", 2);
    $sql->execute();
    $totalTwostarRating = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["totalTwostarRating"] = count($totalTwostarRating);


    $sql = $pdo->prepare(
        "SELECT * FROM t_review_details
    WHERE product_id = :id
    AND rating = :rating
    "
    );
    $sql->bindValue(":id", $productID);
    $sql->bindValue(":rating", 1);
    $sql->execute();
    $totalOnestarRating = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["totalOnestarRating"] = count($totalOnestarRating);


    $sql = $pdo->prepare(
        "SELECT t_review_details.*,m_customers.c_name,m_products.merchant_id,m_marchents.m_name,m_marchents.m_bname
    FROM t_review_details
    JOIN m_customers
    ON t_review_details.customer_id = m_customers.id
    JOIN m_products
    ON t_review_details.product_id = m_products.id
    JOIN m_marchents
    ON m_products.merchant_id = m_marchents.id
    WHERE product_id = :productID
    AND t_review_details.del_flg = 0
    ORDER BY t_review_details.create_date DESC
    LIMIT 3
    "
    );
    $sql->bindValue(":productID", $productID);
    $sql->execute();
    $_SESSION["reviews"] = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $pdo->prepare(
        "SELECT wishlist_id
        FROM m_customers
        WHERE m_customers.id = :id"
    );
    $sql->bindValue(":id", $customerID);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    $wishlistId = $result[0]["wishlist_id"];

    $sql = $pdo->prepare(
        "SELECT product_id
    FROM t_wishlist_details
    WHERE t_wishlist_details.wishlist_id = :id AND t_wishlist_details.del_flg = 0"
    );

    $sql->bindValue(":id", $wishlistId);
    $sql->execute();
    $wishlistedProductIdList = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["isWishlisted"] = false;
    foreach ($wishlistedProductIdList as $wishlist) {
        if($wishlist["product_id"] == $productID){
            $_SESSION["isWishlisted"] = true;
        }
    }

    header("Location: ../View/Product/itemDetail.php");
} else {
    header("Location: ../View/Error/error.php");
}
