<?php
    include "file_uploader.php";
    include "db_connect.php";

    session_start();
    $id = $_SESSION['user'];


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // echo "test1";
        $post_title = $_POST['title'];
        // echo $post_title;
        $file = $_FILES['thumbnail'];
        $thumbnail = uploads($file, 'post_thumbnail');

        $pdo = db_connect();
        $query = "INSERT INTO `post`(`title`, `author`,  `thumbnail`) 
                VALUES ('$post_title', '$id', '$thumbnail');";
        // echo $query;
        $pdo->exec($query);
        header("Location: add_post.php");

    }