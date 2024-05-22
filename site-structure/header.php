<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();

    header('Location: ../home/index.php');
    exit();
}
?>
<div class="header">
    <nav class="navbar">
        <a href="../home/index.php"><img src="../images/logo.png" alt="Hydra Esport Logo" class="logo"></a>
        <a href="../home/index.php">HOME</a>
        <a href="../sections/index.php">SECTIONS</a>
        <a href="../teams/index.php">TEAMS</a>
        <a href="../announcements/index.php">ANNOUNCEMENTS</a>

        <?php if (isset($_SESSION['user'])): ?> 
            <a href="../gallery/index.php">GALLERY</a>
        <?php else: ?>
            <a href="../login/index.php">GALLERY</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['user'])): ?> 
            <a href="../contact/index.php">CONTACT</a>
        <?php else: ?>
            <a href="../login/index.php">CONTACT</a>
        <?php endif; ?>

        <div class="buttons">
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['loggedIn']): ?>
                <div class="logout-button">
                    <a href="">Hello, <?= htmlspecialchars($_SESSION['user']["firstName"]) ?> <?= htmlspecialchars($_SESSION['user']["lastName"]) ?>!</a>
                    <a href="?action=logout">LOGOUT</a>
                </div>
            <?php else: ?>
                <div class="login-button">
                    <a href="../login/index.php">LOGIN</a>
                </div>
            <?php endif; ?>
        </div>

    </nav>
</div>