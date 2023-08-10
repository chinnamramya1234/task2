<!DOCTYPE html>
<html>
    <div class="col-lg-12">
        <body class="text-center my-4" content="width=device-width, initial-scale = 1.0" style="background-color: aliceblue;">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <h2 class="text-center my-4"><b>Registeration Form</b></h2>
        <form action="connect.php" method="post">
        <label><b>Username:</b></label>
        <input type="text" name="username" required><br> <br>
        <label><b>Password:</b></label>
       <input type="password" name="password" required><br> <br>
        <label><b>First Name:</b></label>
        <input type="text" name="firstname" required><br> <br>
       <label><b>Last Name:</b></label>
        <input type="text" name="lastname" required><br> <br>
        <label><b>Email:</b></label>
        <input type="email" name="email" required><br> <br>
       <input class="btn btn-dark" type="submit" value="Register"> <br>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
        </body>
    </div>
</html>
