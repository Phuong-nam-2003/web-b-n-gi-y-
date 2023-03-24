<?php
session_start();
require_once '../connection.php';
$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];

$error = '';
if (isset($_POST['name'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];

    if (empty($name)) {
        $error = 'bạn chưa nhập tên';
    } elseif (empty($email)) {
        $error = 'bạn chưa nhập email';
    }elseif (empty($phone)) {
        $error = 'bạn chưa nhập mobile';
    } elseif (!is_numeric($phone)) {
        $error = 'mobile phải là số ';
    }elseif (empty($diachi)){
        $error = 'địa chỉ phải nhập';
    }

    if (empty($error)){
        $error = '';

    $query = mysqli_query($connection, "INSERT INTO orders(name,phone,email,diachi) VALUES (	'$name','$phone','$email','$diachi')" );
    if ($query){
        $id_order = mysqli_insert_id($connection);
        foreach ($cart AS $value){
            mysqli_query($connection,"INSERT INTO orders_detail (id_order, id_sanpham, name, quantity, gia) VALUES ('$id_order', '$value[id]', '$value[name]','$value[quantity]', '$value[gia]')");
              }
        unset($_SESSION['cart']);
        header('location: thansk.php');
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>mua hàng </title>
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/thanh_toan.css">

</head>
<body>
<header class="header">
  <div class="h-container container">
    <div class="row">
      <div class="logo">new Nike</div>
      <div class="menu">
        <ul>
          <li><a href="../home.php">Home</a></li>
          <li><a href="../sanpham.php">sản phẩm</a></li>
          <li><a href="../lienhe.php">liên hệ</a></li>
          <li><a href="../login/login.php">login</a></li>


        </ul>
      </div>
      <div class="giorhang">
        <a href="giohang.php"><i class="fas fa-shopping-cart"><?php echo count($cart) ?></i></a>
      </div>
    </div>
  </div>
</header>


<form method="post">
    <div class="tot" >
        <div class="a">
            <h2> thông tin người mua</h2>

            <form>
<p style="  margin-left: 29%;"><?php echo $error;?></p>
                <div class="form-group">
                    <label for="exampleInputEmail1"> name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="" name="name">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" value="" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value="" name="phone">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">địa chỉ</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="diachi">
                </div>


            </form>

        </div>
        <div class="b">
            <section class="cart">
                <h2>Cart</h2>

                <table>

                    <thead>
                    <tr>

                        <th>sản phẩm</th>
                        <th>tên</th>
                        <th>giá</th>
                        <th>số lượng</th>
                        <th>thanh tiền</th>
                        <th></th>
                    </tr>

                    <?php
                    $total = 0;
                    ?>
                    <?php foreach ($cart AS $value):?>
                    <tr>
                        <?php $total += $value['gia'] * $value['quantity'];
                        //           echo '<pre>';
                        //          print_r($total);
                        //          echo '<pre>';
                        ?>

                        <td><img src="../../../back-end/crud_user/upload/<?php echo $value['avatar']?>" height="100px"></td>
                        <td><?php echo $value['name']?></td>
                        <td><?php echo $value['gia']?></td>

                        <form action="cart.php">
                            <td>
                                <input style="width: 15%;" type="text" name="quantity" value="<?php echo $value['quantity']?>">
                            </td>
                        </form>
                        <td><?php echo  number_format( $value['gia'] * $value['quantity'] )?></td>

                        <?php endforeach;?>
                    </thead>
                </table>

                <div style="text-align: right;" class="price-total">
                    <p style="font-weight: bold;">Tổng tiền:<span><?php echo $total  ?></span><sup>đ</sup></p>
                </div>
            </section>
            <button type="submit" class="btn btn-primary">mua hàng</button>
        </div>
    </div>

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
</body>
</html>