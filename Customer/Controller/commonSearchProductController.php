<?php
session_start();
if (!isset($_POST["searchCommon"])) {
    header("Location: ../View/Error/error.php");
} else {
    $_SESSION["searchInput"] = $_POST["searchCommon"];
    header("Location: ./afterCommonSearchProductController.php");
}
