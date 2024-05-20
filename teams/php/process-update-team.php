<?php

if (isset($_POST['teamId']) && is_numeric($_POST['teamId'])) {

    if (empty($_POST["name"])) {
        die("Name is required!");
    }

    if (empty($_POST["founded"])) {
        die("Founded date is required!");
    }

    if (empty($_POST["game"])) {
        die("Game ID is required!");
    }

    $mysqli = require "../../database/database.php"; 

    $teamId = $mysqli->real_escape_string($_POST['teamId']);
    $name = $mysqli->real_escape_string($_POST['name']);
    $founded = $mysqli->real_escape_string($_POST['founded']);
    $gameId = $mysqli->real_escape_string($_POST['game']);

    $sql = "UPDATE team SET name = ?, founded = ?, game_id = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ssii", $name, $founded, $gameId, $teamId);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Update failed: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid team ID.";
}
?>
