<?php
require 'connection.php';
session_start();
if (isset($_POST['request'])) {
    $request = $_POST['request'];
    // echo"<pre>";
    // print_r($request);
    // exit();
    //use for data comes on page //
  $result = $database->approvalfilter(['status' => $request]);

  foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $serialnumber . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["number"] . "</td>";
    echo "<td>" . $row["status"] . "</td>";
    echo "<td><button class='btn btn-danger'><a href='reject.php?rejectid=" . $row['id'] . "'>Reject</a></button></td>";
    echo "<td><button class='btn btn-success' ><a href='approved.php?approvedid=" . $row['id'] . "'>Approved</a></button></td>";
    echo "<tr>";
  }
}
?>
