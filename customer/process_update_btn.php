<?php

// if(empty($_SESSION['id'])) {
//         // nếu mà chưa đăng nhập sẽ bị đẩy về phần đăng nhập
//     header('location: ../login_register.php?not_exists_signin');
// }

// if(empty($_GET['id'])) {
//         // nếu mà chưa đăng nhập sẽ bị đẩy về phần đăng nhập
//     header('location:cart.php?error_update_quantity');
// }

$id_product = $_GET['id'];
$type_product = $_GET['type'];

session_start();

require 'connect.php';

$sql = "select * from product
where id_product = '$id_product'";

$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

// if (empty($each['id'])) {
//     header('location:cart.php?error_update_quantity');
// }

if($type_product === 'decrease') {
    if($_SESSION['cart'][$id_product]['quantity'] > 1) {
        $_SESSION['cart'][$id_product]['quantity']--;
    } else {
        unset($_SESSION['cart'][$id_product]);
    }
} else {
    $_SESSION['cart'][$id_product]['quantity']++;
}

header('location: cart.php');