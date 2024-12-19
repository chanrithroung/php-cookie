<?php
    require_once "db_connect.php";
    session_start();
    $id = $_SESSION['user'];

    // session_destroy();

    if( empty($id) ) header("Location: login.php");

    $pdo = db_connect();

    $query = "SELECT `id`, `profile` FROM `users` WHERE `id` = '$id'";

    $st = $pdo->query(query: $query);

    
    
    $user = $st->fetchAll(2);

    $posts = $pdo->query("SELECT * FROM `post` WHERE `author` = $id");
    $posts = $posts->fetchAll(2);
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <title>Welcome</title>
</head>
<body class="bg-light">
    <div class="container-fluid h-100vh">
        <div class="row">
            <div class="col-sm-0 col-md-0 col-lg-0 col-2 shadow h-100vh bg-white">
                <a class="px-5 mt-5 d-block" href="add_post.php">Add Post</a>
                <a class="px-5 mt-5 d-block" href="">View post</a>
                
            </div>
            <div class="col">
                <div class="container-fluid mt-4">
                    <div class="row justify-content-between">
                        <div class="col-4"><span> <span class="opacity-5"> Page </span> / Admin </span></div>
                        <div class="col-5 d-flex gap-3  align-items-center" >
                            <form action="" style="height: fit-content;" class="d-flex gap-2">
                                <input class="form-control" placeholder="Search" type="text">
                                <button class="btn btn-primary">Search</button>
                            </form>

                            <figure>
                                <img  style="width: 4rem; height: 4rem; border-radius: 50%; object-fit: contain" src="http://localhost/myphp/session_user/uploads/<?php echo $user[0]['profile'] ?>" alt="">
                            </figure>
                            <a href="logout.php" class="btn btn-danger"> Logout</a>
                        </div>
                    </div>
                </div>


                <div class="container shadow mt-5 p-5 rounded-3">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>TITLE</th>
                            <th>THUMBNAIL</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($posts as $post) {
                                    echo '                            
                                    <tr>
                                        <td>'.$post['post_id'].'</td>
                                        <td>'.$post['title'].'</td>
                                        <td>
                                            <img width="100" src="http://localhost/myphp/session_user/post_thumbnail/'.$post['thumbnail'].'" alt="">
                                        </td>
                                        <td>
                                            <button class="btn btn-success">EDIT</button>
                                            <button class="btn btn-danger">Remove</button>
                                        </td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>
</html>