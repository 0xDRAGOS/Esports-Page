<?php
session_start();


if (empty($_POST["firstName"])) {
    die("First Name is required!");
}

if (empty($_POST["lastName"])) {
    die("Last Name is required!");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required!");
}

if (empty($_POST["message"])) {
    die("Message is required!");
}


$mysqli = require "../database/database.php"; 

$sql = "INSERT INTO contact_message (firstName, lastName, email, message)
        VALUES (?, ?, ?, ?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                    $_POST["firstName"],
                    $_POST["lastName"],
                    $_POST["email"],
                    $_POST["message"]
                    );

if ($stmt->execute()) {
    $_SESSION['success'] = true;
    header("Location: index.php");
    exit;
}
?>