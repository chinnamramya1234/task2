<?php
session_start();
// $conn = new mysqli("localhost", "root", "", "login");
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// if (isset($_SESSION["username"])) {
//     $username = $_SESSION["username"];
//     $sql = "SELECT username,lastlogin FROM users WHERE username = '$username'";
//     $result = $conn->query($sql);
//     if ($result->num_rows == 1) {
//         $row = $result->fetch_assoc();
//         $username = $row["username"];
//         $lastlogin = $row["lastlogin"];
//         // Update previous_logout timestamp
//         $update_previous_logout_sql = "UPDATE users SET previouslogin = '$lastlogin' WHERE username = '$username'";
//         $conn->query($update_previous_logout_sql);
//     }
// }
session_destroy();
header("Location: login.php");
exit();
?>