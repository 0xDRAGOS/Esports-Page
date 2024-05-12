<?php

if (empty($_POST["firstName"])) {
    die("First Name is required!");
}

if (empty($_POST["lastName"])) {
    die("Last Name is required!");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required!");
}

if (strlen($_POST["password"]) < 8) {
    die("Password should be at least 8 characters!");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password should contain at least one letter!");
}

if (!preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password should contain at least one number!");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Password must match!");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require "../../database/database.php"; 

$sql = "INSERT INTO user (firstName, lastName, email, password_hash)
        VALUES (?, ?, ?, ?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                    $_POST["firstName"],
                    $_POST["lastName"],
                    $_POST["email"],
                    $password_hash
                    );

if ($stmt->execute()) {
    header("Location: ../home/index.php");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken! Please choose a different email address.");
    } else {
        die("Error: " . $mysqli->error);
    }
}

?>