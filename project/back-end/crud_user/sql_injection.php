<!--lỗi bảo mật SQL injection:
-lối bảo mật tấn công vào câu truy vấn bằng cách thay đổi câu truy vấn gốc , thường tấn công qua form
- Demo thông qua chức năng tìm theo tên user
-->
<?php
session_start();
require_once 'connection.php';
if (isset($_POST['search'])) {
    $name = $_POST['name'];
    // cách chống : lọc giá  trị từ form bằng hàm sau:
    $name = mysqli_real_escape_string($connection, $name);
    // kết nối CSDL để tìm kiếm theo tên : SELECT
    $sql_select_all = "SELECT * FROM category WHERE name LIKE '%$name%'";
    var_dump($sql_select_all);
    $result_all = mysqli_query($connection, $sql_select_all);
    $users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);

        // 123456' OR name != '
}
?>
<form method="post" action="">
    tìm theo tên :
    <input type="text" name="name">
    <br>
    <input type="submit" name="search" value="tìm kiếm">
</form>

