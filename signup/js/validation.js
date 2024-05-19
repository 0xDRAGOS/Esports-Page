function validateSignup() {
    const form = document.getElementById('signup-form');
    const firstName = form['firstName'].value;
    const lastName = form['lastName'].value;
    const email = form['email'].value;
    const password = form['password'].value;
    const confirmationPassword = form['password_confirmation'].value;

    if (!firstName) {
        alert('First name is required.');
        return false;
    }

    if (!lastName) {
        alert('Last name is required.');
        return false;
    }

    if (!email) {
        alert('Email is required.');
        return false;
    }

    if (!password) {
        alert('Password is required');
        return false;
    }

    if (!confirmationPassword) {
        alert('Confirmation password is required.')
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

    if (email.length > 255) {
        alert('Email must be less than or equal to 255 characters.');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Enter a valid email.')
        return false;
    }

    if (password.length > 255) {
        alert('Password must be less than or equal to 255 characters.');
        return false;
    }

    if (!validatePassword(password)) {
        alert('Password should contain atleast 8 characters with atleast one lowercase letter, one uppercase letter and one digit.')
        return false;
    }

    if (confirmationPassword.length > 255) {
        alert('Confirmation password must be less than or equal to 255 characters.');
        return false;
    }

    if (password !== confirmationPassword) {
        alert('Passwords should match.')
        return false;
    }
    return true;
}