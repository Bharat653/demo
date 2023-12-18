<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_id = $_POST['share2'];
    $selected_users = $_POST['share'] ?? null;

    if (empty($selected_users)) {
        echo '<div class="alert alert-danger w-50 p-3" role="alert">Please select at least one user</div>';
        exit();
    }

    foreach ($selected_users as $user_id) {
        // echo $user_id;
  
        $result = $database->sharedata(['user_id' => $user_id, 'file_id' => $file_id]);

  
    }

    echo '<div class="alert alert-success w-50 p-3" role="alert">Shared successfully</div>';
   
}
?>
  <!-- <button class='btn btn-success share-btn'><a href='random.php?id=".$row['categories_id']."'>shared</a> </button>


  <button type='button' class='btn btn-success share-btn' data-bs-toggle='modal' data-bs-target='#shareModal' data-categories-id='" . $row['categories_id'] . "'>Shared</button> -->