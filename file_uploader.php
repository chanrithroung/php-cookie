<?php 
    function uploads($file, $upload_dir) {
        /*  This function will upload file image and return the file name */
        $fileName = $file['name'];
        $fileName = rand(0, 99999999).date('Y-m-d-h-i-s').'.'.pathinfo($fileName, PATHINFO_EXTENSION);
        move_uploaded_file($file['tmp_name'], $upload_dir.'/'.$fileName); 
        return $fileName;
    }