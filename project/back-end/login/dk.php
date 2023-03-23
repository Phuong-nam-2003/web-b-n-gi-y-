<?php
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>đăng ký tk</title>
  <link rel="stylesheet" href="../css/dk.css">
</head>
<body>
<?php
require_once '../crud_user/connection.php';

$error = '';

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

    if (empty($error)){
        $error='';

        $sql_insert = "INSERT INTO users(name , username , password, mobile, email) VALUES ('$name','$username','$password','$mobile','$email')";
        $is_insert = mysqli_query($connection, $sql_insert);
//        var_dump($is_insert);
        if ($is_insert){
            $_SESSION['success'] = 'đăng ký thành công';
        }
        header('Location: login.php');
        exit();

        $error = 'đăng ký thất bại ';
    }
}
?>
<div class="all">
  <h2>đăng ký </h2>
    <?php echo $error;?>
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      name:
      <input class="1" type="text" name="name" >
      <br>
      username:
      <input class="2" type="text" name="username">
      <br>
      pass:
      <input class="3" type="password" name="password">
      <br>
        mobile:
        <input class="4" type="text" name="mobile">
        <br>
      email:
      <input class="5" type="email" name="email">
      <br>
      <br>
      <input class="from-submit" type="submit" name="submit" value="đăng ký">
      <br>
      <h5>quay lại trang <a href="login.php">đăng nhập</a></h5>
    </div>
  </form>
</div>
</body>
</html>