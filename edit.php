<?php
session_start();
// echo "<pre>";
// print_r($_SESSION["auth"]["id"]);
// exit();
require 'connection.php';


if (isset($_POST['update1'])) {
    // $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    // $image = $_POST['image'];
    // $login_id = $_POST['login_id']; 

    $database = new database;
    $result = $database->editAdmin([
        // 'id' => $id,
        'name' => $name,
        'password' => $password,
        'email' => $email,
        'gender' => $gender,
        // 'image' => $image,
        // 'login_id' => $login_id,
    ]);

    if ($result) {
        echo "Updation successfully";
    } else {
        echo "Not working";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

</head>

<body background="">
    <section class="vh-100" style="background-color: #000000;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">

                        <div class="row g-0">
                            <h1>Edit Profile</h1>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">

                                <div class="card-body p-4 p-lg-5 text-black">


                                    <form method="post"  enctype="multipart/form-data">
                                    <!-- <div class="d-flex align-items-center mb-3 pb-1">
                                            <input type="text" value="<?= $_SESSION["auth"]["id"] ?>">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Login Form</span>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">name</label>
                                            <input type="name" class="form-control"   name="name" aria-describedby="emailHelp" placeholder="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email </label>
                                            <input type="email" class="form-control"  name="email" aria-describedby="emailHelp" placeholder=" email" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control"  name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">gender</label>
                                            <input type="gender" class="form-control"  name="gender" placeholder="gender" required>
                                        </div>
                                        <button type="submit" name="update1" class="btn btn-primary">update</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // JavaScript to show the alert after a successful login
        <?php
        if ($Logged) {
            echo 'document.getElementById("loginAlert").style.display = "block";';
        }
        ?>
    </script>

</body>

</html>
<?php


?>
