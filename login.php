<?php 
    require_once "db_connect.php";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username_email  = $_POST['usrename-email'];
        $password = $_POST['password'];

        $pdo = db_connect();
        $qeury = "SELECT * FROM `users` WHERE  (`username` = '$username_email' OR `email` = '$username_email') AND `password` = '$password'";
        $statement = $pdo->query($qeury);
        $user = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($user) {
            header("Location: welcome.php");
        }else {
            header("Location: login.php?status=fail");
        }
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
                    <h3 class="mb-5 text-center">Login</h3>
        
                    <?php
                        if(isset($_GET['status'])) {
                            echo ' <div class="alert alert-danger"> Invalid Credentials </div>';
                        }
                    ?>

                    <form action="" method="post">
                        <div class="mb-4">
                            <label for="username">Username or Emial</label>
                            <input id="username" name="usrename-email" class="form-control" placeholder="Username or email" type="text">
                        </div>
                        <div class="mb-4">
                            <label for="password">Password</label>
                            <input id="password" name="password" class="form-control" placeholder="Password" type="password">
                        </div>
                        <hr> 
                        <p class="text-center">Create an account? <a href="register.php">Register</a></p>
                        <div class="mb-4 d-grid px-4 mt-4">
                            <button class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>