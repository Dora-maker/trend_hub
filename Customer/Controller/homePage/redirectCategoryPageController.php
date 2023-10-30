<?php
session_start();

if(isset($_GET["page"])){
    $page = $_GET["page"];
}else{
    $page = 1;
}

$rowLimit = 5;
$pageStart = ($page - 1) * $rowLimit;
$pageStart = ($pageStart < 0) ? 1 : $pageStart ;

if (!isset($_GET["categoryId"])) {
    header("Location: ../View/Error/error.php");
} else {
    $categoryId = $_GET["categoryId"];
    include "../../Model/model.php";
    $sql = $pdo->prepare(
        "SELECT p.*, c.category_name, m.m_name
        FROM m_products p
        JOIN m_categories c ON p.category_id = c.id
        JOIN m_marchents m ON p.merchant_id = m.id
        WHERE c.id = :id AND p.del_flg = 0
        ORDER BY p.p_name
        LIMIT $pageStart, $rowLimit
        "
    );
    $sql->bindValue(":id", $categoryId);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $pdo->prepare(
        "SELECT p.*, c.category_name, m.m_name
        FROM m_products p
        JOIN m_categories c ON p.category_id = c.id
        JOIN m_marchents m ON p.merchant_id = m.id
        WHERE c.id = :id AND p.del_flg = 0
        ORDER BY p.p_name
        "
    );
    $sql->bindValue(":id", $categoryId);
    $sql->execute();
    $productList = $sql->fetchAll(PDO::FETCH_ASSOC);
    $pageTotal = ceil(count($productList)/$rowLimit);

    $_SESSION["categoryResult"] = $result;
    $_SESSION["pageTotal"] = $pageTotal;
    $_SESSION["cId"] = $_GET["categoryId"];
    $_SESSION["currentPage"] = $page;
    header("Location: ../../View/Product/category.php");
}
?>