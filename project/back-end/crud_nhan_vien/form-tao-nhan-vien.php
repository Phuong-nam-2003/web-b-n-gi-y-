<?php
session_start();
?>
<?php
require_once '../crud_user/connection.php';

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
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

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Thêm nhân viên | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body class="app sidebar-mini rtl">
  <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="../login/dagxuat.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../img/â.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Admin</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">


      <li><a class="app-menu__item active" href="table-nhan-vien.php"><i class='app-menu__icon bx bx-id-card'></i>
          <span class="app-menu__label">Quản lý nhân viên</span></a></li>

      <li><a class="app-menu__item" href="../crud_user/table-data-quanly-sanpham.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
        <li><a class="app-menu__item" href="../index.php"><i
                        class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Admin </span></a>
        </li>


    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách nhân viên</li>
      </ul>
    </div>
    <div class="row">
      <formf class="col-md-12">

        <div class="tile">


          <h3 class="tile-title">Tạo mới nhân viên</h3>
          <div class="tile-body">
            <div class="row element-button">


                <form class="row" action="" method="post" enctype="multipart/form-data" >
                <p style="color: red">
                    <?php echo $error; ?>
                </p>
              <div class="form-group col-md-4">
                <label class="control-label">name</label>
                <input class="form-control" type="text" name="name" >

              </div>
                <div class="form-group col-md-4">
                    <label class="control-label">username</label>
                    <input class="form-control" type="text" name="username">
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">pass</label>
                    <input class="form-control" type="password" name="password" >
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">mobile</label>
                    <input class="form-control" type="text" name="mobile" >
                </div>
              <div class="form-group col-md-4">
                <label class="control-label">Địa chỉ email</label>
                <input class="form-control" type="email"  name="email">
              </div>
            </div>
          </div>
                    <input class="btn btn-save" type="submit" name="submit" value="lưu lại">
                    <a class="btn btn-cancel" href="table-nhan-vien.php">Hủy bỏ</a>
            </form>
        </div>
      </formf>

    </div>

      </div>

  </main>





  <!-- Essential javascripts for application to work-->
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="../js/plugins/pace.min.js"></script>

</body>

</html>