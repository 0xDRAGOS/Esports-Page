<?php

if (isset($_POST['gameId']) && is_numeric($_POST['gameId'])) {

    if (empty($_POST["name"])) {
        die("Name is required!");
    }

    $mysqli = require "../../database/database.php"; 

    $game_id = $mysqli->real_escape_string($_POST['gameId']);
    $name = $_POST['name'];

    $sql = "UPDATE game SET name = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("si", $name, $game_id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Update failed: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid game ID.";
}
?>
