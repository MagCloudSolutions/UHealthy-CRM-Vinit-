<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: index.php');
    exit;
}
$username = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $lookingfor = $_POST['lookingfor'];
    $attended_dc = $_POST['attended_dc'];
    $exp_date_dc = $_POST['exp_date_dc'];
    $attended_mhf = $_POST['attended_mhf'];
    $exp_date_mhf = $_POST['exp_date_mhf'];
    $currentstatus = $_POST['currentstatus'];
    $leaddate = $_POST['leaddate'];
    $comments = $_POST['comments'];
    $followupdate = $_POST['followupdate'];

    // $sql = "SELECT * from user where username = '$username'";
    // $result = mysqli_query($conn, $sql);
    $query = "INSERT INTO `data` (`s_no`, `name`, `phone`, `email`, `state`, `gender`, `age`, `height`, `weight`, `looking_for`, `attended_dc`, `exp_date_dc`, `attended_mhf`, `exp_date_mhf`, `current_status`, `lead_date`, `comments`, `followup_date`, `created_at`) VALUES (null, '$name', '$number', '$email', '$state','$gender', '$age', '$height', '$weight', '$lookingfor', '$attended_dc', '$exp_date_dc', '$attended_mhf', '$exp_date_mhf', '$currentstatus', '$leaddate', '$comments', '$followupdate', current_timestamp())";

    $result = mysqli_query($conn, $query);
    // $numExistRows = mysqli_num_rows($result);////
    if ($result) {
        echo "<script>alert('data Inserted')</script>";
    }

    header('location: data.php');

}


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="css/homestyle.css">
        <title>form</title>
    </head>

    <body>
        <?php
        include 'navbar.php';
        ?>
        <div class="wrapper">
            <div class="title">User Details</div>
            <form action="home.php" method="post">
                <div class=" user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input name="name" type="text" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input name="number" type="number" placeholder="Enter your numer" required>
                    </div>
                    <div class="input-box">
                        <span class="details">E-Mail</span>
                        <input name="email" type="text" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">State</span>
                        <input name="state" type="text" placeholder="Enter your state" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Age</span>
                        <input name="age" type="Number" placeholder="Enter Your Age" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Height(cms)</span>
                        <input name="height" type="Number" placeholder="Enter Your Height" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Weight(Kg)</span>
                        <input name="weight" type="Number" placeholder="Enter Your Weight" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Looking For</span>
                        <select name="lookingfor" type="text" placeholder="Looking For?" required>
                            <option value="Healthy Weight Loss">Healthy Weight Loss</option>
                            <option value="Healthy Weight Gain">Healthy Weight Gain</option>
                            <option value="Overall Health">Overall Health</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Attended "Demo Club"</span>
                        <!-- <input name="attended_dc" type="text" placeholder="" required> -->
                        <select name="attended_dc" type="text" placeholder="" required>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>


                    <div class="input-box">
                        <span class="details">Expected Date "Demo Club"</span>
                        <input name="exp_date_dc" type="date" placeholder="Enter Expected Date" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Attended "Mission Healthy Family"</span>
                        <select name="attended_mhf" type="text" placeholder="" required>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Expected Date "Mission Healthy Family"</span>
                        <input name="exp_date_mhf" type="date" placeholder="Enter Expected Date" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Current Status</span>
                        <select name="currentstatus" type="text" required>
                            <option value="Paid & Joined Club">Paid & Joined Club</option>
                            <option value="Interested but didn't pay">Interested but didn't pay</option>
                            <option value="Not Reachable/Call Not Picked">Not Reachable/Call Not Picked</option>
                            <option value="Not Interested">Not Interested</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Lead Date</span>
                        <input name="leaddate" type="date" placeholder="Enter Lead Date" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Comments</span>
                        <input name="comments" type="text" placeholder="Enter comment" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Follow Up Date</span>
                        <input name="followupdate" type="date" placeholder="Enter date" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <select name="gender" type="text" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>


                </div>



                <div class="button">
                    <input type="submit" value="Update Your Details">
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
        <script src="index.js"></script>
    </body>

</html>