<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div class="form-container">
                <h2>Register</h2>
                <form id="registrationForm" action="register.php" method="post" onsubmit="return validateForm()">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()">
                    <label for="showPassword">Show Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="submit" value="Register">
                </form>


                <script>
                    function validateForm() {
                        var password = document.getElementById("password").value;
                        var confirmPassword = document.getElementById("confirmPassword").value;

                        var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
                        if (!passwordPattern.test(password)) {
                            alert("Le mot de passe doit contenir au moins 8 caractères avec au moins une minuscule, une majuscule et un chiffre.");
                            return false;
                        }

                        if (password != confirmPassword) {
                            alert("Les mots de passe ne correspondent pas!");
                            return false;
                        }
                        return true;
                    }

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
                </script>

            </div>
        </div>
        <div class="right-side">
            <div class="form-container">
                <h2>Login</h2>
                <form>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>

</html>