<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="homestyle.css">
    <title>form</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data.php">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">Logout</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>
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
                    <select ame="currentstatus" type="text" required>
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
</body>

</html>