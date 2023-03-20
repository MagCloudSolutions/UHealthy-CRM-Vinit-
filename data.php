<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $username = $_SESSION['username'];
    $sql = "SELECT * from user where username = '$username'";
    $result = mysqli_query($conn, $existsql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $data = "SELECT * from data";
        $result_data = mysqli_query($conn, $data);
        $num = mysqli_num_rows($result_data);
        if ($num > 0) {
            echo "<table id='table' class='table  table-light table-bordered table-striped my-4'>";
            echo "<thead class='table-primary'>";
            echo "<tr>";
            echo "<th scope='col'>S_No</th>";

            echo "<th scope='col'>Name</th>";

            echo "<th scope='col'>Phone Number</th>";
            echo "<th scope='col'>Email</th>";
            echo "<th scope='col'>State</th>";
            echo "<th scope='col'>Age</th>";
            echo "<th scope='col'>Height</th>";
            echo "<th scope='col'>Weight</th>";
            echo "<th scope='col'>Looking For</th>";
            echo "<th scope='col'>Attended</th>";
            echo "<th scope='col'>Expected Date</th>";
            echo "<th scope='col'>Current Status</th>";
            echo "<th scope='col'>Lead Date</th>";
            echo "<th scope='col'>Comments</th>";
            // echo "<th scope='col'></th>";
            echo "</tr>";
            echo "</thead>";
            $i = 0;
            while ($row = mysqli_fetch_assoc($result_data)) {

                echo "<tr>";
                echo "<th scope='row'>" . $i + 1 . "</th>";
                echo "<td colspan='1'>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['age'] . '</td>';
                echo "<td>" . $row['height'] . '</td>';
                echo "<td>" . $row['weight'] . '</td>';
                echo "<td>" . $row['looking_for'] . '</td>';
                echo "<td>" . $row['attended_dc'] . '</td>';
                echo "<td>" . $row['exp_date_dc'] . '</td>';
                echo "<td>" . $row['attended_mhf'] . '</td>';
                echo "<td>" . $row['exp_date_mhf'] . '</td>';
                echo "<td>" . $row['current_status'] . '</td>';
                echo "<td>" . $row['lead_date'] . '</td>';
                echo "<td>" . $row['comments'] . '</td>';
                // echo "<td> <input type='button' name=" . $row['s_no'] . " class='btn-close' aria-label='Close' onclick='remove(this)' /> </td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";
        } else {
            echo "No Data Found";
        }



    } else {
        echo "No Data Found";
    }
} else {
    echo "Connection Error";
}
?>