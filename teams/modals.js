// Get the modal
var playerModal = document.getElementById("add-player-modal");
var teamModal = document.getElementById("add-team-modal");
var gameModal = document.getElementById("add-game-modal");

// Get the button that opens the modal
var playerButton = document.querySelector(".add-player-button button");
var teamButton = document.querySelector(".add-team-button button");
var gameButton = document.querySelector(".add-game-button button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Function to open the modal
function openAddPlayerModal() {
    playerModal.style.display = "block";
}

function openAddTeamModal() {
    teamModal.style.display = "block";
}

function openAddGameModal() {
    gameModal.style.display = "block";
}

// Function to close the modal
function closeAddPlayerModal() {
    playerModal.style.display = "none";
}

function closeAddTeamModal() {
    teamModal.style.display = "none";
}

function closeAddGameModal() {
    gameModal.style.display = "none";
}

// Close the modal if the user clicks anywhere outside of it
window.onclick = function(event) {
    if (event.target == playerModal) {
        playerModal.style.display = "none";
    }

    if (event.target == teamModal) {
        teamModal.style.display = "none";
    } 

    if (event.target == gameModal) {
        gameModal.style.display = "none";
    } 
}