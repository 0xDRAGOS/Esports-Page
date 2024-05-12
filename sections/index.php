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
            <h1>SECTIONS</h1>
        </div>

        <div class="sections-container">
            <?php 
                $mysqli = require "../database/database.php"; 
                $sql = "SELECT section.description as sectionDescription, game.name as gameName
                        FROM game
                        JOIN section ON section.game_id = game.id;";
                $result = $mysqli->query($sql);
                
                $currentGame = null;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='section'>";
                        if ($currentGame !== $row["gameName"]) {
                            if ($currentGame !== null) {
                            }

                            echo "<div class='game-details'>";
                                echo "<h2>" . $row["gameName"] . "</h2>";
                            echo "</div>";
                            echo "<hr>";
                            $currentGame = $row["gameName"];
                        }

                        echo "<div class='game-description'>";
                            echo "<h4>" . $row["sectionDescription"] . "</h4>";
                        echo "</div>";

                        echo "</div>";
                        }
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