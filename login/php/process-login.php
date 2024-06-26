<?php
session_start();
$is_invalid = false;
$user = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require "../../database/database.php";

    $email = htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST["email"]));
    $password = htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST["password"]));
    

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $email);

    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }

    if ($user) {
        if (password_verify($password, $user["password_hash"])) {
            $user['loggedIn'] = true;
            $_SESSION['user'] = $user;
            header("Location: ../../home/index.php");
            exit();
        } else {
            $is_invalid = true;
        }
    } else {
        $is_invalid = true;
    }

    if ($is_invalid) {
        $_SESSION['login_error'] = "Invalid login attempt";
        header("Location: ../index.php");
        exit();
    }
}
?>
