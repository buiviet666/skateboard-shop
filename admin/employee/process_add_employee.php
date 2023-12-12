<?php

$name_employee = addslashes($_POST['name_employee']);
$username_employee = addslashes($_POST['username_employee']);
$password_employee = addslashes($_POST['password_employee']);
$numberphone_employee = addslashes($_POST['numberphone_employee']);
$email_employee = addslashes($_POST['email_employee']);
$address_employee = addslashes($_POST['address_employee']);
$gender_employee = addslashes($_POST['gender_employee']);

require '../connect.php';

// insert to db
$sql = "insert into users (ten_user, gioitinh_user, username_user, password_user, phone_user, email_user, address_user, id_roles, token)
values ('$name_employee', '$gender_employee', '$username_employee', '$password_employee', '$numberphone_employee', '$email_employee', '$address_employee', '2','')";
mysqli_query($connect, $sql);

// close connect
mysqli_close($connect);
header('location: ../employee.php');

