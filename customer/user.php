<?php 
    session_start();

    $id_user = $_GET['id'];

    require 'connect.php';

    $sql_id_user = "select * from users where id_user = '$id_user'";
    $result_id_user = mysqli_query($connect, $sql_id_user);
    $each_user = mysqli_fetch_array($result_id_user);

    $sql_donhang = "select * from donhang where id_user = '$id_user'";
    $result_donhang = mysqli_query($connect, $sql_donhang);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/userpage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/src/css/tabledata.css">
    <title>Document</title>
</head>
<body>

    <main class="profile" style="width: 50% !important; border-bottom: none !important;">
        <div class="profile-bg"></div>
        <section class="container">
            <aside class="profile-image">
                <a class="camera" href="#">
                    <i class="fas fa-camera"></i>
                </a>
            </aside>
            <section class="profile-info">
                <h1 class="first-name">
                    <?php echo $each_user['ten_user'] ?>
                </h1>
                <!-- <h1 class="second-name">Yun He</h1> -->
                <h2>ABOUT</h2>
                <p>
                    hello hello I'm a artist and developer 🌼 happy to be here! 🌿 let's code the best we can!
                </p>

                <aside class="social-media-icons">
                    <a href="" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" target="_blank">
                        <i class="fab fa-codepen"></i>
                    </a>
                    <a href="" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="" target="_blank">
                        <i class="fab fa-medium"></i>
                    </a>
                </aside>
            </section>
        </section>
        <section class="statistics">
            <button class="icon arrow left"></button>
            <button class="icon arrow right"></button>
            <p><strong>29</strong> Followers</p>
            <p><strong>184</strong> Following</p>
            <p><strong>6</strong> Likes</p>
        </section>
        <button class="icon close"></button>
    </main>

    <div class="table_data" style="width: 50% !important;">
        <table class="table_data_main" style="width: 50% !important;min-width: unset !important;">
            <thead class="table_data_tittle">
                <tr>
                    <th>id đơn hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Số lượng sản phẩm</th>
                </tr>
            </thead>
            <tbody class="table_data_content">
                
                <?php foreach ($result_donhang as $each_donhang) { ?>
                
                <tr>
                    <td>
                        <?php echo $each_donhang['id_donhang']; ?>
                    </td>
                    <td>
                        <?php echo $each_donhang['address_donhang']; ?>
                    </td>
                    <td>
                        <?php echo $each_donhang['phone_donhang']; ?>
                    </td>
                    <td>
                        <?php echo $each_donhang['email_donhang']; ?>
                    </td>
                    <td>
                        <?php echo $each_donhang['trangthai_donhang']; ?>
                    </td>
                    <td>
                        <?php echo $each_donhang['soluong_sanpham']; ?>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
        <a href="index.php">quay lại cửa hàng</a>
    </div>

</body>
</html>