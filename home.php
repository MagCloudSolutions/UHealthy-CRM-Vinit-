<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $username = $_SESSION['username'];

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $lookingfor = $_POST['lookingfor'];
    $attended = $_POST['attended'];
    $expecteddate = $_POST['expecteddate'];
    $currentstatus = $_POST['currentstatus'];
    $leaddate = $_POST['leaddate'];
    $comments = $_POST['comments'];
    $assignedto = $_POST['assignedto'];
    $followupdate = $_POST['followupdate'];
    $isorganic = $_POST['isorganic'];
    $adsetname = $_POST['adsetname'];
    $compaign = $_POST['compaign'];
    $vehicle = $_POST['vehicle'];
    $leadid = $_POST['leadid'];
    $customer = $_POST['customer'];
    $home = $_POST['home'];
    $retailid = $_POST['retailid'];
    $sql = "SELECT * from user where username = '$username'";
    $result = mysqli_query($conn, $existsql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $query = "INSERT INTO `data` (`s_no`, `name`, `phone`, `email`, `state`, `gender`, `age`, `height`, `weight`, `looking_for`, `attended_dc`, `exp_date_dc`, `attended_mhf`, `exp_date_mhf`, `current_status`, `lead_date`, `comments`, `assigned_to`, `followup_date`, `is_organic`, `adset_name`, `campaign`, `vehicle`, `partner`, `platform`, `lead_id`, `cusomer_disc`, `home_listing`, `retailer_id`, `created_at`) VALUES ('1', '$name', '$number', '$email', '$state', '$age', '$height', '$weight', '$lookingfor', '$attended', '$expecteddate', '$currentstatus', '$leaddate', '$comments', '$assignedto', '$followupdate', '$isorganic', '$adsetname', '$compaign', '$vehicle', '$leadid', '$customer', '$home', '$retailid', current_timestamp())";


    }





}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homestyle.css">
    <title>form</title>
</head>

<body>
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
                    <input name="sate" type="text" placeholder="Enter your state" required>
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
                    <input name="lookingfor" type="text" placeholder="Looking For?" required>
                </div>
                <div class="input-box">
                    <span class="details">Attended "Demo Club"</span>
                    <input name="attended" type="text" placeholder="" required>
                </div>
                <div class="input-box">
                    <span class="details">Expected Date Mission Healthy Family</span>
                    <input name="expecteddate" type="date" placeholder="Enter Expected Date" required>
                </div>
                <div class="input-box">
                    <span class="details">Current Status</span>
                    <input name="currentstatus" type="text" placeholder="Enter Current Satus" required>
                </div>
                <div class="input-box">
                    <span class="details">Lead Date</span>
                    <input name="leaddate" type="date" placeholder="Enter Lead Date" required>
                </div>
                <div class="input-box">
                    <span class="details">Comments</span>
                    <input name="comments" type="text" placeholder="Enter comment" required>
                </div>









            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <input type="radio" name="gender" id="dot-3">
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Prefer Not to say</span>
                    </label>
                </div>
            </div>


            <div class="button">
                <input type="submit" value="Update Your Details">
            </div>
        </form>
    </div>
</body>

</html>