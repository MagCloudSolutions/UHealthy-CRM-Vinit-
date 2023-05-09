<?php

require "functions.php";

if (!isset($_SESSION['username'])) {

    header('location: index.php');

    exit();

}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $id = $_POST['s_no'];
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
    $followupdate = $_POST['followupdate'];
    $currentstatus = $_POST['currentstatus'];
    $leaddate = $_POST['leaddate'];
    $comments = $_POST['comments'];

    // $sql = "SELECT * from user where username = '$username'";
    // $result = mysqli_query($conn, $sql);
    // $query = "UPDATE `data` SET  (`s_no`, `name`, `phone`, `email`, `state`, `gender`, `age`, `height`, `weight`, `looking_for`, `attended_dc`, `exp_date_dc`, `attended_mhf`, `exp_date_mhf`, `current_status`, `lead_date`, `comments`, `created_at`) VALUES (null, '$name', '$number', '$email', '$state','$gender', '$age', '$height', '$weight', '$lookingfor', '$attended_dc', '$exp_date_dc', '$attended_mhf', '$exp_date_mhf', '$currentstatus', '$leaddate', '$comments', current_timestamp())";
    $query = "UPDATE `data` SET `name` = '$name', `phone` = '$number', `email` = '$email', `state` = '$state', `gender` = '$gender', `age` = '$age', `height` = '$height', `weight` = '$weight', `looking_for` = '$lookingfor', `attended_dc` = '$attended_dc', `exp_date_dc` = '$exp_date_dc', `attended_mhf` = '$attended_mhf', `exp_date_mhf` = '$exp_date_mhf', `current_status` = '$currentstatus', `lead_date` = '$leaddate', `comments` = '$comments', `followup_date`= '$followupdate' WHERE `data`.`s_no` = '$id';";
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
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                include "connection.php";
                $id = $_GET['s_no'];

                $sql = "SELECT * from data where s_no = '$id'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
                if ($result) {
                    // echo "<script>alert('" . $row['name'] . "')</script>";
                    echo '<form action="update.php" method="post">
                    <div class=" user-details">
                        <div class="input-box">
                            <span class="details">Name</span>
                            <input style="display:none" name="s_no" type="text" value="' . $id . '" placeholder="Enter your name" required>
                            <input name="name" type="text" value="' . $row['name'] . '" placeholder="Enter your name" readonly="readonly">
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input name="number" type="number" value="' . $row['phone'] . '" placeholder="Enter your numer" >
                        </div>
                        <div class="input-box">
                            <span class="details">E-Mail</span>
                            <input name="email" type="text" value="' . $row['email'] . '" placeholder="Enter your email" readonly="readonly">
                        </div>
                        <div class="input-box">
                            <span class="details">State</span>
                            <input name="state" type="text" value="' . $row['state'] . '" placeholder="Enter your state" >
                        </div>
    
                        <div class="input-box">
                            <span class="details">Age</span>
                            <input name="age" type="Number" value="' . $row['age'] . '" placeholder="Enter Your Age" >
                        </div>
                        <div class="input-box">
                            <span class="details">Height(cms)</span>
                            <input name="height" type="Number" value="' . $row['height'] . '" placeholder="Enter Your Height" >
                        </div>
                        <div class="input-box">
                            <span class="details">Weight(Kg)</span>
                            <input name="weight" type="Number" value="' . $row['weight'] . '" placeholder="Enter Your Weight" >
                        </div>
                        <div class="input-box">
                            <span class="details">Looking For</span>
                            <select name="lookingfor" value="' . $row['looking_for'] . '" type="text" placeholder="Looking For?" >
                                <option value="' . $row['looking_for'] . '">' . $row['looking_for'] . '</option>';
                    if ($row['looking_for'] == "Healthy Weight Loss") {
                        echo '<option value="Healthy Weight Gain">Healthy Weight Gain</option>
                                <option value="Overall Health">Overall Health</option>';
                    } else if ($row['looking_for'] == "Healthy Weight Gain") {
                        echo '<option value="Healthy Weight Loss">Healthy Weight Loss</option><option value="Overall Health">Overall Health</option>';
                    } else {
                        echo '<option value="Healthy Weight Loss">Healthy Weight Loss</option>
                                <option value="Healthy Weight Gain">Healthy Weight Gain</option>';
                    }

                    echo '</select>
                        </div>
                        <div class="input-box">
                            <span class="details">Attended "Demo Club"</span>
                            <!-- <input name="attended_dc" type="text" placeholder="" required> -->
                            <select name="attended_dc" value="' . $row['attended_dc'] . '" type="text" placeholder="" >
                                <option value="' . $row['attended_dc'] . '">' . $row['attended_dc'] . '</option>';

                    if ($row['attended_dc'] == "No") {
                        echo '<option value="Yes">Yes</option>';
                    } else {
                        echo '<option value="No">No</option>';
                    }
                    echo '</select>
                        </div>
    
    
                        <div class="input-box">
                            <span class="details">Expected Date "Demo Club"</span>
                            <input name="exp_date_dc" value="' . $row['exp_date_dc'] . '" type="date" placeholder="Enter Expected Date">
                        </div>
                        <div class="input-box">
                            <span class="details">Attended "Mission Healthy Family"</span>
                            <select name="attended_mhf" value="' . $row['attended_mhf'] . '" type="text" placeholder="">
                                <option value="' . $row['attended_mhf'] . '">' . $row['attended_mhf'] . '</option>';
                    if ($row['attended_mhf'] == "No") {
                        echo '<option value="Yes">Yes</option>';
                    } else {
                        echo '<option value="No">No</option>';
                    }


                    echo '</select>
                        </div>
                        <div class="input-box">
                            <span class="details">Expected Date "Mission Healthy Family"</span>
                            <input name="exp_date_mhf" value="' . $row['exp_date_mhf'] . '" type="date" placeholder="Enter Expected Date">
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Current Status</span>
                            <select name="currentstatus" value="' . $row['current_status'] . '" type="text" >
                                <option value="' . $row['current_status'] . '">' . $row['current_status'] . '</option>';
                    if ($row['current_status'] == "Paid & Joined Club") {
                        echo '<option value="Interested but did not  pay">Interested but did not pay</option><option value="Not Reachable/Call Not Picked">Not Reachable/Call Not Picked</option><option value="Not Interested">Not Interested</option>';
                    } else if ($row['current_status'] == "Interested but did not pay") {
                        echo '<option value="Paid & Joined Club">Paid & Joined Club</option>
                                    <option value="Not Reachable/Call Not Picked">Not Reachable/Call Not Picked</option>
                                <option value="Not Interested">Not Interested</option>';
                    } else if ($row['current_status'] == "Not Reachable/Call Not Picked") {
                        echo '<option value="Paid & Joined Club">Paid & Joined Club</option>
                                    <option value="Interested but did not pay">Interested but did not pay</option>
                                    <option value="Not Interested">Not Interested</option>';

                    } else {
                        echo '<option value="Paid & Joined Club">Paid & Joined Club</option>
                                    <option value="Interested but did not pay">Interested but did not pay</option>
                                    <option value="Not Reachable/Call Not Picked">Not Reachable/Call Not Picked</option>';
                    }

                    echo '</select>
                        </div>
                        <div class="input-box">
                            <span class="details">Lead Date</span>
                            <input name="leaddate" value="' . $row['lead_date'] . '" type="date" placeholder="Enter Lead Date">
                        </div>
                        <div class="input-box">
                            <span class="details">Comments</span>
                            <input name="comments" value="' . $row['comments'] . '" type="text" placeholder="Enter comment" >
                        </div>
                        <div class="input-box">
                             <span class="details">Follow Up Date</span>
                            <input name="followupdate" value="' . $row['followup_date'] . '" type="date" placeholder="Enter date">
                        </div>
                        <div class="input-box">
                            <span class="details">Gender</span>
                            <select name="gender" value="' . $row['gender'] . '" type="text">
                                <option value="' . $row['gender'] . '">' . $row['gender'] . '</option>';

                    if ($row["gender"] == "Male") {
                        echo '<option value="Female">Female</option>';
                    } else {
                        echo '<option value="Male">Male</option>';
                    }



                    echo '</select>
                        </div>
                        <div class="input-box">
                            <span class="details">Assign</span>
                            <select name="gender"  type="text">
                                <option value=""></option></select>
                        </div>
                        
                    </div>
                    <div class="button">
                        <input type="submit" value="Update Your Details">
                    </div>
                </form>';
                } else {
                    echo "<script>alert('Error')</script>";

                }
            } ?>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
    </body>

</html>