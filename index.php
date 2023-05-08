<?php


require "functions.php";

if (isset($_POST['submit'])) {
    $response = login($_POST['username'], $_POST['password']);
}


?>
<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <!-- <link rel="stylesheet" type="text/css" href="slide navbar style.css"> -->
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>


        <form class="login" action="index.php" method="post">
            <h2>Welcome, User!</h2>
            <p>Please log in</p>
            <input type="text" name="username" value="<?php echo @$_POST['username'] ?>" placeholder="User Name" />
            <input type="text" value="<?php echo @$_POST['password'] ?>" name="password" placeholder="Password" />
            <input type="submit" value="Log In" />
            <p class="error"><?php echo @$response; ?></p>

        </form>
    </body>

</html>