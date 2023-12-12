<?php

$username_user = addslashes($_POST['login_user']);
$password_user = addslashes($_POST['password_user']);

require './admin/connect.php';

$sql = "select id_user, ten_user from users where username_user = '$username_user' and password_user = '$password_user'";
$result = mysqli_query($connect, $sql);

$number_row = mysqli_num_rows($result);


if ($number_row == 1) {

    $rows = mysqli_fetch_array($result);
    $id_user = $rows['id_user'];
    $ten_user = $rows['ten_user'];
    session_start();

    $_SESSION['id_user'] = $id_user;
    $_SESSION['username_user'] = $username_user;
    $_SESSION['ten_user'] = $ten_user;

    // condition remember password

    echo 
    '<script type="text/javascript">
        alert("Bạn đã đăng nhập thành công!");
        location="customer/index.php";
    </script>';
} else {
    echo 
    '<script type="text/javascript">
        alert("Tên tài khoản hoặc mật khẩu không đúng");
        location="login.php";
    </script>';
    exit;
}

// close connect
mysqli_close($connect);