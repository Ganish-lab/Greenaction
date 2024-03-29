function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function validateFullName(fullname) {
    const fullNamePattern = /^[A-Za-z\s]+$/;
    return fullNamePattern.test(fullname);
}

function validateUsername(username) {
    const usernamePattern = /^[A-Za-z]+$/;
    return usernamePattern.test(username);
}

function validatePhoneNumber(phone) {
    const phonePattern = /^\d{10}$/;
    return phonePattern.test(phone);
}

function validatePassword(password) {
    // Must contain at least one uppercase letter, one lowercase letter, one number, and one special character
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
    return passwordPattern.test(password);
}

function validateForm() {
    let fullname = document.getElementById("fullname").value.trim();
    let email = document.getElementById("email").value.trim();
    let dob = document.getElementById("dob").value;
    let username = document.getElementById("username").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirm_password = document.getElementById("confirm_password").value.trim();
    let user_account = document.getElementById("user_account").value;

    let isValid = true;

    // Validate full name
    if (fullname === "") {
        document.getElementById("fullnameError").textContent = "This field should not be empty.";
        isValid = false;
    } else if (!validateFullName(fullname)) {
        document.getElementById("fullnameError").textContent = "Please enter only alphabetic characters and spaces.";
        isValid = false;
    } else {
        document.getElementById("fullnameError").textContent = "";
    }

    // Validate email
    if (email === "") {
        document.getElementById("emailError").textContent = "This field should not be empty.";
        isValid = false;
    } else if (!validateEmail(email)) {
        document.getElementById("emailError").textContent = "Please enter a valid email address.";
        isValid = false;
    } else {
        document.getElementById("emailError").textContent = "";
    }

    // Validate date of birth
    if (dob === "") {
        document.getElementById("dobError").textContent = "This field should not be empty.";
        isValid = false;
    } else {
        document.getElementById("dobError").textContent = "";
    }

    // Validate username
    if (username === "") {
        document.getElementById("usernameError").textContent = "This field should not be empty.";
        isValid = false;
    } else if (!validateUsername(username)) {
        document.getElementById("usernameError").textContent = "Please enter only alphabetic characters.";
        isValid = false;
    } else {
        document.getElementById("usernameError").textContent = "";
    }

    // Validate phone number
    if (phone === "") {
        document.getElementById("phoneError").textContent = "This field should not be empty.";
        isValid = false;
    } else if (!validatePhoneNumber(phone)) {
        document.getElementById("phoneError").textContent = "Please enter a valid 10-digit phone number.";
        isValid = false;
    } else {
        document.getElementById("phoneError").textContent = "";
    }

    // Validate password
    if (password === "") {
        document.getElementById("passwordError").textContent = "This field should not be empty.";
        isValid = false;
    } else if (!validatePassword(password)) {
        document.getElementById("passwordError").textContent = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        isValid = false;
    } else {
        document.getElementById("passwordError").textContent = "";
    }

    // Validate confirm password
    if (confirm_password === "") {
        document.getElementById("confirmPasswordError").textContent = "This field should not be empty.";
        isValid = false;
    } else {
        document.getElementById("confirmPasswordError").textContent = "";
    }

    // Validate password match
    if (password !== confirm_password) {
        document.getElementById("confirmPasswordError").textContent = "Passwords do not match.";
        isValid = false;
    }

    // Successful registration message
    if (isValid) {
        alert("You have successfully registered as " + user_account);
    }
     if (dob === "") {
    document.getElementById("dobError").textContent = "This field should not be empty.";
    isValid = false;
} else {
    // Calculate age
    let today = new Date();
    let birthDate = new Date(dob);
    let age = today.getFullYear() - birthDate.getFullYear();
    let monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    
    if (age < 18) {
        document.getElementById("dobError").textContent = "You must be at least 18 years old to register.";
        isValid = false;
    } else {
        document.getElementById("dobError").textContent = "";
    }
}

    return isValid;
}
// script.js
var imgs = document.querySelectorAll('.slider img');
var dots = document.querySelectorAll('.dot');
var currentImg = 0;
const interval = 3000;

function changeSlide(n) {
 for (var i = 0; i < imgs.length; i++) {
    imgs[i].style.opacity = 0;
    dots[i].className = dots[i].className.replace(' active', '');
 }

 currentImg = n;

 imgs[currentImg].style.opacity = 1;
 dots[currentImg].className += ' active';
}

var timer = setInterval(function() {
 changeSlide((currentImg + 1) % imgs.length);
}, interval);

dots.forEach(function(dot, index) {
 dot.addEventListener('click', function() {
    clearInterval(timer);
    changeSlide(index);
    timer = setInterval(function() {
      changeSlide((currentImg + 1) % imgs.length);
    }, interval);
 });
});
document.getElementById('profile_picture_input').addEventListener('change', function() {
});

document.querySelector('.upload-overlay').addEventListener('click', function() {
    document.getElementById('profile_picture_input').click();
});

