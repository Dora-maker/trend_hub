<?php

if (!isset($_POST["id"])) {
    header("Location: ../../View/Error/error.php");
}else {

    include "../../Model/model.php";
    $id = $_POST["id"];
    echo $id;
    $sql = $pdo->prepare(
        "UPDATE m_product_temp SET
        del_flg = 1
        WHERE id = :id
        "
    );
    $sql->bindValue(":id",$id);
    $sql->execute();

    // header("Location: ./adminProductController.php");

}
?>