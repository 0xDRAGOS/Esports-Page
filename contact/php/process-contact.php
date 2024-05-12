<?php
session_start();


if (empty($_GET["firstName"])) {
    die("First Name is required!");
}

if (empty($_GET["lastName"])) {
    die("Last Name is required!");
}

if (!filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required!");
}

if (empty($_GET["message"])) {
    die("Message is required!");
}


$mysqli = require "../../database/database.php"; 

$sql = "INSERT INTO contact_message (firstName, lastName, email, message)
        VALUES (?, ?, ?, ?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                    $_GET["firstName"],
                    $_GET["lastName"],
                    $_GET["email"],
                    $_GET["message"]
                    );

if ($stmt->execute()) {
    $_SESSION['success'] = true;
    header("Location: index.php");
    exit;
}
?>