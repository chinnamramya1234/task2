<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $conn = new mysqli("localhost", "root", "", "login");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email'  WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $sql = "SELECT username,updatedat FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $username = $row["username"];
            $updatedat = $row['updatedat'];
            // previous updated timestamp
            $update_previous_logout_sql = "UPDATE users SET lastupdateat = '$updatedat' WHERE username = '$username'";
            $conn->query($update_previous_logout_sql);

            // Current updated timestamp
            $update = "UPDATE users SET updatedat = Now() WHERE username = '$username'";
            $conn->query($update); 
        }
    }
    $conn->close();
    header("Location:profile.php");
    exit();
}
?>