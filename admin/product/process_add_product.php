<?php

$name_product = addslashes($_POST['name_product']);
$desc_product = addslashes($_POST['desc_product']);
$price_product = addslashes($_POST['price_product']);
$type_product = addslashes($_POST['type_product']);
$number_product = addslashes($_POST['number_product']);
$id_producer = addslashes($_POST['id_producer']);
$img_product = $_FILES['img_product'];

$folder = '../../src/save_img_from_db/';

// Check if an image was uploaded
if ($img_product['error'] === 0) {
    $file_extension = pathinfo($img_product['name'], PATHINFO_EXTENSION);
    $file_img_name = time() . '.' . $file_extension;
    $file_path = $folder . $file_img_name;

    // Move the uploaded file to the destination folder
    if (move_uploaded_file($img_product['tmp_name'], $file_path)) {
        require '../connect.php';

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO product (name_product, desc_product, price_product, img_product, type_product, number_product, id_producer)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $name_product, $desc_product, $price_product, $file_img_name, $type_product, $number_product, $id_producer);
        
        if (mysqli_stmt_execute($stmt)) {
            // Close the statement and database connection
            mysqli_stmt_close($stmt);
            mysqli_close($connect);

            header('location: ../product.php');
            exit();
        } else {
            echo "Error inserting data: " . mysqli_error($connect);
        }
    } else {
        echo "Error uploading image.";
    }
} else {
    echo "No image uploaded.";
}

