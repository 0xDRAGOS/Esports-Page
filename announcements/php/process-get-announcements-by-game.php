<?php
session_start();

if(isset($_GET['gameId']) && !empty($_GET['gameId'])) {
    $gameId = $_GET['gameId'];

    $mysqli = require "../../database/database.php";
    $sql = "SELECT id, title, content, cover_image FROM announcement WHERE game_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $gameId);

    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    $announcements = array();

    while ($row = $result->fetch_assoc()) {
        $announcementObj = new stdClass();

        $announcementObj->id = $row['id'];
        $announcementObj->title = $row['title'];
        $announcementObj->content = $row['content'];
        $announcementObj->cover_image = $row['cover_image'];

        $announcements[] = $announcementObj;
    }

    $response = [
        'announcements' => $announcements,
        'isAdmin' => isset($_SESSION['user']) && $_SESSION['user']['isAdmin'] == 1
    ];

    echo json_encode($response);

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid gameId.";
}
?>
