<?php
session_start();

if (isset($_POST))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/giohang.css">

</head>
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
        <a href="giohang.html"><i class="fas fa-shopping-cart"></i></a>
      </div>
    </div>
  </div>
</header>

<section class="cart">
  <h2>Cart</h2>
  <form>
    <table>
      <thead>
      <tr>
        <th>sản phẩm</th>
        <th>giá</th>
        <th>sl</th>
        <th>chọn</th>
      </tr>
      </thead>
    </table>
    <div style="text-align: right;" class="price-total">
      <p style="font-weight: bold;">Tổng tiền:<span>0</span><sup>đ</sup></p>
    </div>
    <button><a href="thanh_toan.php">mua hàng</a></button>


</form>
 </section>
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

  </body>
 </html>