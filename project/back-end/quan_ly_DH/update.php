<?php
session_start();
require_once '../crud_user/connection.php';
// - lấy id từ url: crud_user/update.php?id=1
// validate id hợp lệ : phải ồn tại tham số id và phải là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID k hợp lệ ';
    header('location: thongtin.php');
    exit();
}
$id = $_GET['id'];
// lấy ra user dựa theo id: SELECT 1 bản ghi
// B1 : viết truy vấn:
$sql_select_one = "SELECT * FROM orders WHERE id = $id";
//B2 thự thi : SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
//B3 trả về mảng kết hợp 1 chiều :
$user = mysqli_fetch_assoc($result_one);
//B2 :
$error = '';
//B3 :

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];

    if (empty($name)){
        $error = 'tên phải nhập ';
    }elseif (!is_numeric($phone)){
        $error = 'mobile phải là số ';
    }elseif ($diachi){
        $error = 'địa chỉ phải nhập ';
    }

    $sql_insert = "UPDATE orders SET name='$name',phone='$phone',email= '$email',diachi='$diachi' WHERE id=$id";
    $is_insert = mysqli_query($connection, $sql_insert);
    //var_dump($is_insert);
    if ($is_insert){
        $_SESSION['success'] = 'cập nhập thành công';
        header('Location: thongtin.php');
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
<h2 style="margin-inline: 30%;"> sửa thông tin user</h2>
<form class="aaa" style=" display: inline-grid;" action="" method="post" enctype="multipart/form-data">
    name:
    <input type="text" value="<?php echo $user['name'] ?>" name="name">
    <br>
    mobile:
    <input type="text" value="<?php echo $user['phone'] ?>" name="phone"><br>
    email:
    <input type="email" value="<?php echo $user['email'] ?>" name="email"><br><br>
    địa chỉ:
    <input type="email" value="<?php echo $user['diachi'] ?>" name="diachi"><br><br>
    <input type="submit" name="submit" value="lưu user">
    <br>
    <h3><a href="thongtin.php">về trang thông tin</a></h3>
</form>

</div>


</html>