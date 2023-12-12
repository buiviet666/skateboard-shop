<?php 
    $user_name = addslashes($_POST['name_user']);
    $username_user = addslashes($_POST['login_user']);
    $password_user = addslashes($_POST['password_user']);
    $phone_user = addslashes($_POST['phone_user']);
    $email_user = addslashes($_POST['email_user']);

    // Kết nối CSDL
    require './admin/connect.php';

    // Kiểm tra xem username hoặc email đã tồn tại
    $checkExisting = "SELECT * FROM users WHERE username_user='$username_user' OR email_user='$email_user'";
    $existingResult = mysqli_query($connect, $checkExisting);

    if (mysqli_num_rows($existingResult) > 0) {
        echo '<script type="text/javascript">alert("Tên người dùng hoặc địa chỉ email đã tồn tại!"); history.go(-1);</script>';
    } else {
        // Chèn dữ liệu vào CSDL
        $sql = "INSERT INTO users (ten_user, gioitinh_user, username_user, password_user, phone_user, email_user, address_user, id_roles, token)
                VALUES ('$user_name', '', '$username_user', '$password_user', '$phone_user', '$email_user', '', '3','')";
        mysqli_query($connect, $sql);

        // Lấy ID của người dùng vừa chèn
        $id_user = mysqli_insert_id($connect);

        // Tạo session
        session_start();
        $_SESSION['id_user'] = $id_user;
        $_SESSION['name_user'] = $user_name;
        $_SESSION['username_user'] = $username_user;
        $_SESSION['phone_user'] = $phone_user;
        $_SESSION['email_user'] = $email_user;

        echo '<script type="text/javascript">alert("Bạn đã đăng ký thành công!"); location="customer/index.php";</script>';
    }

    // Đóng kết nối CSDL
    mysqli_close($connect);
?>
