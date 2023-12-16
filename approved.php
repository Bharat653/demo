<?php
session_start();
require 'connection.php';
// print_r($_GET["approvedid"]);
// exit();
//use for only approved data come//
if(isset($_GET["approvedid"])){
    
    $userlogin_id = $_GET['approvedid'];
    $database = new database;
    $result = $database->getApproval(['status' => 'approved', 'id' =>$userlogin_id]);
    header("location:dashboard.php");
    exit();
}

?>