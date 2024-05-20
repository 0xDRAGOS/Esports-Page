<?php

if (empty($_POST["name"])) {
    die("Name is required!");
}

$mysqli = require "../../database/database.php"; 

$name = mysqli_real_escape_string($mysqli, $_POST["name"]);

$sql = "INSERT INTO game (name)
        VALUES (?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("s",
                    $name
                    );

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} 

?>