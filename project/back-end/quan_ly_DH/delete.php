<?php
session_start();
require_once '../crud_user/connection.php';
// - lấy id từ url: crud_user/delete.php?id=1
// validate id hợp lệ : phải ồn tại tham số id và phải là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID k hợp lệ ';
    header('location: table.php');
    exit();
}
$id_sanpham = $_GET['id_sanpham'];
// truy vấn CSDL để xóa user theo id: SOFT DELETE
//B1
$sql_delete = "DELETE FROM orders_detail WHERE `id_sanpham` $id_sanpham";
//B2
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete){
    $_SESSION['success'] = ' xóa thành công';
    header('location: table.php');
    exit();
}else {
    $_SESSION['error']= ' xóa thất bại ';
    header('location: table.php');
    exit();
}

?>
