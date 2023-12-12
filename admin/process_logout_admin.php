<?php

require 'connect.php';
session_start();

$id_user = $_SESSION['id_user'];

$sql = "update users set token = NULL where id_user = '$id_user'";
$result = mysqli_query($connect, $sql);
mysqli_close($connect);

unset($_SESSION['id_user']);
unset($_SESSION['username_user']);
unset($_SESSION['name_user']);
unset($_SESSION['phone_user']);
unset($_SESSION['email_user']);

header('location:login.php');
