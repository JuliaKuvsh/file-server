<?php
    include 'file-manager.php';
    
    $delete = new FileManager();
    $fileDelete = $_GET["delete_file"];
    $delete->deleting($fileDelete);
?>