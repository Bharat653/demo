<?php
session_start();
if(!isset($_SESSION['auth'])){
  header("location:admin.php");
}
require 'connection.php';

// echo"<pre>";
// print_r($_SESSION["auth"]);
// exit();

$registered = $database->getRegistration();
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
  <main class="main-content border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
          </ol>
          <div class="d-flex align-items-center mb-3 pb-1">
            <div class="profile-image-container">
              <img src='../upload-images/<?= $_SESSION["auth"]["0"]["image"] ?>' alt="Profile Image">
            </div>
            <a href="edit.php"><button type="button" class="btn btn-dark" style="
               margin-right: -21%;
                margin-left: 95%;
               ">change Profile</button></a>
          </div>
          <div class="d-flex align-items-center mb-3 pb-1">
            <a href="edit_photo.php"><button type="button" class="btn btn-dark" style="
          margin-left: 110%;
          margin-top: -131%;
          ">Change Photo</button></a>
          </div>
        </nav>
      </div>
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
          <select name="filter" id="filter">
            <option value="select">select</option>
            <option value="approved">approve</option>
            <option value="Reject">Reject</option>

          </select>
        </div>
        <div>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"> Name</th>
                <th scope="col"> Email</th>
                <th scope="col"> Number </th>
                <th scope="col"> status</th>
                <th scope="col"> action</th>
                <th scope="col"> action</th>
              </tr>
            </thead>



            <tbody id="container">

              <?php

              $serialnumber = 1;

              foreach ($registered as $registration) {
                echo "<tr>";
                echo "<td>" . $serialnumber . "</td>";
                // echo "<td>" . $registration["id"] . "</td>";
                echo "<td>" . $registration["name"] . "</td>";
                echo "<td>" . $registration["email"] . "</td>";
                echo "<td>" . $registration["number"] . "</td>";
                echo "<td>" . $registration["status"] . "</td>";
                echo "<td><button class='btn btn-danger'><a href='reject.php?rejectid=" . $registration['id'] . "'>Reject</a></button></td>";
                echo "<td><button class='btn btn-success' ><a href='approved.php?approvedid=" . $registration['id'] . "'>Approved</a></button></td>";
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
  <script type="text/javascript">
    $(document).ready(function() {
      $("#filter").on('change', function() {
        var value = $(this).val();
        // alert(value);

        $.ajax({
          url: "fetch.php",
          type: "POST",
          data: {
            'request': value
          },
          beforeSend: function() {
            $(".container").html("<span>working</span>");
          },
          success: function(data) {
            // console.log(data); 
            $("#container").html(data);
          }
        })
      })
    })
  </script>
</body>

</html>