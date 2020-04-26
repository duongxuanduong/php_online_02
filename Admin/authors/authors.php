<?php
  session_start();
  if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
      header('Location: ../Login/login.php');
  }
	//Liên kết tới file Connection
	require_once('../../connection.php');
    //lấy danh sách tác giả
    
	$query_authors=  "SELECT * from authors";

	$result_authors = $conn->query($query_authors);

	$authors_post = array();

	while($row = $result_authors->fetch_assoc()){
		$authors_post[] = $row;
	}
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
    <script language="javascript" text="text/javascript">
        <form id="vidu2">
            <input type="button" id="Doimatkhau" value="Đổi mật khẩu" onclick="traloi=confirm('Bạn có muốn đổi mật khẩu ');"/>
        </form>
    </script>
</head>
<body>
    <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Authors List</h3>
    <a href="authors_add.php" type="button" class="btn btn-primary">Thêm mới</a>
    <a href="../Login/index.php" type="button" class="btn btn-primary">Về trang Admin</a>
    <?php if(isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-success">
                <strong>Thông báo</strong> <?=$_COOKIE['msg'] ?>
            </div>
    <?php } ?>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">status</th>
        </tr>
      </thead>
      <tbody>
      <?php  foreach ($authors_post as $status) { ?>
        <tr>
          <th scope="row"><?= $status['id']?></th>
          <td><?=  $status['name']?></td>
          <td><?= $status['email']?></td>
          <td><?=  $status['password']?></td>
          <td><?= $status['status']?></td>
          <td>
            <a href="authors_detail.php?id=<?=$status['id']?>" type="button" class="btn btn-default">Xem</a>
            <a href="authors_edit.php?id=<?=$status['id']?>" type="button" class="btn btn-success">Sửa</a>
            <a href="authors_delete.php?id=<?=$status['id']?>"  onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-warning">Xóa</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
</body>
</html>