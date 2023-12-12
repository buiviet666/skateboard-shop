<?php

$name_blog = addslashes($_POST['name_blog']);
$desc_blog = addslashes($_POST['desc_blog']);
$date_blog = addslashes($_POST['date_blog']);
$img_blog = $_FILES['img_blog'];

$folder = '../../src/save_img_from_db/';

// Check if an image was uploaded
if ($img_blog['error'] === 0) {
    $file_extension = pathinfo($img_blog['name'], PATHINFO_EXTENSION);
    $file_img_name = time() . '.' . $file_extension;
    $file_path = $folder . $file_img_name;

    // Move the uploaded file to the destination folder
    if (move_uploaded_file($img_blog['tmp_name'], $file_path)) {
        require '../connect.php';

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO blog (name_blog, desc_blog, date_blog, img_blog)
                VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name_blog, $desc_blog, $date_blog, $file_img_name);
        
        if (mysqli_stmt_execute($stmt)) {
            // Close the statement and database connection
            mysqli_stmt_close($stmt);
            mysqli_close($connect);

            header('location: ../blog.php');
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
