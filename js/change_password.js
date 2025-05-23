document.addEventListener("DOMContentLoaded", () => {
    const newPassword = document.getElementById("new-password");
    const confirmNewPassword = document.getElementById("confirm-new-password");
    const submitButton = document.querySelector(".form-submit");

    const passwordRequirements = {
        length: /.{8,}/,
        uppercase: /[A-Z]/,
        lowercase: /[a-z]/,
        number: /\d/,
        special: /[!@#$%^&*(),.?":{}|<>]/
    };

    function validatePassword(password) {
        return Object.values(passwordRequirements).every((regex) => regex.test(password));
    }

    function checkFormValidity() {
        const newPass = newPassword.value;
        const confirmPass = confirmNewPassword.value;

        const isPasswordValid = validatePassword(newPass);
        const isConfirmValid = newPass === confirmPass && confirmPass.length > 0;

        if (isPasswordValid && isConfirmValid) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    newPassword.addEventListener("input", checkFormValidity);
    confirmNewPassword.addEventListener("input", checkFormValidity);
});
