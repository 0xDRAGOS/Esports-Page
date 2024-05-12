<?php

if (isset($_GET['teamId']) && is_numeric($_GET['teamId'])) {

    $mysqli = require "../../database/database.php"; 

    $teamId = $mysqli->real_escape_string($_GET['teamId']);

    $sql = "SELECT id, name, founded, game_id FROM team WHERE id = ?";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("i", $teamId);

    $teamObj = new stdClass();

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            
            $teamObj->id = $row["id"];
            $teamObj->name = $row['name'];
            $teamObj->founded = $row['founded'];
            $teamObj->game_id = $row['game_id'];
        } else {
            echo "No records found.";
        }
    } else {
        echo "Execution failed: " . $stmt->error;
    }

    echo json_encode($teamObj);

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid team ID.";
}
?>