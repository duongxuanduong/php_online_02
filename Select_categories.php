<?php
	//Lấy bảng categories
	//Liên kết tới file Connection
	require_once('connection.php');
	//load danh mục
	$query_post=  "SELECT * from categories";

	$result_post = $conn->query($query_post);

	$categorie_post = array();

	while($row = $result_post->fetch_assoc()){
		$categorie_post[] = $row;
	}
?>