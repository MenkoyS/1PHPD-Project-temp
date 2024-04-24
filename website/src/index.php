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
                <form action="traitement.php" method="post">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()">
                    <label for="showPassword">Show Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="submit" value="Register">
                </form>

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