<?php
session_start();
require 'connection.php';
// echo"<pre>";
// print_r(($_REQUEST['submit']));
// exit();
if (isset($_REQUEST['submit'])) {

    if (($_REQUEST['name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['number'] == "")
        || ($_REQUEST['password'] == "") || ($_REQUEST['gender'] == "")
    ) {
        echo "all fields are required";
     
    } else {
        $result = $database->addRegistration();
        
        if ($result) {
            // echo '<div class="alert alert-success w-50 p-3   role="alert">Registration successfully</div>';
        } else {
            echo "Failed to registration";
        }
    }
}

// $registration->database->getRegistration();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="mystyle.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Regristration Form</title>
</head>

<body>
    <div class="container">
        <div class="title">Regristration</div>
        <form action="user_Registration.php" method="post">

            <div class="user-details">
                <div class="input-box">
                    <span class="deatils">Full Name</span>
                    <input type="text" name="name" placeholder="Enter Your Name" required />
                </div>
                <div class="input-box">
                    <span class="deatils">Email</span>
                    <input type="email" name="email" placeholder="Enter Your Email" required />
                </div>
                <div class="input-box">
                    <span class="deatils">Phone Number</span>
                    <input type="number" name="number" placeholder="Enter Your Number" required />
                </div>
                <div class="input-box">
                    <span class="deatils">Password</span>
                    <input type="password" name="password" placeholder="Enter Your Password" required />
                </div>
            </div>
            <div class="gendre-details">
                <input type="radio" id="html" name="gender" value="male">
                <label for="html">male</label><br>
                <input type="radio" id="css" name="gender" value="Female">
                <label for="css">Female</label><br>
                <input type="radio" id="javascript" name="gender" value="other">
                <label for="javascript">other</label><br><br>
                <input type="submit" value="submit" name="submit">
            </div>
            <div class="input-box">
                <a href="Login_form.php" style="
                 margin-left: 84%;
                  ">login form</a>
            </div>
            <div class="input-box">
                <a href="dashboard.php" style="
                 margin-left: 0%;
                  ">Dashboard</a>
            </div>

    </div>

    <!-- <div class="button">
        <input type="Submit" name="submit"  />
    </div> -->
    </form>
    </div>
</body>

</html>