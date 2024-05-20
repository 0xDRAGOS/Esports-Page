<?php

if(isset($_GET['announcementId']) && !empty($_GET['announcementId'])) {
    $announcementId = $_GET['announcementId'];

    $mysqli = require "../../database/database.php";
    $sql = "SELECT announcement.id, title, content, cover_image, game.name as gameName, game.id as gameId 
            FROM announcement 
            JOIN game ON announcement.game_id = game.id
            WHERE announcement.id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $announcementId);

    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    $announcementObj = new stdClass();

    if ($row = $result->fetch_assoc()) {
        $announcementObj->id = $row['id'];
        $announcementObj->title = $row['title'];
        $announcementObj->content = $row['content'];
        $announcementObj->cover_image = $row['cover_image'];
        $announcementObj->game_name = $row['gameName'];
        $announcementObj->game_id = $row['gameId'];
    }

    echo json_encode($announcementObj);

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid gameId.";
}
?>
