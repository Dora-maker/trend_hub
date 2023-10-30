<?php
session_start();

include "../Model/model.php";
$userId =  $_SESSION["currentLoginUser"];

// Get user input from AJAX request
$message = $_POST["message"];


// Insert data into database
$sql =  $pdo->prepare("INSERT INTO t_contact_customers
(
    customer_id,
    msg_text,
    create_date
) 
     VALUES 
       (
        :id,
        :msg,
        :createDate
       )");

$sql->bindValue(":id", $userId);
$sql->bindValue(":msg", $message);
$sql->bindValue(":createDate", date("Y-m-d"));

$sql->execute();
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Data added successfully"));
} else {
    echo json_encode(array("message" => "Error: " . $conn->error));
}

?>
