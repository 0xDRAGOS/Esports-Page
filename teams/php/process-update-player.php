<?php

if (isset($_POST['playerId']) && is_numeric($_POST['playerId'])) {

    if (empty($_POST["firstName"])) {
        die("First Name is required!");
    }
    
    if (empty($_POST["lastName"])) {
        die("Last Name is required!");
    }
    
    if (empty($_POST["birthday"])) {
        die("birthday is required!");
    }
    
    if (empty($_POST["nationality"])) {
        die("Nationality is required!");
    }
    
    if (empty($_POST["alias"])) {
        die("Alias is required!");
    }
    
    if (empty($_POST["position"])) {
        die("Position is required!");
    }
    
    if (empty($_POST["team"])) {
        die("Team is required!");
    }

    $mysqli = require "../../database/database.php"; 

    $playerId = $mysqli->real_escape_string($_POST['playerId']);
    $firstName = $mysqli->real_escape_string($_POST['firstName']);
    $lastName = $mysqli->real_escape_string($_POST['lastName']);
    $birthday = $mysqli->real_escape_string($_POST['birthday']);
    $nationality = $mysqli->real_escape_string($_POST['nationality']);
    $alias = $mysqli->real_escape_string($_POST['alias']);
    $position = $mysqli->real_escape_string($_POST['position']);
    $teamId = $mysqli->real_escape_string($_POST['team']);

    $sql = "UPDATE player 
            SET firstName = ?, lastName = ?, birthday = ?, nationality = ?, aliasName = ?, position = ?, team_id = ?
            WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ssdsssii", $firstName, $lastName, $birthday, $nationality, $alias, $position, $teamId, $playerId);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Update failed: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid player ID.";
}
?>
