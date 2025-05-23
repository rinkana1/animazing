var usernameInput = document.getElementById("username");
var passwordInput = document.getElementById("password");
var eightChar = document.getElementById("eight-char");
var uppercase = document.getElementById("uppercase");
var lowercase = document.getElementById("lowercase");
var number = document.getElementById("number");
var specialChar = document.getElementById("special-char");
var confirmPassword = document.getElementById("confirm-password");

var validPassword = false;
var passwordsMatch = false;

function updateSubmitButtonState() {
    if (validPassword && passwordsMatch && usernameValid) {
        document.getElementById("form-submit").disabled = false;
    } else {
        document.getElementById("form-submit").disabled = true;
    }
}


usernameInput.onkeyup = function () {
    if (/\s/.test(usernameInput.value)) {
        document.getElementById("username-space-error").classList.remove("hidden");
        usernameValid = false;
    } else {
        document.getElementById("username-space-error").classList.add("hidden");
        usernameValid = true;
    }

    updateSubmitButtonState();
};

passwordInput.onfocus = function() {
    document.getElementById("password-info").style.display = "block";
};

passwordInput.onblur = function() {
    document.getElementById("password-info").style.display = "none";
};

passwordInput.onkeyup = function() {
    
    validPassword = true;

    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(passwordInput.value.match(lowerCaseLetters)) {
        lowercase.classList.remove("not-met");
        lowercase.classList.add("met-req");
    } else {
        lowercase.classList.remove("met-req");
        lowercase.classList.add("not-met");
        validPassword = false;
    }

    // Validate lowercase letters
    var upperCaseLetters = /[A-Z]/g;
    if(passwordInput.value.match(upperCaseLetters)) {
        uppercase.classList.remove("not-met");
        uppercase.classList.add("met-req");
    } else {
        uppercase.classList.remove("met-req");
        uppercase.classList.add("not-met");
        validPassword = false;
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(passwordInput.value.match(numbers)) {
        number.classList.remove("not-met");
        number.classList.add("met-req");
    } else {
        number.classList.remove("met-req");
        number.classList.add("not-met");
        validPassword = false;
    }

    // Validate numbers
    var special = /[^A-Za-z 0-9]/g;
    if(passwordInput.value.match(special)) {
        specialChar.classList.remove("not-met");
        specialChar.classList.add("met-req");
    } else {
        specialChar.classList.remove("met-req");
        specialChar.classList.add("not-met");
        validPassword = false;
    }


    // Validate length
    if(passwordInput.value.length >= 8) {
        eightChar.classList.remove("not-met");
        eightChar.classList.add("met-req");
    } else {
        eightChar.classList.remove("met-req");
        eightChar.classList.add("not-met");
        validPassword = false;
    }

    updateSubmitButtonState();
};

confirmPassword.onkeyup = function() {
    if (confirmPassword.value != passwordInput.value) {
        document.getElementById("confirm-password-error").style.display = "block";
        passwordsMatch = false;
    } else {
        document.getElementById("confirm-password-error").style.display = "none";
        passwordsMatch = true;
    }

    updateSubmitButtonState();
};