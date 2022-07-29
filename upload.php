<?php

$extension = pathinfo($_FILES["upload_file"]["name"]);;
$allowedTypes = array('image/jpeg','image/png','image/gif');
$finalName = sha1_file($_FILES['upload_file']['tmp_name'], FALSE).".".$extension['extension'];
$idFile = sha1_file($_FILES['upload_file']['tmp_name'], FALSE);
$searchFile = "files/".$finalName;

for($j = 0; $j < count($allowedTypes); $j++) { 
    if($_FILES['upload_file']['type'] == $allowedTypes[$j]) {
        $fileChecked[$i] = true;
        break;
    }
}

if (!file_exists($searchFile) && $fileChecked) {
    move_uploaded_file($_FILES['upload_file']['tmp_name'], "files/".$finalName);
    echo json_encode(['status'=>'ok', 'msg'=>$idFile]);
} elseif ($fileChecked == false) {
    echo json_encode(['status'=>'error', 'msg'=>'Invalid file extension']);
} elseif (file_exists($searchFile)) {
    echo json_encode(['status'=>'error', 'msg'=>'File already exists']);
}

?>
