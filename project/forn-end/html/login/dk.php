<?php
session_start();
require_once '../connection.php';

$error = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];


    if (empty($name)) {
        $error = 'bạn chưa nhập tên';
    } elseif (empty($username)) {
        $error = 'username phải nhập ';
    } elseif (strlen($password) < 3) {
        $error = 'password phải trên 3 ký tự';
    } elseif (empty($mobile)) {
        $error = 'bạn chưa nhập mobile';
    } elseif (!is_numeric($mobile)) {
        $error = 'mobile phải là số ';
    } elseif (empty($email)) {
        $error = 'bạn chưa nhập email';

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>đăng ký tk</title>
  <link rel="stylesheet" href="../css/dk.css">
</head>
<body>

<div class="all">
  <h2>đăng ký </h2>
   <p> <?php echo $error; ?></p>

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