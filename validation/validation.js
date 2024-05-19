function validateDate(date) {
    const dateRegex = /^[1-9][0-9]{3}-([0][1-9]|1[0-2])-([1-2][0-9]|0[1-9]|3[0-1])$/;

    if (!dateRegex.test(date)) {
        return false;
    }

    var parts = date.split("-");
    var year = parseInt(parts[0]);
    var month = parseInt(parts[1]);
    var day = parseInt(parts[2]);

    var listOfDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    if (month == 2 && ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0)) {
        if (day > 29) {
            return false;
        }
    } else if (day > listOfDays[month - 1]) {
        return false;
    }

    return true;
}

function validateEmail(email) {
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (!emailRegex.test(email)) {
        return false;
    }

    return true;
}

function validatePassword(password) {
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (!passwordRegex.test(password)) {
        return false;
    }

    return true;
}