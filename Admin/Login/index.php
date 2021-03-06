<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP - Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>  
    <br><br>
    <div class="container">
        <div class="row">
            <aside class="col-sm-12">  
                <div class="card">
                    <article class="card-body">
                        <a href="logout.php" class="float-right btn btn-outline-primary">Logout</a>
                        <h4 class="card-title mb-4 mt-1">Admin Site</h4>

                        <hr>
                        <h5>Xin chào <?=$_SESSION['author']['name']?></h5>
                        <ul>
                            <li><a href="../authors/authors.php">Quản lý người dùng</a></li>
                            <li><a href="../category/categories.php">Quản lý danh mục</a></li>
                            <li><a href="../posts/posts.php">Quản lý bài viết</a></li>
                        </ul>   
                    </article>
                </div>
            </aside>
        </div>
    </div> 
</body>
</html>