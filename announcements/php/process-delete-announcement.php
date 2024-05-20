<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $mysqli = require "../../database/database.php"; 

    $announcementId = $_GET['id'];

    $sql = "DELETE FROM announcement WHERE id = ?";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("i", $announcementId);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid game ID.";
}
?>
