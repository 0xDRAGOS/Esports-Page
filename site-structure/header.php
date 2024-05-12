<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require "../database/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<div class="header">
    <nav class="navbar">
        <a href="../home/index.php"><img src="../images/logo.png" alt="Hydra Esport Logo" class="logo"></a>
        <a href="../home/index.php">HOME</a>
        <a href="../sections/index.php">SECTIONS</a>
        <a href="../teams/index.php">TEAMS</a>
        <a href="../announcements/index.php">ANNOUNCEMENTS</a>
        <a href="../gallery/index.php">GALLERY</a>
        <a href="../contact/index.php">CONTACT</a>

        <?php if (isset($user)): ?>

            <div class="logout-button">
                <a href="">Hello, <?= $user["firstName"] ?>     <?= $user["lastName"] ?>!</a>
                <a href="../login/logout.php">LOGOUT</a>
            </div>

        <?php else: ?>

            <div class="login-button">
                <a href="../login/index.php">LOGIN</a>
            </div>

        <?php endif; ?>
    </nav>
</div>