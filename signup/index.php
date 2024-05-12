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
        <form action="process-signup.php" method="POST">
            <div class="fullname">
                <div>
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName">
                </div>
                
                <div>
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName">
                </div>
            </div>
            
            <div class="email">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" autocapitalize="off">
            </div>

            <div class="password">
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
            <div class="signup-button">
                <button>Sign up</button>
            </div>
        </form>
    </div>

    <?php include "../site-structure/footer.html" ?>
</body>
</html>