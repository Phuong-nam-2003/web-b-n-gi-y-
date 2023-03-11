
<?php
session_start();
require_once 'connection.php';
// - lấy id từ url: crud_user/update.php?id=1
// validate id hợp lệ : phải ồn tại tham số id và phải là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID k hợp lệ ';
    header('location: table-data-quanly-sanpham.php');
    exit();
}
$id = $_GET['id'];
// lấy ra user dựa theo id: SELECT 1 bản ghi
// B1 : viết truy vấn:
$sql_select_one = "SELECT * FROM category WHERE id = $id";
//B2 thự thi : SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
//B3 trả về mảng kết hợp 1 chiều :
$user = mysqli_fetch_assoc($result_one);
//B2 :
$error = '';
//B3 :


if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $avatar = $_FILES['avatar'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];

    if (empty($name)){
        $error = 'tên, giá , số lượng phải nhập  ';

    }elseif (strlen($name)<2){
        $error = 'tuổi phải trên 2 ký tự';

    }elseif ($avatar['error']==0) {
        $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $allowed = ['jpeg' , 'jpg', 'png', 'gif'];
        if (!in_array($extension, $allowed)) {
            $error = 'avata phải là ảnh';
        }
        $size_b = $avatar['size'];
        $size_mb = $size_b / 1204 / 1204;
        if ($size_mb > 2) {
            $error = ' dung lượng k file k đc quá 2mb';
        } elseif (!is_numeric($gia)) {
            $error = ' giá phải là só ';
        }elseif (!is_numeric($soluong)){
            $error= 'số lượng phải là số';
        }









        //B6 xử lý prom chính
        if (empty($error)) {
            //+ upload file lên hệ thống nếu có
            // nếu k tải file đè thì lưu file hiện tại
            $filename = $user['avatar'];
            if ($avatar['error'] == 0) {

                $dir_upload = 'upload';
                if (!file_exists($dir_upload)) {
                    mkdir($dir_upload);
                }
                // xóa file cũ để chánh nặng hệ thống
                unlink("$dir_upload/$filename");
                $filename = time() . "-". $avatar['name'];
                move_uploaded_file($avatar['tmp_name'], "$dir_upload/$filename");
            }

            // kết nối csdl để indert vào Db
            //+ B1 viết câu truy vấn
            $sql_update = "UPDATE category SET name ='$name', avatar = '$filename', gia = '$gia', soluong = '$soluong' WHERE id=$id";
            //B2:
            $is_update = mysqli_query($connection, $sql_update);
           // var_dump($is_update);
            if ($is_update){
                $_SESSION['success'] = 'update thành công ';
                header( 'location: table-data-quanly-sanpham.php');
                exit();
            }
            $error = 'câp nhập thất bại ';

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> update</title>
    <link rel="stylesheet" href="../css/update.css">
</head>

<footer>
    <h2>sửa thông tin sản phẩm </h2>
<div class="ti">
<h3 style="color: red"><?php echo $error; ?></h3>


<form style=" display: grid; margin-inline: 31%; " action="" method="post" enctype="multipart/form-data">

    nhập tên:
    <input type="text" value="<?php echo $user['name'] ?>" name="name">
    <br>

    chọn ảnh :
    <input type="file" name="avatar"><br>
    <img height="60" src="upload/<?php echo $user['avatar'] ?>"/>
    <br>
    nhập giá:
    <input type="text" value="<?php echo $user['gia'] ?>" name="gia"><br>
    nhập số lượng:
    <input type="text" value="<?php echo $user['soluong'] ?>" name="soluong"><br>
    <input type="submit" name="submit" value="lưu user">
    <br>
   <h3> <a href="table-data-quanly-sanpham.php">về trang danh sách</a></h3>
</form>
</div>
</footer>
</html>