<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hydra Esports</title>
    <link rel="stylesheet" href="../site-structure/css/style.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include "../site-structure/header.php" ?>

    <div class="content">
        <div class="container">
            <h1>GALLERY</h1>
        </div>

        <div class="gallery-container">
            <?php 
                $mysqli = require "../database/database.php"; 
                $sql = "SELECT team.name as teamName, gallery.fileName, fileExtension
                        FROM gallery
                        JOIN team ON gallery.team_id = team.id;";
                $result = $mysqli->query($sql);
                
                $currentTeam = null;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        if ($currentTeam !== $row["teamName"]) {
                            if ($currentTeam !== null) {
                                echo "<hr>";
                            }

                            echo "<div class='team-details'>";
                                echo "<h2>" . $row["teamName"] . "</h2>";
                            echo "</div>";

                            $currentTeam = $row["teamName"];
                            echo "<div class='images-container'>";
                        }

                        echo "<div class='image-box'>";
                            echo "<img src='images/" . $row["fileName"] . "." . $row["fileExtension"] . "' alt='" . $row["fileName"] . "'>";
                        echo "</div>";
                        }
                    echo "</div>";
                    echo "<hr>";
                } else {
                    echo "0 results";
                }

                $mysqli->close();
            ?>      
        </div>
    </div>

    <?php include "../site-structure/footer.html" ?>
</body>
</html>