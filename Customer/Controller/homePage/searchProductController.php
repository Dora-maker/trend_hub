<?php
session_start();
if (!isset($_POST["searchHome"])) {
    header("Location: ../../View/Error/error.php");
} else {
    $_SESSION["searchInput"] = $_POST["searchHome"];
    header("Location: ./afterSearchProductController.php");
}
