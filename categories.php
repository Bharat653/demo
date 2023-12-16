<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:admin.php");
}
require 'connection.php';

if (isset($_POST['updateEdit'])) {
    $categories_id = $_POST['id'];

    $categories_name = $_POST['categories_name'];

    $database = new database;
    $result = $database->updateEdit(['categories_name' => $categories_name, 'categories_id' => $categories_id]);

    if ($result) {
        echo "Categories updated successfully";
    } else {
        echo "Failed to update category";
    }
}

if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['categories'] == "")) {
        echo " field are required";
    } else {
        $result = $database->addCategories();
        if ($result) {
            echo '<div class="alert alert-success w-50 p-3   role="alert">Category added successfully</div>';
        } else {
            echo "Failed to add country";
        }
    }
}

$category = $database->getcategory();

?>
<!DOCTYPE html>
<html lang="en">

<style>
    body {
        background-image: url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?size=626&ext=jpg&ga=GA1.1.1546980028.1702425600&semt=sph');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
    }

    .profile-image-container {
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50%;
        margin-right: 20px;
        /* Adjust as needed */
    }

    .profile-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .btn a {
        text-decoration: none;
        color: inherit;
        /* To inherit the text color from the button */
    }
</style>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <title>
        Dashboard Project
    </title>
    <?php require_once "link/head.php"; ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php require_once "link/sideheader.php"; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="logOut.php">Log out</a>
        <a class="navbar-brand" href="dashboard.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">New categories<span class="sr-only">(current)</span></a></button>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categories</a>
                </li>
    -->

            </ul>

        </div>
    </nav>
    <main class="main-content border-radius-lg">
        <h1>Add Categories</h1>
        <div class="container-fluid py-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Categories
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add country</h5>

                        </div>
                        <div class="modal-body">
                            <form action="categories.php" method="post">

                                <div class="modal-body ">
                                    <div class="form-group">
                                        <label class="control-label"><b>Enter Categories Name:</b></label>
                                        <input type="text" class="form-control input-sm " name="categories" value="" placeholder="Categories">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="submit" class="btn btn-sm btn-primary">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar -->
        <!-- 
    <h1>Welcome!</h1> -->

        <div class="container-fluid py-4">


            <!-- Modal -->
         
            <form method="post" action="">

                <div>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> category</th>
                                <th scope="col"> delete </th>
                                <th scope="col"> edit</th>

                            </tr>
                        </thead>



                        <tbody id="container">

                            <?php

                            $serialnumber = 1;

                            foreach ($category as $categories) {
                                echo "<tr>";
                                echo "<td>" . $serialnumber . "</td>";
                                // echo "<td>" . $categories["id"] . "</td>";
                                echo "<td>" . $categories["categories_name"] . "</td>";

                                echo "<td><button class='btn btn-danger'><a href='delete.php?deleteid=" . $categories['id'] . "'>Delete</a></button></td>";
                                echo "<td><button class='btn btn-success' ><a href='crud/edit2.php?editid=" . $categories['id'] . "'>Edit</a></button></td>";
                                echo "<tr>";
                                $serialnumber++;
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php
    require_once "link/lowerjs.php";
    ?>

</body>

</html>