<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
// Establish connection to the database using phpMyAdmin credentials
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
    $lastlogin = $row["lastlogin"];
    $createdat = $row["createdat"];
    $updatedat = $row["updatedat"];
    $lastupdateat = $row['lastupdateat'];
    $previouslogin = $row['previouslogin'];
} else {
    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html>

<body class="text-center my-4" content="width=device-width, initial-scale = 1.0" style="background-color: aliceblue;">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- <h1 class="text-center my-3">Displaying Data</h1> -->
        <h1 class="text-center my-4">User Data</h1>
        <div class="container mt-5 d-flex justify-content-center">
            <table class="table table-bordered w-50">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">User Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Last Login</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $sql = "SELECT * FROM users WHERE username = '$username'";
                     $result = mysqli_query($conn, $sql);
                    //  $row = mysqli_fetch_assoc($result);
                    //  echo $row['username'];
                     while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $username = $row['username'];
                        $firtsname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $email = $row['email'];
                        $createdat = $row['createdat'];
                        $lastupdateat = $row['lastupdateat'];
                        $previouslogin = $row['previouslogin'];
                        echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$username.'</td>
                        <td>'.$firstname.'</td>
                        <td>'.$lastname.'</td>
                        <td>'.$email.'</td>
                        <td>'.$createdat.'</td>
                        <td>'.$lastupdateat.'</td>
                        <td>'.$previouslogin.'</td>
                    </tr>';
                     }
                    ?>
                </tbody>
            </table>
        </div>
        <p><a href="update_profile.php">Update Details</a></p>
    <p><a href="logout.php">Logout</a></p>
    </body>
</html>
