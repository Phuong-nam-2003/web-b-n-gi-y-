<?php
session_start();
require_once '../crud_user/connection.php';
// - lấy id từ url: crud_user/update.php?id=1
// validate id hợp lệ : phải ồn tại tham số id và phải là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID k hợp lệ ';
    header('location: table-nhan-vien.php');
    exit();
}
$id = $_GET['id'];
// lấy ra user dựa theo id: SELECT 1 bản ghi
// B1 : viết truy vấn:
$sql_select_one = "SELECT * FROM users WHERE id = $id";
//B2 thự thi : SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
//B3 trả về mảng kết hợp 1 chiều :
$user = mysqli_fetch_assoc($result_one);
//B2 :
$error = '';
//B3 :

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    if (empty($name)){
        $error = 'tên phải nhập ';
    }elseif (strlen($pass) <3){
        $error= 'password phải trên 23 ký tự';
    }elseif (!is_numeric($mobile)){
        $error = 'mobile phải là số ';
    }

    $sql_insert = "UPDATE users SET name='$name',username= '$user',password='$pass',mobile='$mobile',email= '$email' WHERE id=$id";
    $is_insert = mysqli_query($connection, $sql_insert);
    //var_dump($is_insert);
    if ($is_insert){
        $_SESSION['success'] = 'cập nhập thành công';
        header('Location: table-nhan-vien.php');
        exit();
    }
    $error = 'cập nhập thất bại ';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> update</title>
<link rel="stylesheet" href="../css/update.css">

</head>

<div class="title">
<h3 style="color: red"><?php echo $error; ?></h3>
<h2> sửa thông tin user</h2>
<form class="aaa" style=" display: inline-grid;" action="" method="post" enctype="multipart/form-data">
    name:
    <input type="text" value="<?php echo $user['name'] ?>" name="name">
    <br>

    username :
    <input type="text" value="<?php echo $user['username']?>" name="username"><br>

    password:
    <input type="password" value="<?php echo $user['password'] ?>" name="password"><br>
    mobile:
    <input type="text" value="<?php echo $user['mobile'] ?>" name="mobile"><br>
    email:
    <input type="email" value="<?php echo $user['email'] ?>" name="email"><br><br>
    <input type="submit" name="submit" value="lưu user">
    <br>
    <h3><a href="table-nhan-vien.php">về trang danh sách</a></h3>
</form>

</div>


</html>