<?php
require_once 'connection.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id='';
}
$sql_chitiet = mysqli_query($connection,"SELECT * FROM category WHERE  id='$id'");

$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];


$users = '';
if (isset($_GET['search'])) {
    $name = $_GET['name'];
    //cách chống : lọc giá  trị từ form bằng hàm sau:
    $name = mysqli_real_escape_string($connection, $name);
// kết nối CSDL để tìm kiếm theo tên : SELECT
    $sql_select_all = "SELECT * FROM category WHERE name LIKE '%$name%'";
    $result_all = mysqli_query($connection, $sql_select_all);
    $users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);

//    echo '<pre>';
//    print_r($users);
//    echo '<pre>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>tìm kiếm sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/sanpham.css">


</head>
<body>
<header class="header">
    <div class="h-container container">
        <div class="row">
            <div class="logo">new Nike</div>
            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="sanpham.php">sản phẩm</a></li>
                    <li><a href="chitiet.php">chi tiết</a></li>
                    <li><a href="lienhe.php">liên hệ</a></li>
                    <li><a href="login.php">login</a></li>
                </ul>
            </div>
            <div class="giorhang">
                <a href="giohnag/giohang.php"><i class="fas fa-shopping-cart"><?php echo count($cart) ?></i></a>
            </div>
        </div>
    </div>
</header>
<h3 style="margin-left: 38%">sản phẩm bạn muốn tìm :</h3>
<div class="product-items" style="width: 100%;padding: 154px">
    <?php foreach ( $users AS $user):?>

        <div class="product-item">
            <img src="../../back-end/crud_user/upload/<?php echo $user['avatar']?>" height="150px"  >

            <div class="product-item-text">
                <p><span><?php echo $user['gia']?></span><sup>đ</sup></p>
                <h1 style="font-weight: bold; font-size: 18px" ><a href="chitiet.php?id=<?php echo $user['id']?>"><?php echo $user['name']?></a></h1>
            </div>
            <h1 style="font-weight: bold; font-size: 18px" ><a href="chitiet.php?id=<?php echo $user['id']?>">xem</a></h1>
            <br/>
            <a href="giohnag/cart.php?id=<?php echo $user['id']?>"> thêm vào giỏ hàng</a>
        </div>
    <?php endforeach;?>
</div>
<footer>
    <div>
        <div class="footer-widget">
            <div class="border2"></div>
            <br />
            <span class="copyright"><span class="left"><br>&copy; IT PLUST <a href="https://edu2review.com/danh-gia/trung-tam-dao-tao-itplus-academy">trung-tam-dao-tao-itplus-academy</a></span><span class="right"><br />
                <a href="https://www.facebook.com/profile.php?id=100023562201323"><i class="fab fa-facebook"></i>Nguyen Phuong Nam</a></span>
             <br>
            </span>
            <br />

        </div>
    </div>
</footer>
<script src="js/chitiet.js"></script>
</body>
</body>
</html>


<!--<h3> sản phầm bạn muốn tìm :</h3>-->
<!--<ul>-->
<!--    --><?php //foreach ( $users AS $row):
//        ?>
<!---->
<!--        <li>-->
<!--               <a href="index.php?quanly=sanpham&id=--><?php //echo $row['id']?><!--">-->
<!--                <img src="../../back-end/crud_user/upload/--><?php //echo $row['avatar']?><!--" height="150px" >-->
<!--                <p>tên sản phẩm : --><?php //echo $row['name']?><!--</p>-->
<!--                <p>gía sản phẩm : --><?php //echo $row['gia']?><!--</p>-->
<!--                <p>so luong sản phẩm : --><?php //echo $row['soluong']?><!--</p>-->
<!--            </a>-->
<!--        </li>-->
<!---->
<?php //endforeach; ?>
<!--</ul>-->
<!---->

