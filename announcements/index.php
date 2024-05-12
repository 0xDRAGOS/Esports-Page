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
            <h1>ANNOUNCEMENTS</h1>
        </div>

        <div id="add-announcement-modal" class="add-announcement-modal">
                <div class="modal-content">
                    <span class="close" onclick="closeAddAnnouncementModal()">&times;</span>
                    <h2>Add Announcement</h2>
                    <div class="form">
                        <form action="./php/process-add-announcement.php" method="POST" enctype="multipart/form-data">
                            <div class="title">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title">
                            </div>

                            <div class="anno-content">
                                <label for="content">Content</label>
                                <input type="text" id="content" name="content">
                            </div>

                            <div class="game">
                                <label for="game">Game</label>
                                <select name="game" id="game">
                                    <?php 
                                        $mysqli = require "../database/database.php"; 
                                        $sql = "SELECT id, name FROM game";
                                        $result = $mysqli->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        $mysqli->close();
                                    ?>
                                </select>
                            </div>

                            <div class="cover-image">
                                <label for="cover-image">Image</label>
                                <input type="file" id="cover-image" name="cover-image">
                            </div>

                            <div class="add-button">
                                <button>Add</button>
                            </div>
                        </form>
                    </div>     
                </div>
            </div>

            <div id="update-announcement-modal" class="update-announcement-modal">
                <div class="modal-content">
                    <span class="close" onclick="closeUpdateAnnouncementModal()">&times;</span>
                    <h2>Update Announcement</h2>
                    <div class="form">
                        <form action="./php/process-update-announcement.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="announcementId" name="announcementId" value="">
                            <div class="title">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title">
                            </div>

                            <div class="anno-content">
                                <label for="content">Content</label>
                                <input type="text" id="content" name="content">
                            </div>

                            <div class="game">
                                <label for="game">Game</label>
                                <select name="game" id="game">
                                    <?php 
                                        $mysqli = require "../database/database.php"; 
                                        $sql = "SELECT id, name FROM game";
                                        $result = $mysqli->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        $mysqli->close();
                                    ?>
                                </select>
                            </div>

                            <div class="cover-image">
                                <label for="cover-image">Image</label>
                                <input type="file" id="cover-image" name="cover-image">
                            </div>

                            <div class="update-button">
                                <button>Update</button>
                            </div>
                        </form>
                    </div>     
                </div>
            </div>

        <div class="announcements-container">
            <div class="buttons-container">
                <?php //if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]): ?> 
                    <div class="add-announcement-button">
                        <button onclick="openAddAnnouncementModal()">Add Announcement</button>
                    </div>
                <?php //endif; ?>
            </div>

            <div class="games-view">
                <div class="all-announcements">
                    <button id="all-announcements-button" onclick='loadAllAnnouncements()'>All</button>
                </div>
            
                <?php 
                    $mysqli = require "../database/database.php"; 
                    $sql = "SELECT id, name
                            FROM game;";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            echo "<div class='game-name'>";
                                echo "<button onclick='loadAnnouncements(\"" . $row['id'] . "\")'>" . $row["name"] . "</button>";
                            echo "</div>";
                            }
                    } else {
                        echo "0 results";
                    }

                    $mysqli->close();
                ?>      
            </div>

            <div class="announcements-list" id="announcements-list">

            </div>
        </div>
    </div>

    <?php include "../site-structure/footer.html" ?>
    <script src="./js/modals.js"></script>
</body>
</html>