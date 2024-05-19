function validateAddGame() {
    const form = document.getElementById('add-game-form');
    const name = form['name'].value;

    if (!name) {
        alert('Name is required.');
        return false;
    }

    if (name.length < 3 || name.length > 60) {
        alert('Title must be between 3 and 60 characters.');
        return false;
    }

    return true;
}

function validateUpdateGame() {
    const form = document.getElementById('add-update-form');
    const name = form['name'].value;

    if (!name) {
        alert('Name is required.');
        return false;
    }

    if (name.length < 3 || name.length > 60) {
        alert('Title must be between 3 and 60 characters.');
        return false;
    }

    return true;
}

function validateAddPlayer() {
    const form = document.getElementById('add-player-form');
    const firstName = form['firstName'].value;
    const lastName = form['lastName'].value;
    const birthday = form['birthday'].value;
    const nationality = form['nationality'].value;
    const alias = form['alias'].value;
    const position = form['position'].value;

    if (!firstName || !lastName || !birthday || !nationality || !alias || !position) {
        alert('All fields are required.');
        return false;
    }

    if (firstName.length < 3 || firstName.length > 128) {
        alert('First name must be between 3 and 128 characters.');
        return false;
    }

    if (lastName.length < 3 || lastName.length > 128) {
        alert('Last name must be between 3 and 128 characters.');
        return false;
    }

    if (!validateDate(birthday)) {
        alert('Please enter a valid birthday in the format YYYY-MM-DD.');
        return false;
    }

    if (nationality.length < 2 || nationality.length > 60) {
        alert('Nationality must be between 2 and 60 characters.');
        return false;
    }

    if (alias.length < 3 || alias.length > 60) {
        alert('Alias must be between 3 and 60 characters.');
        return false;
    }

    if (position.length < 3 || position.length > 60) {
        alert('Position must be between 3 and 60 characters.');
        return false;
    }

    return true;
}

function validateUpdatePlayer() {
    const form = document.getElementById('update-player-form');
    const firstName = form['firstName'].value;
    const lastName = form['lastName'].value;
    const birthday = form['birthday'].value;
    const nationality = form['nationality'].value;
    const alias = form['alias'].value;
    const position = form['position'].value;

    if (!firstName || !lastName || !birthday || !nationality || !alias || !position) {
        alert('All fields are required.');
        return false;
    }

    if (firstName.length < 3 || firstName.length > 128) {
        alert('First name must be between 3 and 128 characters.');
        return false;
    }

    if (lastName.length < 3 || lastName.length > 128) {
        alert('Last name must be between 3 and 128 characters.');
        return false;
    }

    if (!validateDate(birthday)) {
        alert('Please enter a valid birthday in the format YYYY-MM-DD.');
        return false;
    }

    if (nationality.length < 2 || nationality.length > 60) {
        alert('Nationality must be between 2 and 60 characters.');
        return false;
    }

    if (alias.length < 3 || alias.length > 60) {
        alert('Alias must be between 3 and 60 characters.');
        return false;
    }

    if (position.length < 3 || position.length > 60) {
        alert('Position must be between 3 and 60 characters.');
        return false;
    }

    return true;
}

function validateAddTeam() {
    const form = document.getElementById('add-team-form');
    const name = form['name'].value;
    const founded = form['founded'].value;
    const game = form['game'].value;

    if (!name || !founded || !game) {
        alert('All fields are required.');
        return false;
    }

    if (name.length < 3 || name.length > 60) {
        alert('Name must be between 3 and 60 characters.');
        return false;
    }

    if (!validateDate(founded)) {
        alert('Please enter a valid founded date in the format YYYY-MM-DD.');
        return false;
    }

    return true;
}

function validateUpdateTeam() {
    const form = document.getElementById('update-team-form');
    const name = form['name'].value;
    const founded = form['founded'].value;
    const game = form['game'].value;

    if (!name || !founded || !game) {
        alert('All fields are required.');
        return false;
    }

    if (name.length < 3 || name.length > 60) {
        alert('Name must be between 3 and 60 characters.');
        return false;
    }

    if (!validateDate(founded)) {
        alert('Please enter a valid founded date in the format YYYY-MM-DD.');
        return false;
    }

    return true;
}