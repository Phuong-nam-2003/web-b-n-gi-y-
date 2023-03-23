<?php
session_start();
$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>thông tin liên hệ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/lienhe.css">

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
<article id="ar">
    <div class="ss">
    <h3>Địa chỉ:ITPlus Academy CS2, Đường Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội </h3>
    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8192682561694!2d105.77148692450167!3d21.039916341188558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134557c8673b5e1%3A0x91b58d4f9f1af94e!2sITPlus%20Academy%20CS2!5e0!3m2!1svi!2s!4v1667418471616!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <br />

    </div>
</article>

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