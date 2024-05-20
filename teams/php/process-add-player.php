<?php

if (empty($_POST["firstName"])) {
    die("First Name is required!");
}

if (empty($_POST["lastName"])) {
    die("Last Name is required!");
}

if (empty($_POST["birthday"])) {
    die("birthday is required!");
}

if (empty($_POST["nationality"])) {
    die("Nationality is required!");
}

if (empty($_POST["alias"])) {
    die("Alias is required!");
}

if (empty($_POST["position"])) {
    die("Position is required!");
}

if (empty($_POST["team"])) {
    die("Team is required!");
}

$mysqli = require "../../database/database.php"; 

$sql = "INSERT INTO player (firstName, lastName, birthday, nationality, aliasName, position, team_id)
        VALUES (?, ?, ?, ?, ?, ?, ?);";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$firstName = mysqli_real_escape_string($mysqli, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($mysqli, $_POST["lastName"]);
$nationality = mysqli_real_escape_string($mysqli, $_POST["nationality"]);
$alias = mysqli_real_escape_string($mysqli, $_POST["alias"]);
$position = mysqli_real_escape_string($mysqli, $_POST["position"]);
$team = mysqli_real_escape_string($mysqli, $_POST["team"]);

$birthday_formatted = date('Y-m-d', strtotime($_POST["birthday"]));

$stmt->bind_param("ssssssi",
                    $firstName,
                    $lastName,
                    $birthday_formatted,
                    $nationality,
                    $alias,
                    $position,
                    $team
                    );

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} 
?>