<!DOCTYPE html>
<body class="text-center my-4" content="width=device-width, initial-scale = 1.0" style="background-color: aliceblue;">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <h2><b>Login</b></h2> <br>
    <form action="login_process.php" method="post">
        <label><b>Username:</b></label>
        <input type="text" name="username" required><br> <br>
        <label><b>Password:</b></label>
        <input type="password" name="password" required><br> <br>
       <input class="btn btn-dark" type="submit" value="Login"> <br> <br>
    </form>
    <p>Don't have an account? <a href="registration.php">Register here</a></p>
</body>
</html>
