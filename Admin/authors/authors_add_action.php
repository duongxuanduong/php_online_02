<?php
    require_once('../../connection.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $query = "INSERT INTO authors(name,email,password,status) VALUES ('".$name."','".$email."','".$password."','".$status."');";
    $status = $conn->query($query);
    
    if ($status== true) {
        setcookie('msg','Thêm mới thành công',time()+5);
        header('Location: authors.php');
    }else {
        setcookie('msg','Thêm vào không thành công',time()+5);
        header('Location: authors_add.php');
    }
?>