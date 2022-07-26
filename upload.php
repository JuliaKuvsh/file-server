<?php

$extension = pathinfo($_FILES["upload_file"]["name"]);;
$finalName = sha1_file($_FILES['upload_file']['tmp_name'], FALSE).".".$extension['extension'];
$idFile = sha1_file($_FILES['upload_file']['tmp_name'], FALSE);

$searchFile = "files/".$finalName;

if (!file_exists($searchFile)) {
    move_uploaded_file($_FILES['upload_file']['tmp_name'], "files/".$finalName);
    echo json_encode(['status'=>'ok', 'msg'=>$idFile]);
} else {
    echo json_encode(['status'=>'error', 'msg'=>'File already exists']);
}

?>
