<?php
if(isset($_POST["regionCheckOutId"])){
    $regionId = $_POST["regionCheckOutId"];
    include "../../Model/model.php";
    $sql = $pdo->prepare(
        "SELECT *
        FROM m_townships
        WHERE region_id = :id"
    );
    $sql->bindValue(":id", $regionId);
    $sql->execute();
    $townshipLists = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $pdo->prepare(
        "SELECT delivery_fee
        FROM m_regions
        WHERE id = :id"
    );
    $sql->bindValue(":id", $regionId);
    $sql->execute();
    $deliFees = $sql->fetchAll(PDO::FETCH_ASSOC);
    $data = [$townshipLists, $deliFees];
    echo json_encode($data);
}

?>