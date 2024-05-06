<?php

if (empty($_POST["name"])) {
    die("Name is required!");
}

$mysqli = require "../database/database.php"; 

$sql = "INSERT INTO game (name)
        VALUES (?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("s",
                    $_POST["name"]
                    );

if ($stmt->execute()) {
    header("Location: ../teams/index.php");
    exit;
} 

?>