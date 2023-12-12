<?php
    session_start();
    if (isset($_SESSION['id_user']) && $_SESSION['id_user']) {
        header('location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/admincss.css">
    <link rel="stylesheet" href="../src/css/nomalize.css">
    <title>Dashboard admin</title>
</head>
<body>
    
    <div class="login" onclick="onclick">
        <div class="login_top"></div>
        <div class="login_bottom"></div>
        <div class="login_center">
            <form action="process_login_admin.php" method="post">
                <h2>Please Log In</h2>
                <input type="text" placeholder="Username" name="username_admin"/>
                <input type="password" placeholder="password" name="password_admin"/>
                <input type="submit" value="Login">
                <a href="../index.php">Trở về cửa hàng</a>
            </form>
        </div>
    </div>

</body>
</html>