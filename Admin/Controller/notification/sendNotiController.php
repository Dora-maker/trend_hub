<?php

session_start();

if (!isset($_POST["sendNoti"])) {
    header("Location: ../../View/Error/error.php");
} else {
    $notiTo =  $_POST["notiTo"];
    $title = $_POST["title"];
    $message = $_POST["message"];
    include "../../Model/model.php";

    if ($notiTo == "customer") {
        $email = $_POST["email"];

        $sql = $pdo->prepare(
            "SELECT id FROM m_customers
            WHERE c_email = :email
            AND del_flg = 0
            "
        );
        $sql->bindValue(":email", $email);
        $sql->execute();
        $searchEmail = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($searchEmail) == 0) {
            $_SESSION["noEmail"] = "Email Not Found!";
            header("Location: ../../View/Notification/sendNoti.php");
        } else {
            $customerID = $searchEmail[0]["id"];

            $sql = $pdo->prepare(
                "INSERT INTO t_notify_to_customers
                (
                    title,
                    message,
                    customer_id,
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
            $sql->bindValue(":id", $customerID);
            $sql->bindValue(":createDate", date("Y-m-d"));
            $sql->execute();
            $_SESSION["success"] = "Notification sent successfully!";
            header("Location: ../../View/Notification/sendNoti.php");
        }
    } elseif ($notiTo == "merchant") {
        $email = $_POST["email"];

        $sql = $pdo->prepare(
            "SELECT id FROM m_marchents
            WHERE m_email = :email
            AND del_flg = 0
            "
        );
        $sql->bindValue(":email", $email);
        $sql->execute();
        $searchEmail = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($searchEmail) == 0) {
            $_SESSION["noEmail"] = "Email Not Found!";
            header("Location: ../../View/Notification/sendNoti.php");
        } else {
            $merchantID = $searchEmail[0]["id"];

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
            $sql->bindValue(":id", $merchantID);
            $sql->bindValue(":createDate", date("Y-m-d"));
            $sql->execute();
            $_SESSION["success"] = "Notification sent successfully!";
            header("Location: ../../View/Notification/sendNoti.php");
        }
    } elseif ($notiTo == "allCustomers") {
        $sql = $pdo->prepare(
            "SELECT id FROM m_customers
            WHERE del_flg = 0
            "
        );
        $sql->execute();
        $searchIDs = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($searchIDs as $eachID) {
            $id = $eachID["id"];
            $sql = $pdo->prepare(
                "INSERT INTO t_notify_to_customers
                (
                    title,
                    message,
                    customer_id,
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
            $sql->bindValue(":id", $id);
            $sql->bindValue(":createDate", date("Y-m-d"));
            $sql->execute();
        }
        $_SESSION["success"] = "Notification sent successfully!";
        header("Location: ../../View/Notification/sendNoti.php");
    } elseif ($notiTo == "allMerchants") {
        $sql = $pdo->prepare(
            "SELECT id FROM m_marchents
            WHERE del_flg = 0
            "
        );
        $sql->execute();
        $searchIDs = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($searchIDs as $eachID) {
            $id = $eachID["id"];
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
            $sql->bindValue(":id", $id);
            $sql->bindValue(":createDate", date("Y-m-d"));
            $sql->execute();
        }
        $_SESSION["success"] = "Notification sent successfully!";
        header("Location: ../../View/Notification/sendNoti.php");
    }
}
