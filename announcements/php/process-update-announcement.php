<?php

if (empty($_POST["announcementId"])) {
    die("Announcement ID is required!");
}

if (!is_numeric($_POST["announcementId"])) {
    die("Announcement ID must be int!");
}

if (empty($_POST["title"])) {
    die("Title is required!");
}

if (empty($_POST["content"])) {
    die("Content is required!");
}

if (empty($_FILES["cover-image"]["name"])) {
    die("Cover image is required!");
}

if (empty($_POST["game"])) {
    die("Game id is required!");
}

$targetDir = "../images/";
$imageFileType = strtolower(pathinfo($_FILES["cover-image"]["name"], PATHINFO_EXTENSION));
$title = $_POST["title"];
$targetFile = $targetDir . $title . "." . $imageFileType;

if ($_FILES["cover-image"]["error"] != UPLOAD_ERR_OK) {
    die("File upload error: " . $_FILES["cover-image"]["error"]);
}

if (!move_uploaded_file($_FILES["cover-image"]["tmp_name"], $targetFile)) {
    die("Sorry, there was an error uploading your file.");
}

$mysqli = require "../../database/database.php"; 

$sql = "UPDATE announcement
        SET title = ?, content = ?, cover_image = ?, game_id = ?
        WHERE announcement.id = ?;
        ";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$targetFileDatabase = "images/" . $title . "." . $imageFileType;
$stmt->bind_param("sssii",
                    $_POST["title"],
                    $_POST["content"],
                    $targetFileDatabase,
                    $_POST["game"],
                    $_POST["announcementId"]
                    );

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} 

$stmt->close();
?>
