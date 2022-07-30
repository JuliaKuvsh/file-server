<?php
    include 'file-manager.php';
    
    $download = new FileManager();
    $fileGet = $_GET["get_file"];
    $download->downloading($fileGet);
?>