function validateLogin() {
    const form = document.getElementById('login-form');
    const email = form['email'].value;
    const password = form['password'].value;

    if (!email) {
        alert('Email is required.');
        return false;
    }

    if (!password) {
        alert('Password is required.')
        return false;
    }

    if (email.length > 255) {
        alert('Email should not be longer than 255 characters.');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Enter a valid email.')
        return false;
    }

    return true;
}