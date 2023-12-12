<?php

$id_customer = addslashes($_POST['id_customer']);
$name_customer = addslashes($_POST['name_customer']);
$username_customer = addslashes($_POST['username_customer']);
$password_customer = addslashes($_POST['password_customer']);
$numberphone_customer = addslashes($_POST['numberphone_customer']);
$email_customer = addslashes($_POST['email_customer']);
$address_customer = addslashes($_POST['address_customer']);
$gender_customer = addslashes($_POST['gender_customer']);

require '../connect.php';

// insert to db
$sql = "UPDATE users SET 
        ten_user = '$name_customer', 
        gioitinh_user = '$gender_customer', 
        username_user = '$username_customer', 
        password_user = '$password_customer', 
        phone_user = '$numberphone_customer', 
        email_user = '$email_customer', 
        address_user = '$address_customer', 
        id_roles = 3, 
        token = 'your_token' 
        WHERE id_user = $id_customer";
mysqli_query($connect, $sql);

// close connect
mysqli_close($connect);
header('location: ../customer.php');

