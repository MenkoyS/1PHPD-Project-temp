function togglePasswordVisibility() {
  var passwordField = document.getElementById("password");
  var confirmPasswordField = document.getElementById("confirmPassword");
  var showPasswordCheckbox = document.getElementById("showPassword");

  if (showPasswordCheckbox.checked) {
    passwordField.type = "text";
    confirmPasswordField.type = "text";
  } else {
    passwordField.type = "password";
    confirmPasswordField.type = "password";
  }
}
