<?php

$id_donhang = addslashes($_POST['id_donhang']);
// $id_user = addslashes($_POST['id_user']);
// $ten_user = addslashes($_POST['ten_user']);
// $address_donhang = addslashes($_POST['address_donhang']);
// $phone_donhang = addslashes($_POST['phone_donhang']);
// $email_donhang = addslashes($_POST['email_donhang']);
// $soluong_sanpham = addslashes($_POST['soluong_sanpham']);
$trangthai_donhang = addslashes($_POST['trangthai_donhang']);

require '../connect.php';

// insert to db
$sql = "UPDATE donhang set trangthai_donhang = '$trangthai_donhang' where id_donhang = '$id_donhang'";
mysqli_query($connect, $sql);

// close connect
mysqli_close($connect);
header('location: ../order.php');

