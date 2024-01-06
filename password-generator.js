// Original functions for the shortcode
function passwordGeneratorCopyPassword() {
    var passwordBox = document.getElementById("password");
    passwordBox.select();
    document.execCommand("copy");
}

function passwordGeneratorCreatePassword() {
    var passwordBox = document.getElementById("password");
    var length = 12;

    var upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var lowerCase = "abcdefghijklmnopqrstwxyz";
    var number = "0123456789";
    var symbol = "!@#$%^&*()-=_+[]{}|;:,.<>?/";

    var allChars = upperCase + lowerCase + number + symbol;

    var password = "";
    password += upperCase[Math.floor(Math.random() * upperCase.length)];
    password += lowerCase[Math.floor(Math.random() * lowerCase.length)];
    password += number[Math.floor(Math.random() * number.length)];
    password += symbol[Math.floor(Math.random() * symbol.length)];

    while (length > password.length) {
        password += allChars[Math.floor(Math.random() * allChars.length)];
    }
    passwordBox.value = password;
}

function passwordGeneratorResetPassword() {
    var passwordBox = document.getElementById("password");
    passwordBox.value = "";
}

// New functions for the settings page
function settingsPasswordGeneratorCopyPassword() {
    var passwordBox = document.getElementById("settings-password");
    passwordBox.select();
    document.execCommand("copy");
}

function settingsPasswordGeneratorCreatePassword() {
    var passwordBox = document.getElementById("settings-password");
    var length = 12;

    var upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var lowerCase = "abcdefghijklmnopqrstwxyz";
    var number = "0123456789";
    var symbol = "!@#$%^&*()-=_+[]{}|;:,.<>?/";

    var allChars = upperCase + lowerCase + number + symbol;

    var password = "";
    password += upperCase[Math.floor(Math.random() * upperCase.length)];
    password += lowerCase[Math.floor(Math.random() * lowerCase.length)];
    password += number[Math.floor(Math.random() * number.length)];
    password += symbol[Math.floor(Math.random() * symbol.length)];

    while (length > password.length) {
        password += allChars[Math.floor(Math.random() * allChars.length)];
    }
    passwordBox.value = password;
}

function settingsPasswordGeneratorResetPassword() {
    var passwordBox = document.getElementById("settings-password");
    passwordBox.value = "";
}
