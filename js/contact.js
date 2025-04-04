// Form validation function
function validateForm() {
    let isValid = true;
    
    // Get form elements
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const message = document.getElementById('message');
    const privacy = document.getElementById('privacy');

    // Check name
    if (!name.value.trim()) {
        name.classList.add('is-invalid');
        isValid = false;
    } else {
        name.classList.remove('is-invalid');
        name.classList.add('is-valid');
    }

    // Check email
    if (!email.value.trim() || !email.value.includes('@') || !email.value.includes('.')) {
        email.classList.add('is-invalid');
        isValid = false;
    } else {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
    }

    // Check message
    if (!message.value.trim()) {
        message.classList.add('is-invalid');
        isValid = false;
    } else {
        message.classList.remove('is-invalid');
        message.classList.add('is-valid');
    }

    // Check privacy
    if (!privacy.checked) {
        privacy.classList.add('is-invalid');
        isValid = false;
    } else {
        privacy.classList.remove('is-invalid');
        privacy.classList.add('is-valid');
    }

    return isValid;
}

function checkSubmittion() {
    if (validateForm()) {
        window.location.href = 'thank-you.html';
        return false;
    }
    return false;
}
