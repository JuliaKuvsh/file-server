<?php

$file = $_GET["delete_file"];

deleting($file);

function deleting($deletingFile){
    if( @file_exists( 'files/'.$deletingFile ) ){
        @unlink( 'files/'.$deletingFile );
        echo json_encode(['status'=>'ok', 'msg'=>'File deleted successfully']);
    } else {
        echo json_encode(['status'=>'error', 'msg'=>'The file does not exist']);
    }
}

?>