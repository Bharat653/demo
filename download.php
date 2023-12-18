<?php
if(isset($_GET["file_id"])) {
    header("content-disposition: attachment; filename=" . basename($_GET["file_id"]));
    readfile($_GET["file_id"]);
    exit();
}
?>