function validateContact() {
    const form = document.getElementById('contact-form');
    const firstName = form['firstName'].value;
    const lastName = form['lastName'].value;
    const email = form['email'].value;
    const message = form['message'].value;

    if (!firstName || !lastName || !email || !message) {
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

    if (email.length > 255) {
        alert('Email should not be longer than 255 characters.');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Enter a valid email.')
        return false;
    }

    if (message.length < 50) {
        alert('Message must be atleast 50 characters.');
        return false;
    
    }

    return true;
}