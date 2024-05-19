var addPlayerModal = document.getElementById("add-player-modal");
var addTeamModal = document.getElementById("add-team-modal");
var addGameModal = document.getElementById("add-game-modal");
var updatePlayerModal = document.getElementById("update-player-modal");
var updateTeamModal = document.getElementById("update-team-modal");
var updateGameModal = document.getElementById("update-game-modal");

var span = document.getElementsByClassName("close")[0];

function openAddPlayerModal() {
    addPlayerModal.style.display = "block";
}

function openAddTeamModal() {
    addTeamModal.style.display = "block";
}

function openAddGameModal() {
    addGameModal.style.display = "block";
}

function openUpdatePlayerModal(playerId) {
    updatePlayerModal.style.display = "block";
    
    const xhr = new XMLHttpRequest();

    xhr.open('GET', `./php/process-get-player-by-id.php?playerId=${playerId}`);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = JSON.parse(xhr.responseText);

            updatePlayerModal.querySelector('#playerId').value = response['id'];
            updatePlayerModal.querySelector('#firstName').value = response['firstName'];
            updatePlayerModal.querySelector('#lastName').value = response['lastName'];
            updatePlayerModal.querySelector('#birthday').value = response['birthday'];
            updatePlayerModal.querySelector('#nationality').value = response['nationality'];
            updatePlayerModal.querySelector('#alias').value = response['alias'];
            updatePlayerModal.querySelector('#position').value = response['position'];
            updatePlayerModal.querySelector('#team').value = response['team_id'];
        } else {
            console.error("Could not send the request: ", xhr.statusText);
        }
    }

    xhr.send();
}

function openUpdateTeamModal(teamId) {
    updateTeamModal.style.display = "block";

    const xhr = new XMLHttpRequest();
    xhr.open('GET', `./php/process-get-team-by-id.php?teamId=${teamId}`);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = JSON.parse(xhr.responseText);

            updateTeamModal.querySelector('#teamId').value = response['id'];
            updateTeamModal.querySelector('#name').value = response['name'];
            updateTeamModal.querySelector('#founded').value = response['founded'];
            updateTeamModal.querySelector('#game').value = response['game_id'];
        } else {
            console.error("Could not send the request: ", xhr.statusText);
        }
    }

    xhr.send();
}

function openUpdateGameModal(gameId) {
    updateGameModal.style.display = "block";

    const xhr = new XMLHttpRequest();
    xhr.open('GET', `./php/process-get-game-by-id.php?gameId=${gameId}`);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = JSON.parse(xhr.responseText);
            updateGameModal.querySelector('#gameId').value = response['id'];
            updateGameModal.querySelector('#name').value = response['name'];
        } else {
            console.error("Could not send the request: ", xhr.statusText);
        }
    }

    xhr.send();
}

function closeAddPlayerModal() {
    addPlayerModal.style.display = "none";
}

function closeAddTeamModal() {
    addTeamModal.style.display = "none";
}

function closeAddGameModal() {
    addGameModal.style.display = "none";
}

function closeUpdatePlayerModal() {
    updatePlayerModal.style.display = "none";
}

function closeUpdateTeamModal() {
    updateTeamModal.style.display = "none";
}

function closeUpdateGameModal() {
    updateGameModal.style.display = "none";
}

function openDeletePlayerModal(playerId) {
    
    var confirmDelete = confirm("Are you sure you want to delete this player?");
    if (confirmDelete) {
        window.location.href = "./php/process-delete-player.php?id=" + playerId;
    }
}

function openDeleteTeamModal(teamId) {
    
    var confirmDelete = confirm("Are you sure you want to delete this team?");
    if (confirmDelete) {
        window.location.href = "./php/process-delete-team.php?id=" + teamId;
    }
}

function openDeleteGameModal(gameId) {
    
    var confirmDelete = confirm("Are you sure you want to delete this game?");
    if (confirmDelete) {
        window.location.href = "./php/process-delete-game.php?id=" + gameId;
    }
}

window.onclick = function(event) {
    if (event.target == addPlayerModal) {
        addPlayerModal.style.display = "none";
    }

    if (event.target == addTeamModal) {
        addTeamModal.style.display = "none";
    } 

    if (event.target == addGameModal) {
        addGameModal.style.display = "none";
    } 

    if (event.target == updatePlayerModal) {
        updatePlayerModal.style.display = "none";
    }

    if (event.target == updateTeamModal) {
        updateTeamModal.style.display = "none";
    } 

    if (event.target == updateGameModal) {
        updateGameModal.style.display = "none";
    } 
}