<?php
    require_once('../../connection.php');

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];;
    $query = "UPDATE categories  SET tible = '".$title."', descripition= '".$description." 'WHERE id = ".$id;
    $status = $conn->query($query);
    if ($status== true) {
        setcookie('msg','Sửa mới thành công',time()+5);
        header('Location: categories.php');
    }else {
        setcookie('msg','Sửa không thành công',time()+5);
        header('Location: category_edit.php?id='.$id);
    }
?>