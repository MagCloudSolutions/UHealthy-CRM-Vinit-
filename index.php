<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * from user where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($result) {
        if ($num > 0) {
            if ($password != $row['password']) {
                echo "<script>alert('password incorrect')</script>";

            } else {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header('Location: home.php');
            }
        } else {
            echo "<script>alert('UserName Not Found')</script>";
        }
    } else {
        echo "<script>alert('connection Error')</script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="slide navbar style.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <form class="login" action="index.php" method="post">
        <h2>Welcome, User!</h2>
        <p>Please log in</p>
        <input type="text" name="username" placeholder="User Name" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Log In" />

    </form>
</body>

</html>