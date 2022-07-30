<?php
    //Функция для отладки кода
    // function console_log( $data ) {
    //     echo '<script>';
    //     echo 'console.log('. json_encode( $data ) .')';
    //     echo '</script>';
    // }

    class FileManager {
        private $allowedTypes = null;
        
        public function __construct() {
            $this->allowedTypes = array('image/jpeg','image/png','image/gif');
        }

        public function uploadFile($fileName) {

            $filePath = pathinfo($_FILES[$fileName]["name"]);
            $idFile = sha1_file($_FILES[$fileName]['tmp_name'], FALSE); //Хеш файла по его содержимому
            $finalName = $idFile.".".$filePath['extension']; //Имя файла по его хешу
            $searchFile = "files/".$finalName;
            $fileChecked;

            for($j = 0; $j < count($this->allowedTypes); $j++) { 
                if($_FILES[$fileName]['type'] == $this->allowedTypes[$j]) {
                    $fileChecked = true;
                    break;
                }
            }
            
            if (!file_exists($searchFile) && $fileChecked) {
                move_uploaded_file($_FILES[$fileName]['tmp_name'], "files/".$finalName);
                echo json_encode(['status'=>'ok', 'msg'=>$idFile]);
            } elseif ($fileChecked == false) {
                echo json_encode(['status'=>'error', 'msg'=>'Invalid file extension']);
            } elseif (file_exists($searchFile)) {
                echo json_encode(['status'=>'error', 'msg'=>'File already exists']);
            }
        }

        public function downloading($fileGet){
            if( @file_exists( 'files/'.$fileGet ) ){
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($fileGet));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($fileGet));
                @readfile( 'files/'.$fileGet );
                echo json_encode(['status'=>'ok', 'msg'=>'Download successful']);
            } else {
                echo json_encode(['status'=>'error', 'msg'=>'The file does not exist']);
            }
        }

        public function deleting($fileDelete){
            if( @file_exists( 'files/'.$fileDelete ) ) {
                @unlink( 'files/'.$fileDelete );
                echo json_encode(['status'=>'ok', 'msg'=>'File deleted successfully']);
            } else {
                echo json_encode(['status'=>'error', 'msg'=>'The file does not exist']);
            }
        }
}
?>
