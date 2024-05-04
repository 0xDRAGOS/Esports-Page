<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require "../database/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hydra Esports</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <nav class="navbar">
            <a href="../home/index.php"><img src="../images/logo.png" alt="Hydra Esport Logo" class="logo"></a>
                <a href="../home/index.php">HOME</a>
                <a href="#sections">SECTIONS</a>
                <a href="#teams">TEAMS</a>
                <a href="#announcements">ANNOUNCEMENTS</a>
                <a href="#gallery">GALLERY</a>
                <a href="#contact">CONTACT</a>

            <?php if (isset($user)): ?>

                <div class="logout-button">
                    <a href="">Hello, <?= $user["firstName"] ?> <?= $user["lastName"] ?>!</a>
                    <a href="../login/logout.php">LOGOUT</a>
                </div>

            <?php else: ?>

                <div class="login-button">
                    <a href="../login/index.php">LOGIN</a>
                </div>

            <?php endif; ?>
        </nav>
    </div>
</body>
</html>