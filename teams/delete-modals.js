function openDeletePlayerModal(playerId) {
    // Afiseaza un mesaj de confirmare pentru utilizator
    var confirmDelete = confirm("Are you sure you want to delete this player?");
    if (confirmDelete) {
        // Daca utilizatorul a confirmat, redirectioneaza catre scriptul PHP de stergere a jucatorului
        window.location.href = "process-delete-player.php?id=" + playerId;
    }
}

function openDeleteTeamModal(playerId) {
    // Afiseaza un mesaj de confirmare pentru utilizator
    var confirmDelete = confirm("Are you sure you want to delete this team?");
    if (confirmDelete) {
        // Daca utilizatorul a confirmat, redirectioneaza catre scriptul PHP de stergere a jucatorului
        window.location.href = "process-delete-team.php?id=" + playerId;
    }
}

function openDeleteGameModal(playerId) {
    // Afiseaza un mesaj de confirmare pentru utilizator
    var confirmDelete = confirm("Are you sure you want to delete this game?");
    if (confirmDelete) {
        // Daca utilizatorul a confirmat, redirectioneaza catre scriptul PHP de stergere a jucatorului
        window.location.href = "process-delete-game.php?id=" + playerId;
    }
}