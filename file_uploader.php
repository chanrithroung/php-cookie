<?php 
    function uploads($file) {
        $fileName = $file['name'];
        $fileName = rand(0, 99999999).date('Y-m-d-h-i-s').'.'.pathinfo($fileName, PATHINFO_EXTENSION);
        move_uploaded_file($file['tmp_name'], 'uploads/'.$fileName); 
        return $fileName;
    }