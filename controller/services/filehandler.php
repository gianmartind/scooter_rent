<?php
    class FileHandler{
        public static function Upload($fileName){
            $originalName = $_FILES['file']['name'];
            $ext = pathinfo($originalName, PATHINFO_EXTENSION);
            $temp_name = $_FILES['file']['tmp_name'];

            $dirUpload = "uploaded/";

            $moveUpload = move_uploaded_file($temp_name, $dirUpload.$fileName);

            if($moveUpload){
                return $fileName;
            }
        }    
    }
?>