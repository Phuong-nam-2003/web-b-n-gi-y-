<?php
session_start();
require_once '../crud_user/connection.php';
// - lấy id từ url: crud_user/delete.php?id=1
// validate id hợp lệ : phải ồn tại tham số id và phải là số
if (!isset($_GET['id_order']) || !is_numeric($_GET['id_order'])) {
    $_SESSION['error'] = 'ID k hợp lệ ';
    header('location: table.php');
    exit();
}
$id_order = $_GET['id_order'];
// truy vấn CSDL để xóa user theo id: SOFT DELETE
//B1
$sql_delete = "DELETE FROM orders_detail WHERE id_order = $id_order";
//B2
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete){
    $_SESSION['success'] = 'xóa thành công';
    header('location: table.php');
    exit();
}else {
    $_SESSION['error'] = ' xóa thất bại ';
    header('location: table.php');
    exit();


    $id = $_GET['id'];
// truy vấn CSDL để xóa user theo id: SOFT DELETE
//B1
    $sql_delet = "DELETE FROM orders WHERE id = $id";
//B2
    $is_delet = mysqli_query($connection, $sql_delet);
    if ($is_delet) {
        $_SESSION['success'] = 'xóa thành công';
        header('location: table.php');
        exit();
    } else {
        $_SESSION['error'] = ' xóa thất bại ';
        header('location: table.php');
        exit();
    }
}
?>
