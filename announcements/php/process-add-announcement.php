<?php

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

$targetDir = "images/";
$targetFile = $targetDir . basename($_FILES["cover-image"]["name"]);

if ($_FILES["cover-image"]["error"] != UPLOAD_ERR_OK) {
    die("File upload error: " . $_FILES["cover-image"]["error"]);
}

if (!move_uploaded_file($_FILES["cover-image"]["tmp_name"], $targetFile)) {
    die("Sorry, there was an error uploading your file.");
}

$mysqli = require "../../database/database.php"; 

$sql = "INSERT INTO announcement (title, content, cover_image, game_id)
        VALUES (?, ?, ?, ?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssi",
                    $_POST["title"],
                    $_POST["content"],
                    $targetFile,
                    $_POST["game"]
                    );

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} 

?>
