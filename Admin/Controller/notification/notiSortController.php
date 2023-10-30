<?php

if (!isset($_POST["sortText"])) {
    header("Location: ../../View/Error/error.php");
} else {
    $sort = $_POST["sortText"];
    include "../../Model/model.php";
    if ($sort == "all") {

        $sql = $pdo->prepare(
            "SELECT t_contact_customers.*,m_customers.del_flg,m_customers.c_name  
        FROM t_contact_customers
        JOIN m_customers
        ON t_contact_customers.customer_id = m_customers.id
        WHERE m_customers.del_flg = 0
        "
        );
        $sql->execute();
        $customersContact = $sql->fetchAll(PDO::FETCH_ASSOC);

        $sql = $pdo->prepare(
            "SELECT t_contact_merchants.*,m_marchents.del_flg,m_marchents.m_name  
        FROM t_contact_merchants
        JOIN m_marchents
        ON t_contact_merchants.merchant_id = m_marchents.id
        WHERE m_marchents.del_flg = 0
        "
        );
        $sql->execute();
        $merchantsContact = $sql->fetchAll(PDO::FETCH_ASSOC);

        $mergedArray = array_merge($customersContact, $merchantsContact);

        function sortByCreateDateDesc($a, $b)
        {
            $timestampA = strtotime($a["create_date"]);
            $timestampB = strtotime($b["create_date"]);

            return $timestampB - $timestampA;
        }

        usort($mergedArray, 'sortByCreateDateDesc');
        echo json_encode($mergedArray);
    } elseif ($sort == "customer") {
        $sql = $pdo->prepare(
            "SELECT t_contact_customers.*,m_customers.del_flg,m_customers.c_name  
        FROM t_contact_customers
        JOIN m_customers
        ON t_contact_customers.customer_id = m_customers.id
        WHERE m_customers.del_flg = 0
        ORDER BY create_date DESC
        "
        );
        $sql->execute();
        $customersContact = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($customersContact);
    } elseif ($sort == "merchant") {
        $sql = $pdo->prepare(
            "SELECT t_contact_merchants.*,m_marchents.del_flg,m_marchents.m_name  
        FROM t_contact_merchants
        JOIN m_marchents
        ON t_contact_merchants.merchant_id = m_marchents.id
        WHERE m_marchents.del_flg = 0
        ORDER BY create_date DESC
        "
        );
        $sql->execute();
        $merchantsContact = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($merchantsContact);
    }
}
