<?php
session_start();
require 'connection.php';
if (isset($_POST['update1'])) {

    $image = $_FILES['image']["name"];
    $database = new database;
    $result = $database->editphoto([

        'image' => $image,
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


                                    <form method="post" action="upload_file.php" enctype="multipart/form-data">
                           
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">image</label>
                                            <input type="file" class="form-control" name="image" placeholder="image">
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
