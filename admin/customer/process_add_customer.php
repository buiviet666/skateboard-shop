<?php

$name_customer = addslashes($_POST['name_customer']);
$username_customer = addslashes($_POST['username_customer']);
$password_customer = addslashes($_POST['password_customer']);
$numberphone_customer = addslashes($_POST['numberphone_customer']);
$email_customer = addslashes($_POST['email_customer']);
$address_customer = addslashes($_POST['address_customer']);
$gender_customer = addslashes($_POST['gender_customer']);

require '../connect.php';

// insert to db
$sql = "insert into users (ten_user, gioitinh_user, username_user, password_user, phone_user, email_user, address_user, id_roles, token)
values ('$name_customer', '$gender_customer', '$username_customer', '$password_customer', '$numberphone_customer', '$email_customer', '$address_customer', '3','')";
mysqli_query($connect, $sql);

// close connect
mysqli_close($connect);
header('location: ../customer.php');

