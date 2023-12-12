<?php

    session_start();
    $id_product = $_GET['id'];

    // xóa đi sản phẩm giỏ hàng bằng cách xóa id của nó
    unset($_SESSION['cart'][$id_product]);

    // quay lại giỏ hàng 
    header('location: cart.php');