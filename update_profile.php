<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$conn = new mysqli("localhost", "root", "", "login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
    
} else {
    header("Location: login.php");
    exit();
}
$conn->close();
?> 

<!DOCTYPE html>
<html>
<body>
    <h2>Update Profile</h2>
    <p>Welcome, <?php echo $_SESSION['username']; ?>! Update your details below:</p>
    <!-- Create a form to update specific details -->
    <form action="updating_process.php" method="post">
        <label>Username:</label>
        <?php echo $_SESSION['username']; ?><br>
        <label>First Name:</label>
        <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
        <label>Last Name:</label>
        <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br>
        <input type="submit" value="Update">
    </form>
    <p><a href="profile.php">Back to Profile</a></p>
</body>
</html>