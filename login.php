<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Sign In</h2>
        <p>Welcome back!</p>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Invalid username or password.</p>';
        }
        ?>
        <form action="auth.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign In">
        </form>
    </div>
</body>
</html>