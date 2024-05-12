<?php

if (isset($_GET['playerId']) && is_numeric($_GET['playerId'])) {

    $mysqli = require "../../database/database.php";

    $playerId = $mysqli->real_escape_string($_GET['playerId']);

    $sql = "SELECT id, firstName, lastName, birthday, nationality, aliasName, position, team_id FROM player WHERE id = ?";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("i", $playerId);

    $playerObj = new stdClass();

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {

            $playerObj->id = $row["id"];
            $playerObj->firstName = $row['firstName'];
            $playerObj->lastName = $row['lastName'];
            $playerObj->birthday = $row['birthday'];
            $playerObj->nationality = $row['nationality'];
            $playerObj->alias = $row['aliasName'];
            $playerObj->position = $row['position'];
            $playerObj->team_id = $row['team_id'];
        } else {
            echo "No records found.";
        }
    } else {
        echo "Execution failed: " . $stmt->error;
    }

    echo json_encode($playerObj);

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid player ID.";
}
?>