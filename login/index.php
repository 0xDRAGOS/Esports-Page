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

    $stmt->bind_param("s", $_GET["email"]);

    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } 
    
    if ($user) {
        if (password_verify($_GET["password"], $user["password_hash"])) {
            if ($user["isAdmin"] == true) {
                $is_admin = true;
                $_SESSION["isAdmin"] = true;
           }

           session_start();

           session_regenerate_id();

           $_SESSION["user_id"] = $user["id"];
           header("Location: ../home/index.php");
           exit;
        }

    }

    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hydra Esports</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../site-structure/css/style.css">
</head>
<body>
    <?php include "../site-structure/header.php" ?>

    <div class="content">
        <h1>Login</h1>

        <?php if ($is_invalid): ?>
            <em>Invalid login</em>
        <?php endif; ?>

        <form method="POST">

            <div class="email">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="login-button">
                <button>Log in</button>
            </div>

            <a href="../signup/index.php">You don't have an account?</a>
        </form>
    </div>

    <?php include "../site-structure/footer.html" ?>
</body>
</html>