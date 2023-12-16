<?php
session_start();
require 'connection.php';
// print_r($_GET["approvedid"]);
// exit();
if(isset($_GET["rejectid"])){
    
    $userlogin_id = $_GET['rejectid'];
    $database = new database;
    $result = $database->getApproval(['status' => 'reject', 'id' =>$userlogin_id]);
    header("location:dashboard.php");
    exit();
}

?>