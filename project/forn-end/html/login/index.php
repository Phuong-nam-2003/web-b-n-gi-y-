<?php
//profile.php
session_start();
require_once '../connection.php';
$error = '';
// - Cần check nếu login thành công thì mới cho truy cập trang này
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = 'Bạn chưa đăng nhập';
    header('Location: login.php');
    exit();
}

//Session flash
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

?>
<link rel="stylesheet" href="../css/dagxuat.css">
<div>
    <form>


        <?php

        echo "<br>Chào bạn: " . $_SESSION['username'];
        echo "<br>";
        echo "bạn đã đăng nhập thành công";
        ?>
        <h4> quay lại <a href="../home.php"> trang chủ</a></h4>
        <?php
        echo "hoặc bạn muốn <a href='dagxuat.php'>Logout</a>";

        ?>
    </form>
</div>
