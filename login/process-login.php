<?php
$is_invalid = false;
$is_admin = false;
$user = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require "../database/database.php";

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $_POST["email"]);

    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } 
    
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            die("Login successful!");
        }

        if ($user["isAdmin"] == true) {
            $is_admin = true;
        }
    }

    $is_invalid = true;
}
?>