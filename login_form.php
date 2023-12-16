<?php
session_start();
require 'connection.php';
// $result = "";
if (isset($_REQUEST['submit'])) {


    if (($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")) {
        echo "all fields filled";
    } else {
        $database = new database();
        $result = $database->newlogin($_POST);
        if ($result) {
            header("location:logged_page.php");
        } else {
            echo "Failed to registration";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Input Form Design</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="box">
        <h2>Login</h2>
        <form method="post">
            <div class="inputbox">
                <input type="text" name="email" required="" />
                <label>email</label>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required="" />
                <label>Password</label>
            </div>
            <input type="submit" name="submit" value="log IN" />
            <a href="user_Registration.php"><button type="button" class="btn btn-secondary">New Regestration </button></a>
        </form>
    </div>
</body>

</html>