<?php

$id_employee = addslashes($_POST['id_employee']);
$name_employee = addslashes($_POST['name_employee']);
$username_employee = addslashes($_POST['username_employee']);
$password_employee = addslashes($_POST['password_employee']);
$numberphone_employee = addslashes($_POST['numberphone_employee']);
$email_employee = addslashes($_POST['email_employee']);
$address_employee = addslashes($_POST['address_employee']);
$gender_employee = addslashes($_POST['gender_employee']);

require '../connect.php';

// insert to db
$sql = "UPDATE users SET 
        ten_user = '$name_employee', 
        gioitinh_user = '$gender_employee', 
        username_user = '$username_employee', 
        password_user = '$password_employee', 
        phone_user = '$numberphone_employee', 
        email_user = '$email_employee', 
        address_user = '$address_employee', 
        id_roles = 2, 
        token = 'your_token' 
        WHERE id_user = $id_employee";
mysqli_query($connect, $sql);

// close connect
mysqli_close($connect);
header('location: ../employee.php');

