<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_blog = $_GET['id'];

    // Kết nối đến cơ sở dữ liệu (thay thế thông tin đăng nhập của bạn)
    require '../connect.php';

    // Thực hiện truy vấn xóa sản phẩm
    $sql = "DELETE FROM blog WHERE id_blog = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_blog);

    if (mysqli_stmt_execute($stmt)) {
        // Đóng statement và kết nối cơ sở dữ liệu
        mysqli_stmt_close($stmt);
        mysqli_close($connect);

        header('location: ../blog.php'); // Chuyển hướng sau khi cập nhật thành công
        exit();
    } else {
        echo "Lỗi khi xóa blog: " . mysqli_error($connect);
    }
}
?>
