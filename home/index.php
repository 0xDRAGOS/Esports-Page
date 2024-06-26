
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
        <div id="sections" class="sections">
            <a href="../sections/index.php">TRAVEL TROUGH 
                <br>OUR SECTIONS
            </a>
        </div>
        <div id="teams" class="teams">
            <a href="../teams/index.php">THE OFFICIAL 
                <br>HYDRA 
                <br>TEAMS
            </a>
        </div>
        <div id="announcements" class="announcements">
            <a href="../announcements/index.php">EXPLORE OUR
                <br>LATEST
                <br>NEWS
            </a>
        </div>
        <div id="gallery" class="gallery">
            <?php if (isset($_SESSION['user'])): ?> 
            <a href="../gallery/index.php">TAKE AN EYE
                <br>ON OUR
                <br>PHOTOS
            </a>
            <?php else: ?>
            <a href="../login/index.php">TAKE AN EYE
                <br>ON OUR
                <br>PHOTOS
            </a>
            <?php endif; ?>
        </div>
        <div id="contact" class="contact">
            <?php if (isset($_SESSION['user'])): ?> 
            <a href="../contact/index.php">WANNA GET IN TOUCH
                <br>WITH US?
            </a>
            <?php else: ?>
            <a href="../login/index.php">WANNA GET IN TOUCH
                <br>WITH US?
            </a>
            <?php endif; ?>
        </div>
    </div>
    
    <?php include "../site-structure/footer.html" ?>
</body>
</html>