<?php 

// if(empty($_SESSION['id_user'])) {
//     header('location: ../login.php?not_exists_login');
// }
session_start();

$id_product_each = $_GET['id'];
$type_product_each = $_GET['type'];

if ($type_product_each === 'add') {
    // nếu chưa có sản phẩm nào thì add thêm
    if (empty($_SESSION['cart'][$id_product_each])) {
        require 'connect.php';
        
        $sql_product = "select * from product where id_product = '$id_product_each'";
        $result_sql_product = mysqli_query($connect, $sql_product);
        $each_product = mysqli_fetch_array($result_sql_product);

        $_SESSION['cart'][$id_product_each]['name_product'] = $each_product['name_product'];
        $_SESSION['cart'][$id_product_each]['desc_product'] = $each_product['desc_product'];
        $_SESSION['cart'][$id_product_each]['img_product'] = $each_product['img_product'];
        $_SESSION['cart'][$id_product_each]['price_product'] = $each_product['price_product'];
        $_SESSION['cart'][$id_product_each]['quantity'] = 1;

    // nếu có rồi thì +1
    } else {
        $_SESSION['cart'][$id_product_each]['quantity']++;
    }
    header('location: cart.php');
} else if ($type_product_each === 'buy') {

}