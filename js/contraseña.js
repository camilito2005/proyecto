function validateForm() {
    console.log("si llego al js contraseña");
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    var errorMessage = document.getElementById('passwordError');

    if (password !== confirmPassword) {
        errorMessage.textContent = 'Las contraseñas no coinciden.';
        return false;
    }

    errorMessage.textContent = ''; // Limpiar el mensaje de error si las contraseñas coinciden
    return true;
}