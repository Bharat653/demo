<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:admin.php");
}
require 'connection.php';


if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['categories_id'] == "")) {
        echo " field are required";
    } else {
        $categories = $_POST['categories_id'];
        $file_name = $_FILES['file_name']["name"];
        // echo"<pre>";
        // print_r("$categories");
        // exit();
        $result = $database->categoryfile($categories, $file_name);
        if ($result) {
            echo '<div class="alert alert-success w-50 p-3   role="alert">Category added successfully</div>';
        } else {
            echo "Failed to add ";
        }
    }
}



$category = $database->getcategory();
$getfile = $database->getCategoryfile();
$getAproolist = $database->getapprovallist();
// echo"<pre>";
// print_r($getAproolist);
// exit();

?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="mystyle12.css">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
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
            </ul>

        </div>
    </nav>
    <main class="main-content border-radius-lg">
        <small>Upload file with categories</small>
        <div class="container-fluid py-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add File
            </button>

            <!-- Modal 1-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add country</h5>
                        </div>
                        <form action="files.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Enter Categories Name:</b></label>
                                    <select name="categories_id" id="categories" class="form-control input-sm">
                                        <option> select category</option>
                                        <?php foreach ($category as $categories) : ?>
                                            <option value="<?php echo $categories['id']; ?>"><?php echo $categories['categories_name'];  ?> </option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><b></b></label>
                                    <input type="file" class="form-control input-sm" name="file_name" value="" placeholder="file">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="submit" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- <h1>Welcome!</h1> -->

        <div class="container-fluid py-4">


            <!-- Modal -->


            <div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> category name</th>
                            <th scope="col"> file_name </th>
                            <th scope="col"> </th>
                            <th scope="col"> share</th>

                        </tr>
                    </thead>
                    <tbody id="container">

                        <?php

                        $serialnumber = 1;

                        foreach ($getfile as $row)
                        //     echo "<pre>";
                        // print_r($row);
                        // exit(); 
                        {
                            echo "<tr>";
                            echo "<td>" . $serialnumber . "</td>";
                            echo "<td>" . $row["categories_name"] . "</td>";
                            echo "<td>" . $row["file_name"] . "</td>";
                            echo "<td>";
                            echo "<input type='hidden' name='share1' value='" . $row['id'] . "'>";
                            echo "</td>";
                            echo "<td>
                            <button class='btn btn-success share-btn'><a href='random.php?id=".$row['id']."'>shared</a> </button>
                                </td>";
                            echo "</tr>";
                            $serialnumber++;
                        }

                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <!-- Modal 2-->
        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="share.php" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Share File</h5>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($getAproolist as $approvalItem) : ?>
                                <div class="form-group">
                                    <label class="control-label">
                                        <b><?php echo $approvalItem['name']; ?></b>
                                    </label>
                                    <input type="checkbox" class="form-check-input" name="share[]" value="<?php echo $approvalItem['id']; ?>">
                                    <?php foreach($getfile as $row) ?>
                                    <input type="text" name="share2" value="<?php echo $row['id']; ?>">
                               
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit_btn" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php
    require_once "link/lowerjs.php";
    ?>
    <?php
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $filename = $_FILES["file"]["name"];
        $tmp_name = $_FILES["file"]["tmp_name"];
        $folder = "../upload-file/" . $filename;
        move_uploaded_file($tmp_name, $folder);
        echo "File uploaded successfully.";
    } else {
        // echo "Error uploading file.";
    }
    ?>

    <script>



    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>