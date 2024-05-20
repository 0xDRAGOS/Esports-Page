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

if (strlen($_POST['message']) < 50) {
    die("Your message should be atleast 50 characters.");
}


$mysqli = require "../../database/database.php"; 

$firstName = mysqli_real_escape_string($mysqli, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($mysqli, $_POST["lastName"]);
$email = mysqli_real_escape_string($mysqli, $_POST["email"]);
$message = mysqli_real_escape_string($mysqli, $_POST["message"]);

$sql = "INSERT INTO contact_message (firstName, lastName, email, message)
        VALUES (?, ?, ?, ?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                    $firstName,
                    $lastName,
                    $email,
                    $message
                    );

if ($stmt->execute()) {
    $_SESSION['success'] = true;
    header("Location: ../index.php");
    exit;
}
?>