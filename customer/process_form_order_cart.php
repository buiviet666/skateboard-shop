<?php

session_start();

$name_receiver = addslashes($_POST['name']);
$phone_receiver = addslashes($_POST['phonenumber']);
$address_receiver = addslashes($_POST['address']);
$email_receiver = addslashes($_POST['contact']);
$id_user = $_SESSION['id_user'];

require 'connect.php';
$cart = $_SESSION['cart'];

$total_price = 0;
$total_product = 0;

foreach ($cart as $each) {
	$total_price += $each['quantity'] * $each['price_product'];
    $total_product += $each['quantity'];
}
$status = 'Đang xử lý';

$query_1 = "insert into donhang (id_donhang, address_donhang, phone_donhang, email_donhang, trangthai_donhang, soluong_sanpham, id_user) 
values ('', '$address_receiver', '$phone_receiver', '$email_receiver', '$status', '$total_product', '$id_user');";
mysqli_query($connect,$query_1);

$query_2 = "select max(id_donhang) from donhang where id_user = '$id_user'";
$result = mysqli_query($connect,$query_2);
$id_order = mysqli_fetch_array($result)['max(id_donhang)'];

$query3 = "insert into hoadon (id_donhang,tongtien) 
values ('$id_order','$total_price');";
mysqli_query($connect,$query3);

mysqli_close($connect);
unset($_SESSION['cart']);
header('location: index.php');