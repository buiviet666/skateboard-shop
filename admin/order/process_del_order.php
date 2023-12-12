<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_order = $_GET['id'];

    // Kết nối đến cơ sở dữ liệu (thay thế thông tin đăng nhập của bạn)
    require '../connect.php';

    // Thực hiện truy vấn xóa sản phẩm
    $sql = "DELETE FROM donhang WHERE id_donhang = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id_order);

    if (mysqli_stmt_execute($stmt)) {
        // Đóng statement và kết nối cơ sở dữ liệu
        mysqli_stmt_close($stmt);
        mysqli_close($connect);

        // Chuyển hướng trở lại trang danh sách sản phẩm sau khi xóa thành công
        header('location: ../order.php'); // Chuyển hướng sau khi cập nhật thành công
        exit();
    } else {
        echo "Lỗi khi xóa đơn hàng: " . mysqli_error($connect);
    }
}
?>
