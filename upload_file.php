<?php
session_start();
require 'connection.php';
// echo"<pre>";
// print_r($_FILES["image"]);
// exit();
 $filename =  $_FILES["image"]["name"];
 $tmp_name = $_FILES["image"]["tmp_name"];
 $folder = "../upload-images/".$filename;
 echo "$folder";
 move_uploaded_file($tmp_name, $folder);
 $image = $_FILES['image']["name"];
 // $login_id = $_POST['login_id']; 

 $database = new database;
 $result = $database->editphoto([

     'image' => $image,
    
 ]);
 header("location:dashboard.php");
?>