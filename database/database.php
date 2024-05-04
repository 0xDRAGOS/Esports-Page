<?php
$host = "localhost";
$dbname = "esports_page";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_errno);
}

return $mysqli;
?>