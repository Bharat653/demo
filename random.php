<?php
session_start();
require 'connection.php';

// $getfile = $database->getCategoryfile();
$getAproolist = $database->getapprovallist();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                
                                    <input type="hidden" name="share2" value="<?php echo $_GET['id']; ?>">
                               
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
</body>
</html>