function validateAddAnnouncement() {
    const form = document.getElementById('add-announcement-form');
    const title = form['title'].value;
    const content = form['content'].value;
    const game = form['game'].value;
    const coverImage = form['cover-image'].files[0];

    if (!title) {
        alert('Title is required.');
        return false;
    }

    if (title.length < 10 || title.length > 255) {
        alert('Title must be between 10 and 255 characters.');
        return false;
    }

    if (!content) {
        alert('Content is required.');
        return false;
    }

    if (content.length < 50) {
        alert('Content must be atleast 50 characters.');
        return false;
    }

    if (!game) {
        alert('Please select a game.');
        return false;
    }

    if (!coverImage) {
        alert('Cover image is required.');
        return false;
    } else {
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!validTypes.includes(coverImage.type)) {
            alert('Invalid file type. Only JPG and PNG are allowed.');
            return false;
        }

        maxSize = 5 * 1024 * 1024;
        if (coverImage.size > maxSize) {
            alert('File size exceeds 5MB.');
            return false;
        }
    }

    return true;
}

function validateUpdateAnnouncement() {
    const form = document.getElementById('update-announcement-form');
    const title = form['title'].value;
    const content = form['content'].value;
    const game = form['game'].value;
    const coverImage = form['cover-image'].files[0];

    if (!title) {
        alert('Title is required.');
        return false;
    }

    if (title.length < 10 || title.length > 255) {
        alert('Title must be between 10 and 255 characters.');
        return false;
    }

    if (!content) {
        alert('Content is required.');
        return false;
    }

    if (content.length < 50) {
        alert('Content must be atleast 50 characters.');
        return false;
    }

    if (!game) {
        alert('Please select a game.');
        return false;
    }

    if (!coverImage) {
        alert('Cover image is required.');
        return false;
    } else {
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!validTypes.includes(coverImage.type)) {
            alert('Invalid file type. Only JPG and PNG are allowed.');
            return false;
        }

        maxSize = 5 * 1024 * 1024;
        if (coverImage.size > maxSize) {
            alert('File size exceeds 5MB.');
            return false;
        }
    }

    return true;
}