<?php
session_start();
require_once 'connection.php';

$sql_select_all = "SELECT * FROM category  ";
$resut_all = mysqli_query($connection, $sql_select_all);
$category = mysqli_fetch_all($resut_all, MYSQLI_ASSOC);

$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sản phầm mới</title>

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

          <li><a href="lienhe.php">liên hệ</a></li>
          <li><a href="login/login.php">login</a></li>
        </ul>
      </div>
      <div class="giorhang">
        <a href="giohnag/giohang.php"><i class="fas fa-shopping-cart"><?php echo count($cart) ?></i></a>
      </div>
    </div>
  </div>
</header>


<form class="sanf"  action="seach.php" method="get">
  <div class="sera"  >
    tìm kiếm <i class="fas fa-search"></i>
    <input type="text" name="name" >
      <input type="submit" name="search" value="tìm kiếm">
  </div>


  <section class="product">
    <div class="container" >
      <div class="product-items">
          <?php foreach ( $category AS $user):?>
      <div class="product-item">
          <img src="../../back-end/crud_user/upload/<?php echo $user['avatar']?>" height="150px" >

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

      <div class="product-items">
        <div class="product-item">
          <img width="100%" src="img2/nile%20air%20force%20one%20tooling%20low.jpg" alt="">
          <div class="product-item-text">
            <p><span>20.000</span><sup>đ</sup></p>
              <br>
            <h1 style="font-weight: bold; font-size: 18px"> nile force one tooling low</h1>
          </div>
          <a href="giohnag/giohang.php">mua hàng</a>
          <button class="but-click">Thêm vào giỏ hàng</button>
        </div>
        <div class="product-item">
          <img width="100%" src="img2/Nike%20ZoomX%20VaporFly.jpg" alt="">
          <div class="product-item-text">
            <p><span>20.000</span> <sup>đ</sup></p>
            <h1 style="font-weight: bold; font-size: 18px">Nike ZoomX VaporFly</h1>
          </div>
         <a href="giohnag/giohang.php">mua hàng</a>
          <button class="but-click">Thêm vào giỏ hàng</button>
        </div>
        <div class="product-item">
          <img src="img2/nike%20trắng%20f95.jpg" alt="">
          <div class="product-item-text">
            <p><span>30.000</span><sup>đ</sup></p>
            <h1 style="font-weight: bold; font-size: 18px">nike trắng f95</h1>
          </div>
         <a href="giohnag/giohang.php">mua hàng</a>
          <button class="but-click">Thêm vào giỏ hàng</button>
        </div>
        <div class="product-item">
          <img src="img2/nike%20SB%20Dunk.jpg" alt="">
          <div class="product-item-text">
            <p><span>10.000</span><sup>đ</sup></p>
            <h1 style="font-weight: bold; font-size: 18px">nike SB Dunk</h1>
          </div>
         <a href="giohnag/giohang.php">mua hàng</a>
          <button class="but-click">Thêm vào giỏ hàng</button>
        </div>
        <div class="product-item">
          <img src="img2/nike%20revolution.jpg" alt="">
          <div class="product-item-text">
            <p><span>30.000</span><sup>đ</sup></p>
            <h1 style="font-weight: bold; font-size: 18px">nike revolution</h1>
          </div>
        <a href="giohnag/giohang.php">mua hàng</a>
          <button class="but-click">Thêm vào giỏ hàng</button>
        </div>
      </div>
    </div>
  </section>
</form>
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
<script src="js/sp_gh.js"></script>
</body>
</html>