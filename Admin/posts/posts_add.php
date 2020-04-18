<?php
	//Liên kết tới file Connection
	require_once('../../connection.php');
	//load danh mục
	$query_post=  "SELECT * from categories";

	$result_post = $conn->query($query_post);

	$cate_value = array();

	while($row = $result_post->fetch_assoc()){
		$cate_value[] = $row;
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
</head>
<body>
    <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Add New Posts</h3>
    <a href="posts.php" type="button" class="btn btn-primary">Về trang chủ Category - Admin</a>
    <hr>
        <?php if(isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-warning">
                <strong>Thông báo</strong> <?=$_COOKIE['msg'] ?>
            </div>
        <?php } ?>
        <form action="posts_add_action.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="" name="title">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description">
            </div>
            <div class="form-group">
                <label for="">Contents</label>
                <textarea rows="8" class="form-control" id="" placeholder="" name="contents"></textarea>
            </div>
            <div class="form-group">
                <label for="cars">Categories: </label>
                <select id="" name="categories_id" class="form-control">
                    <?php foreach ($cate_value as $cate) {?>
                        <option value="<?=$cate['id']?>"><?=$cate['tible']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="">Hiện thị bài biết</label>
                <input type="checkbox" id="" placeholder="" value="1" name="status"><em>(Check cho phép hiện thị bài viết)</em>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>