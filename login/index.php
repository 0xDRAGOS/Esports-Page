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
    <?php
    session_start();
    include "../site-structure/header.php";
    ?>

    <div class="content">
        <h1>Login</h1>
        <form id="login-form" method="POST" action="./php/process-login.php" onsubmit="return validateLogin()">

            <div class="email">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required maxlength="255">
            </div>

            <div class="password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="login-button">
                <button>Log in</button>
            </div>
        </form>

        <?php if (isset($_SESSION['login_error'])): ?>
            <em><?php echo $_SESSION['login_error'];
            unset($_SESSION['login_error']); ?></em>
        <?php endif; ?>

        <a href="../signup/index.php">You don't have an account?</a>
    </div>

    <?php include "../site-structure/footer.html" ?>
    <script src="./js/validation.js"></script>
    <script src="../validation/validation.js"></script>
</body>

</html>