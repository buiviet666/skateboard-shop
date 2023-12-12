<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_blog = $_POST['id_blog'];
    $name_blog = $_POST['name_blog'];
    $desc_blog = $_POST['desc_blog'];
    $date_blog = $_POST['date_blog'];

    // Không kiểm tra lỗi khi tải ảnh lên, chỉ tạo tên tệp mới
    $file_img_name = '';

    if (!empty($_FILES['img_blog']['name'])) {
        $folder = '../../src/save_img_from_db/';
        $file_extension = pathinfo($_FILES['img_blog']['name'], PATHINFO_EXTENSION);
        $file_img_name = time() . '.' . $file_extension;
        $file_path = $folder . $file_img_name;

        // Di chuyển tệp tải lên đến thư mục đích
        if (move_uploaded_file($_FILES['img_blog']['tmp_name'], $file_path)) {
            // Xóa ảnh cũ nếu bạn muốn
            // Ví dụ: unlink('../../src/save_img_from_db/' . $old_img_product);

            // Tiến hành cập nhật cơ sở dữ liệu
            require '../connect.php'; // Kết nối đến cơ sở dữ liệu, thay thế bằng thông tin đăng nhập của bạn

            // Sử dụng prepared statements để tránh SQL injection
            $sql = "UPDATE blog
            SET name_blog = ?, desc_blog = ?, date_blog = ?, img_blog = ?
            WHERE id_blog = ?";
            $stmt = mysqli_prepare($connect, $sql);
            mysqli_stmt_bind_param($stmt, "ssssi", $name_blog, $desc_blog, $date_blog, $file_img_name, $id_blog);

            if (mysqli_stmt_execute($stmt)) {
                // Đóng statement và kết nối cơ sở dữ liệu
                mysqli_stmt_close($stmt);
                mysqli_close($connect);

                header('location: ../blog.php'); // Chuyển hướng sau khi cập nhật thành công
                exit();
            } else {
                echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($connect);
            }
        } else {
            echo "Lỗi khi tải ảnh lên.";
        }
    } else {
        // Không có ảnh mới được tải lên, chỉ cập nhật dữ liệu khác
        require '../connect.php'; // Kết nối đến cơ sở dữ liệu, thay thế bằng thông tin đăng nhập của bạn

        // Sử dụng prepared statements để tránh SQL injection
        $sql = "UPDATE blog
            SET name_blog = ?, desc_blog = ?, date_blog = ?
            WHERE id_blog = ?";
            $stmt = mysqli_prepare($connect, $sql);
            mysqli_stmt_bind_param($stmt, "sssi", $name_blog, $desc_blog, $date_blog, $id_blog);

        if (mysqli_stmt_execute($stmt)) {
            // Đóng statement và kết nối cơ sở dữ liệu
            mysqli_stmt_close($stmt);
            mysqli_close($connect);

            header('location: ../blog.php'); // Chuyển hướng sau khi cập nhật thành công
            exit();
        } else {
            echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($connect);
        }
    }
}
