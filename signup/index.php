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
        <h1>Signup</h1>
        <form id="signup-form" action="./php/process-signup.php" method="POST" onsubmit="return validateSignup()">
            <div class="fullname">
                <div>
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" required minlength="3" maxlength="128">
                </div>
                
                <div>
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required minlength="3" maxlength="128">
                </div>
            </div>
            
            <div class="email">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" autocapitalize="off" required maxlength="255">
            </div>

            <div class="password">
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required maxlength="255">
                </div>

                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required maxlength="255">
                </div>
            </div>
            <div class="signup-button">
                <button>Sign up</button>
            </div>
        </form>
    </div>

    <?php include "../site-structure/footer.html" ?>
    <script src="./js/validation.js"></script>
    <script src="../validation/validation.js"></script>
</body>
</html>