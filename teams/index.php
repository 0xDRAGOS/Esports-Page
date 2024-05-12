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
        <div class="container">
            <h1>TEAMS</h1>
        </div>

        <div class="teams-container">
            <div class="buttons-container">
                <?php //if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]): ?>
                <div class="add-game-button">
                    <button onclick="openAddGameModal()">Add Game</button>
                </div>

                <div class="add-team-button">
                    <button onclick="openAddTeamModal()">Add Team</button>
                </div>

                <div class="add-player-button">
                    <button onclick="openAddPlayerModal()">Add Player</button>
                </div>
                <?php //endif; ?>
            </div>

            <div id="add-game-modal" class="add-game-modal">
                <div class="modal-content">
                    <span class="close" onclick="closeAddGameModal()">&times;</span>
                    <h2>Add Game</h2>
                    <div class="form">
                        <form action="process-add-game.php" method="POST">
                            <div class="name">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name">
                            </div>

                            <div class="add-button">
                                <button>Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="add-player-modal" class="add-player-modal">
                <div class="modal-content">
                    <span class="close" onclick="closeAddPlayerModal()">&times;</span>
                    <h2>Add Player</h2>
                    <div class="form">
                        <form action="process-add-player.php" method="POST">
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

                            <div class="birthday">
                                <label for="birthday">Birthday</label>
                                <input type="date" id="birthday" name="birthday">
                            </div>

                            <div class="nationality">
                                <label for="nationality">Nationality</label>
                                <input type="text" id="nationality" name="nationality">
                            </div>

                            <div class="alias">
                                <label for="alias">Alias</label>
                                <input type="text" id="alias" name="alias">
                            </div>

                            <div class="position">
                                <label for="position">Position</label>
                                <input type="text" id="position" name="position">
                            </div>

                            <div class="team">
                                <label for="team">Team</label>
                                <select name="team" id="team">
                                    <?php
                                    $mysqli = require "../database/database.php";
                                    $sql = "SELECT id, name FROM team";
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

                            <div class="add-button">
                                <button>Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="add-team-modal" class="add-team-modal">
                <div class="modal-content">
                    <span class="close" onclick="closeAddTeamModal()">&times;</span>
                    <h2>Add Team</h2>
                    <div class="form">
                        <form action="process-add-team.php" method="POST">
                            <div class="name">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name">
                            </div>

                            <div class="founded">
                                <label for="founded">Founded</label>
                                <input type="date" id="founded" name="founded">
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

                            <div class="add-button">
                                <button>Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="update-game-modal" class="update-game-modal">
                <div class="modal-content">
                    <span class="close" onclick="closeUpdateGameModal()">&times;</span>
                    <h2>Update Game</h2>
                    <div class="form">
                        <form action="process-update-game.php" method="POST">
                            <input type="hidden" id="gameId" name="gameId" value="">
                            <div class="name">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="">
                            </div>

                            <div class="update-game-button">
                                <button>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="update-player-modal" class="update-player-modal">
                <div class="modal-content">
                    <span class="close" onclick="closeUpdatePlayerModal()">&times;</span>
                    <h2>Update Player</h2>
                    <div class="form">
                        <form action="process-update-player.php" method="POST">
                            <input type="hidden" id="playerId" name="playerId" value="">
                            <div class='fullname'>
                                <div>
                                    <label for='firstName'>First Name</label>
                                    <input type='text' id='firstName' name='firstName' value=''>
                                </div>
                                <div>
                                    <label for='lastName'>Last Name</label>
                                    <input type='text' id='lastName' name='lastName' value=''>
                                </div>
                            </div>

                            <div>
                                <label for='birthday'>Birthday</label>
                                <input type='date' id='birthday' name='birthday' value=''>
                            </div>

                            <div>
                                <label for='nationality'>Nationality</label>
                                <input type='text' id='nationality' name='nationality' value=''>
                            </div>

                            <div>
                                <label for='alias'>Alias</label>
                                <input type='text' id='alias' name='alias' value=''>
                            </div>

                            <div>
                                <label for='position'>Position</label>
                                <input type='text' id='position' name='position' value=''>
                            </div>

                            <div>
                                <label for='team'>Team</label>
                                <select name="team" id="team">
                                    <?php
                                    $mysqli = require "../database/database.php";
                                    $sql = "SELECT id, name FROM team";
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
                            <div class="update-player-button">
                                <button>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="update-team-modal" class="update-team-modal">
                <div class="modal-content">
                    <span class="close" onclick="closeUpdateTeamModal()">&times;</span>
                    <h2>Update Team</h2>
                    <div class="form">
                        <form action="process-update-team.php" method="POST">
                            <input type="hidden" id="teamId" name="teamId" value="">
                            <div class="name">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name">
                            </div>

                            <div class="founded">
                                <label for="founded">Founded</label>
                                <input type="date" id="founded" name="founded">
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

                            <div class="update-team-button">
                                <button>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="teams-view">
                <?php
                $mysqli = require "../database/database.php";
                $sql = "SELECT player.id, player.firstName, player.lastName, player.aliasName, player.birthday, player.nationality, player.position, team.name as teamName, game.name as gameName, team.id as teamId, game.id as gameId
                            FROM player
                            JOIN team ON player.team_id = team.id
                            JOIN game ON team.game_id = game.id;";
                $result = $mysqli->query($sql);

                $currentTeam = null;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $birthdate = new DateTime($row["birthday"]);
                        $currentDate = new DateTime();
                        $age = $currentDate->diff($birthdate)->y;

                        if ($currentTeam !== $row["teamName"]) {
                            if ($currentTeam !== null) {
                                echo "<hr>";
                            }

                            echo "<div class='team-details'>";
                            echo "<h2>" . $row["gameName"] . " - " . $row["teamName"] . "</h2>";
                            echo "</div>";

                            echo "<div class='delete-game-button'>";
                            echo "<button onclick='openDeleteGameModal(\"" . $row['gameId'] . "\")'>Delete Game</button>";
                            echo "</div>";

                            echo "<div class='update-game-button'>";
                            echo "<button onclick='openUpdateGameModal(\"" . $row['gameId'] . "\")'>Update Game</button>";
                            echo "</div>";

                            echo "<div class='delete-team-button'>";
                            echo "<button onclick='openDeleteTeamModal(\"" . $row['teamId'] . "\")'>Delete Team</button>";
                            echo "</div>";

                            echo "<div class='update-team-button'>";
                            echo "<button onclick='openUpdateTeamModal(\"" . $row['teamId'] . "\")'>Update Team</button>";
                            echo "</div>";

                            $currentTeam = $row["teamName"];
                            echo "<div class='team-players'>";
                        }

                        echo "<div class='player-box'>";
                        echo "<h3>" . $row["aliasName"] . "</h3>";
                        echo "<h4>" . $row["firstName"] . " " . $row["lastName"] . "</h4>";
                        echo "<h4>" . $row["nationality"] . "</h4>";
                        echo "<h4>" . $age . " years" . "</h4>";
                        echo "<h4>" . $row["position"] . "</h4>";

                        echo "<div class='delete-player-button'>";
                        echo "<button onclick='openDeletePlayerModal(" . $row['id'] . ")'>Delete</button>";
                        echo "</div>";

                        echo "<div class='update-player-button'>";
                        echo "<button onclick='openUpdatePlayerModal(" . $row['id'] . ")'>Update</button>";
                        echo "</div>";

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
    </div>

    <?php include "../site-structure/footer.html" ?>
    <script src="./js/modals.js"></script>
</body>

</html>