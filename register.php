<?php 
    require_once "file_uploader.php";
    require_once "db_connect.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $pdo = db_connect();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $file = $_FILES['profile'];
        $profile = uploads($file);

        $query  = "INSERT INTO `users`(`username`, `email`, `password`, `profile`) VALUES ('$username','$email','$password','$profile')";

        $pdo->exec($query);
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body {
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
        <title>Register</title>
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="p-4 shadow-lg bg-white rounded-3">
                    <h3 class="mb-5 text-center">Register</h3>
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="mb-4">
                            <label for="username">Username</label>
                            <input name="username" id="username" class="form-control" placeholder="Username " type="text">
                        </div>
                        <div class="mb-4">
                            <label for="email">Email</label>
                            <input name="email" id="email" class="form-control" placeholder="Email" type="email">
                        </div>
                        <div class="mb-4">
                            <label for="password">Password</label>
                            <input name="password" id="password" class="form-control" placeholder="Password" type="password">
                        </div>
                        <div class="mb-4">
                            <label for="profile">Profile</label>
                            <input id="profile" name="profile" class="form-control" type="file">
                        </div>
                        <hr> 
                        <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
                        <div class="mb-4 d-grid px-4 mt-4">
                            <button class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>