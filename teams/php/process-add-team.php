<?php

if (empty($_POST["name"])) {
    die("Name is required!");
}

if (empty($_POST["founded"])) {
    die("Founded date is required!");
}

if (empty($_POST["game"])) {
    die("Game is required!");
}

$mysqli = require "../../database/database.php"; 

$sql = "INSERT INTO team (name, founded, game_id)
        VALUES (?, ?, ?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$name = mysqli_real_escape_string($mysqli, $_POST["name"]);
$game_id = mysqli_real_escape_string($mysqli, $_POST["game"]);

$founded_formatted = date('Y-m-d', strtotime($_POST["founded"]));

$stmt->bind_param("ssi",
                    $name,
                    $founded_formatted,
                    $game_id
                    );

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} 

?>