<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: ../Login/login.php');
    }
	//Liên kết tới file Connection
    require_once('../../connection.php');
    //lấy  danh mục theo id
    $id = $_GET['id'];
	$query_ad_authorsid=  "SELECT * from authors where id=".$id."";

	$result_ad_authorsid = $conn->query($query_ad_authorsid);
  
    $authors_ad_2 = $result_ad_authorsid->fetch_assoc(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent - Education And Technology Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Add Edit Authors</h3>
    <a href="authors.php" type="button" class="btn btn-primary">Về trang chủ Authors - Admin</a>
    <hr>
        <?php if(isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-warning">
                <strong>Thông báo</strong> <?=$_COOKIE['msg'] ?>
            </div>
        <?php } ?>
        <form action="authors_edit_action.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden"  name="id" value="<?=$authors_ad_2['id'] ; ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="<?=$authors_ad_2['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="" placeholder="" name="email" value="<?=$authors_ad_2['email'] ?>">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="Password" class="form-control" id="" placeholder="" name="password" value="<?=$authors_ad_2['password']?>">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <input type="text" class="form-control" id="" placeholder="" name="status" value="<?=$authors_ad_2['status'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</body>
</html>