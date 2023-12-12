<?php

    $username_admin = addslashes($_POST['username_admin']);
    $password_admin = addslashes($_POST['password_admin']);

    require 'connect.php';

    $sql = "SELECT id_user, ten_user 
    FROM users
    WHERE username_user = '$username_admin' AND password_user = '$password_admin' AND id_roles = 1";

    $result = mysqli_query($connect, $sql);

    $number_row = mysqli_num_rows($result);

    if ($number_row == 1) {
        $rows = mysqli_fetch_array($result);
        $id_user = $rows['id_user'];
        $ten_user = $rows['ten_user'];

        session_start();
        $_SESSION['id_user'] = $id_user;
        $_SESSION['username_admin'] = $username_admin;
        $_SESSION['ten_admin'] = $ten_user;

        echo 
        '<script type="text/javascript">
            alert("Bạn đã đăng nhập thành công!");
            location="index.php";
        </script>';
    } else {
        echo 
        '<script type="text/javascript">
            alert("Tên tài khoản hoặc mật khẩu không đúng hoặc bạn không có quyền truy cập.");
            location="login.php";
        </script>';
        exit;
    }

    // close connect
    mysqli_close($connect);
