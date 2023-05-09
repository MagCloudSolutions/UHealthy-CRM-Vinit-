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

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="css/homestyle.css">
    </head>

    <body>
        <?php
        include 'navbar.php';
        ?>
        <div class="">
            <form class="search" action="data.php" method="post">
                <input type="text" id="search" name="search"
                    style="margin: 10px;padding:10px;border-radius:10px;width:100%">
                <div class="input-group date_search" id="date_search"
                    style="padding:10px;border-radius:10px;width:100%;align-items: center;">
                    <span style="margin:5px">From :</span>
                    <input type="date" name="from" id="date1" class="form-select" />
                    <span style="margin:5px">To :</span>
                    <input type="date" name="to" id="date2" onInput={search} class="form-select" />

                </div>
                <select onclick="date()" name="select" class="form-select" style="width:65%;margin: 10px;"
                    aria-label="Default select example" style="margin: 10px;padding:10px;" id="searchselect">
                    <option value="looking_for">Looking For</option>
                    <option value="attended_dc">Attended Demo Club</option>
                    <option value="attended_mhf">Attended Mission Healthy Family</option>
                    <option value="current_status">Current Status</option>
                    <option value="exp_date_dc">Expected Date Demo club</option>
                </select>
                <button type="submit" class="btn btn-danger" style="margin: 10px;padding:10px;">Search</button>
            </form>
        </div>

        <div class="container1">
            <?php include "connection.php";

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if ($_SESSION['admin'] != 0) {
                    $data = "SELECT * from data";

                    $result_data = mysqli_query($conn, $data);
                    $num = mysqli_num_rows($result_data);
                }
                if ($_SESSION['caller'] != 0) {
                    $id = $_SESSION['user_id'];
                    $data = "SELECT id FROM data WHERE id=?";

                }

                if ($num > 0) {
                    echo "<table id='table' class='table  table-light table-bordered table-striped my-4'>";
                    echo "<thead class='table-primary'>";
                    echo "<tr>";
                    echo "<th scope='col'>S_No</th>";
                    echo "<th scope='col'>Name</th>";
                    echo "<th scope='col'>Phone Number</th>";
                    echo "<th scope='col'>Email</th>";
                    echo "<th scope='col'>State</th>";
                    echo "<th scope='col'>Gender</th>";
                    echo "<th scope='col'>Age</th>";
                    echo "<th scope='col'>Height</th>";
                    echo "<th scope='col'>Weight</th>";
                    echo "<th scope='col'>Looking For</th>";
                    echo "<th scope='col'>Attended Demo Club</th>";
                    echo "<th scope='col'>Expected Date Demo club</th>";
                    echo "<th scope='col'>Attended MHF</th>";
                    echo "<th scope='col'>Expected Date MHF</th>";


                    echo "<th scope='col'>Current Status</th>";
                    echo "<th scope='col'>Lead Date</th>";
                    echo "<th scope='col'>Comments</th>";
                    echo "<th scope='col'>Follow Up Date</th>";
                    echo "<th scope='col'></th>";
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
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['height'] . "</td>";
                        echo "<td>" . $row['weight'] . "</td>";
                        echo "<td>" . $row['looking_for'] . "</td>";
                        echo "<td>" . $row['attended_dc'] . "</td>";
                        echo "<td>" . $row['exp_date_dc'] . "</td>";

                        echo "<td>" . $row['attended_mhf'] . "</td>";
                        echo "<td>" . $row['exp_date_mhf'] . "</td>";
                        echo "<td>" . $row['current_status'] . "</td>";
                        echo "<td>" . $row['lead_date'] . "</td>";
                        echo "<td>" . $row['comments'] . "</td>";
                        echo "<td>" . $row['followup_date'] . "</td>";
                        echo "<td>";
                        echo "<div class='dropdown'>
                <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                  Select
                </button>
                <ul class='dropdown-menu'>
                  <li><form action='update.php' method='get'><input style='display:none' name='s_no' value=" . $row["s_no"] . "><button class='dropdown-item' type='submit' >Update</button></form></li>
                  <li><form action='delete.php' method='get'><input style='display:none' name='s_no' value=" . $row["s_no"] . "><button class='dropdown-item' type='submit' >Delete</button></form></li>
                  
                </ul>
              </div>";
                        echo "</td>";
                        $i++;

                    }
                    echo "</table>";
                } else {
                    echo "No Data Found";
                }
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $search = $_POST['search'];
                $select = $_POST['select'];
                $from = $_POST['from'];
                $to = $_POST['to'];


                if ($from != "" && $to != "") {
                    $sql = "SELECT * from data where $select >= '{$from}%' AND $select <= '{$to}%'";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);

                } elseif ($search != "" && $select != "") {
                    $sql = "SELECT * FROM data WHERE $select LIKE '{$search}%'";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                } else {
                    echo "<script>alert('Field Empty')</script>";
                    header("Refresh:0");

                }


                if (isset($num)) {
                    if ($num > 0) {
                        echo "<table id='table' class='table  table-light table-bordered table-striped my-4'>";
                        echo "<thead class='table-primary'>";
                        echo "<tr>";
                        echo "<th scope='col'>S_No</th>";
                        echo "<th scope='col'>Name</th>";
                        echo "<th scope='col'>Phone Number</th>";
                        echo "<th scope='col'>Email</th>";
                        echo "<th scope='col'>State</th>";
                        echo "<th scope='col'>Gender</th>";
                        echo "<th scope='col'>Age</th>";
                        echo "<th scope='col'>Height</th>";
                        echo "<th scope='col'>Weight</th>";
                        echo "<th scope='col'>Looking For</th>";
                        echo "<th scope='col'>Attended Demo Club</th>";
                        echo "<th scope='col'>Expected Date Demo club</th>";
                        echo "<th scope='col'>Attended MHF</th>";
                        echo "<th scope='col'>Expected Date MHF</th>";

                        echo "<th scope='col'>Current Status</th>";
                        echo "<th scope='col'>Lead Date</th>";
                        echo "<th scope='col'>Comments</th>";
                        echo "<th scope='col'>Follow Up Date</th>";
                        echo "<th scope='col'></th>";
                        echo "</tr>";
                        echo "</thead>";
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {

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
                            echo "<td>" . $row['followup_date'] . '</td>';
                            echo "<td>";
                            echo '<div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Select
                            </button>
                            <ul class="dropdown-menu">
                            <li><form action="update.php" method="get"><input style="display:none" name="s_no" value=' . $row["s_no"] . '><button class="dropdown-item" type="submit" >Update</button></form></li>
                            <li><form action="delete.php" method="get"><input style="display:none" name="s_no" value=' . $row["s_no"] . '><button class="dropdown-item" type="submit" >Delete</button></form></li>
                            
                            </ul>
                        </div>';
                            echo "</td>";
                            $i++;

                        }
                    } else {
                        echo "Data Not found";
                    }
                } else {
                    header('Location:data.php');
                }

            }

            ?>


            <form action="export.php" method="POST">

                <select name="export_file_type" class="form-control">
                    <option value="xlsx">XLSX</option>
                    <option value="xls">XLS</option>
                    <option value="csv">CSV</option>
                </select>
                <button type="submit" name="export_excel_btn" class="btn btn-primary mt-3">Export</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
        <script src="https://code.jquery.com/jquery-3.6.4.js"
            integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script src="js/index.js"></script>
    </body>

</html>