<?php

$file = $_GET["get_file"];

downloading($file);

function downloading($gettingFile){
    if( @file_exists( 'files/'.$gettingFile ) ){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($gettingFile));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($gettingFile));
        @readfile( 'files/'.$gettingFile );
        echo json_encode(['status'=>'ok', 'msg'=>'Download successful']);
    } else {
        echo json_encode(['status'=>'error', 'msg'=>'The file does not exist']);
    }
}

?>