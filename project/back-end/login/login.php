 <?php
session_start();
require_once '../crud_user/connection.php';
$error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)){
        $error = 'phải nhập thông tin ';
    }

    $result =mysqli_query($connection,"SELECT * FROM users WHERE username='$username' and password='$password'");
    $row = mysqli_fetch_assoc($result);
        if ($row){
            $_SESSION['success'] = 'đăng nhập thành công ';
            header("location: ../index.php");
            exit();
        }
        $error= 'tk/mk k đúng';




}
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../css/login.css">


</head>
<body>


<div id="wrapper">
    <form action="" id="form-login" method="post" enctype="multipart/form-data" >
        <h1 class="form-heading">nhập tài khoản </h1>
        <h3 style="color: red" >
            <p style="color: red">
                <?php echo $error; ?>
            </p>
        </h3>
        <div class="from-group">
            <i class="far fa-user"></i>
            <input type="text" class="form-input" name="username" placeholder="Tên đăng nhập " id="username">
        </div>

        <div class="from-group">
            <i class="fas fa-key"></i>
            <input type="password" class="form-input" name="password" placeholder="mật khẩu" id="password">
            <div id="eye">
                <i class="far fa-eye"></i>
            </div>
        </div>

        <input type="checkbox" name="remember" value="1"> Ghi nhớ đăng nhập
        <input type="submit" name="login" value="đăng nhập" class="from-submit" onclick="check()">
        <div>
            <h3>
                <a> quên tài khoản </a>
            </h3>
        </div>
        <div>
            <h3>bạn chưa có tài khoản ? đăng ký <a href="dk.php">tại đây</a></h3>
        </div>

    </form>

</div>
<script>
    var input = document.getElenemtById('username').value;
    function check(){
        if(input == '' || input== null){
            document.getElementById('')
        }
    }

</script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../js/login.js"></script>
</html>

