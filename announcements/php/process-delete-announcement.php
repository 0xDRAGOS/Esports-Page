<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $mysqli = require "../../database/database.php"; 

    $announcementId = $mysqli->real_escape_string($_GET['id']);

    $sql = "DELETE FROM announcement WHERE id = $announcementId";


    if ($mysqli->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "Invalid game ID.";
}
?>
