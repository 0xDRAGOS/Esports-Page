<?php

if (isset($_GET['gameId']) && is_numeric($_GET['gameId'])) {

    $mysqli = require "../../database/database.php"; 

    $gameId = $mysqli->real_escape_string($_GET['gameId']);

    $sql = "SELECT id, name FROM game WHERE id = ?";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("i", $gameId);

    $gameObj = new stdClass();

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            
            $gameObj->id = $row["id"];
            $gameObj->name = $row['name'];
        } else {
            echo "No records found.";
        }
    } else {
        echo "Execution failed: " . $stmt->error;
    }

    echo json_encode($gameObj);

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid game ID.";
}
?>