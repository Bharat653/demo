<?php
session_start();
if(!isset($_SESSION['auth'])){
  header("location:admin.php");
}
require 'connection.php';



$registered = $database->getRegistration();
// echo"<pre>";
// print_r($_SESSION["auth-user"][0]["id"]);
// exit();
$sharedData = $database->getsharedata(['user_id'=>$_SESSION["auth-user"][0]["id"]]);
// print_r($sharedData);
// exit();
// print_r($registered);
// exit();
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="user_registration.php">New Registration<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Categories</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="files.php">upload</a>
        </li>
       
    
      </ul>

    </div>
  </nav>
  
    </nav>
    <!-- End Navbar -->
    <!-- 
    <h1>Welcome!</h1> -->
    <div class="container-fluid py-4">


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <form method="post" action="">
       
        <div>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"> file_name</th>
                <th scope="col"> View</th>
                <th scope="col"> download</th>
              </tr>
            </thead>



            <tbody id="container">

              <?php

              $serialnumber = 1;

              foreach ($sharedData as $share) {
                echo "<tr>";
                echo "<td>" . $serialnumber . "</td>";
                echo "<td>" . $share["file_name"] . "</td>";
                echo "<td><a href= 'view.php?view_id=" . $share["file_name"] . "' class='btn btn-success'>View</button></td>";
                echo "<td><a href='download.php?file_id=" . $share["file_id"] . "' class='btn btn-success'>Download</a></td>";
                echo "<tr>";
                $serialnumber++;
              }
              ?>
            </tbody>

          </table>
        </div>
    </div>
  </main>
  <script type="text/javascript">

</script>
  <!--   Core JS Files   -->
  <?php
  require_once "link/lowerjs.php";
  ?>

</body>

</html>