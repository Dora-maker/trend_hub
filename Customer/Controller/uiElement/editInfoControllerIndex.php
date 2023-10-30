<?php

include "../Model/model.php";

$sql = $pdo->prepare(
  "SELECT * FROM ui_setting;"
);
$sql->execute();

$editInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
