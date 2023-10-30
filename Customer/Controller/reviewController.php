<?php

session_start();

if (!isset($_POST["submitReview"])) {
    header("Location: ../View/Error/error.php");
} elseif (isset($_POST["submitReview"]) && !isset($_SESSION["currentLoginUser"])) {
    header("Location: ../View/Login/login.php");
} else {
    include "../Model/model.php";
    $rating = $_POST["rating"];
    $title = $_POST["reviewTitle"];
    $text = $_POST["reviewText"];
    $productID = $_POST["reviewProductID"];
    $customerID = $_POST["reviewCustomerID"];

    // reviewed or not
    $sql = $pdo->prepare(
        "SELECT * FROM t_review_details
        WHERE customer_id = :customerID
        AND product_id = :productID
        "
    );
    $sql->bindValue("customerID", $customerID);
    $sql->bindValue("productID", $productID);
    $sql->execute();
    $alreadyReviewd = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $pdo->prepare(
        "SELECT id FROM t_orders WHERE customer_id = :id"
    );
    $sql->bindValue(":id", $customerID);
    $sql->execute();
    $searchOrderIDs = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (count($alreadyReviewd) > 0) {
        $_SESSION["alreadyReview"] = "You already reviewed this product!";
        header("Location: ./itemDetailController.php?productId=$productID");
    } elseif (count($searchOrderIDs) == 0) {
        // have not ordered this product
        $_SESSION["cannotReview"] = "You haven't not buy this product yet!";
        header("Location: ./itemDetailController.php?productId=$productID");
    } else {
        $productIDFound = false;
        foreach ($searchOrderIDs as $orderID) {
            $sql = $pdo->prepare(
                "SELECT product_id FROM t_order_details WHERE order_id = :id"
            );
            $sql->bindValue(":id", $orderID["id"]);
            $sql->execute();
            $productIDsResult = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($productIDsResult as $productIDResult) {
                if ($productIDResult["product_id"] == $productID) {
                    $sql = $pdo->prepare(
                        "INSERT INTO t_review_details
                        (
                            product_id,
                            customer_id,
                            review_title,
                            review_text,
                            rating,
                            create_date
                        )
                        VALUES
                        (
                            :productID,
                            :customerID,
                            :reviewTitle,
                            :reviewText,
                            :rating,
                            :reviewDate
                        )
                        "
                    );
                    $sql->bindValue(":productID", $productID);
                    $sql->bindValue(":customerID", $customerID);
                    $sql->bindValue(":reviewTitle", $title);
                    $sql->bindValue(":reviewText", $text);
                    $sql->bindValue(":rating", $rating);
                    $sql->bindValue(":reviewDate", date("Y-m-d"));
                    $sql->execute();
                    $productIDFound = true;
                    break;

                   
                }
            }

            if ($productIDFound) {
                $sql = $pdo->prepare(
                    "SELECT m_marchents.*,m_products.p_name
                    FROM m_marchents
                    JOIN m_products ON m_marchents.id = m_products.merchant_id
                    WHERE m_products.id = :id;"
                );
                $sql->bindValue(":id", $productID);
                $sql->execute();
                $merchant = $sql->fetchAll(PDO::FETCH_ASSOC);
               
            
                $productName=  $merchant[0]['p_name'];
                print_r( $productName);
                $title ="New Review for Your Product: [ $productName ]";
                $text = "A new review has been posted for your product ' $productName'.See the review details and reply.";
             
                if (($merchant[0]['id']) == 1) {
                    $sql = $pdo->prepare(
                        "INSERT INTO t_contact_customers
                        (
                          customer_id,
                          msg_text,
                          create_date
                        )
                        VALUES
                        (
                          :customerID,
                          :msg_text,
                          :create_date
                        )
                        "
                    );
                   
                    $sql->bindValue(":customerID", $customerID);
                    $sql->bindValue(":msg_text", $text);
                    $sql->bindValue(":create_date", date("Y-m-d"));
                    $sql->execute();
                } else {
                    $sql = $pdo->prepare(
                        "INSERT INTO t_notify_to_merchant
                        (
                           merchant_id,
                           title,
                           message,
                           create_date
                        )
                        VALUES
                        (
                           :merchant_id,
                           :title,
                           :message,
                           :create_date
                        )
                        "
                    );
                    $sql->bindValue(":merchant_id",($merchant[0]['id']));
                    $sql->bindValue(":title", $title);
                    $sql->bindValue(":message", $text);
                    $sql->bindValue(":create_date", date("Y-m-d"));
                    $sql->execute();
                }
            
          
                break;
            }
        }

        if (!$productIDFound) {
            // Have ordered, but not this product
            $_SESSION["cannotReview"] = "You haven't not bought this product yet!";
            header("Location: ./itemDetailController.php?productId=$productID");
        } else {
            // Successfully inserted review, redirect to item detail page
            header("Location: ./itemDetailController.php?productId=$productID");
        }
    }
}
