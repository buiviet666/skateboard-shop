<?php
    session_start();

    if (isset($_SESSION['id_user']) && $_SESSION['id_user']) {
        header('location: customer/index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/nomalize.css">
    <link rel='stylesheet' type='text/css' href='src/css/style.css'/>
    <link rel="stylesheet" href="src/css/media.css">
    <link rel="stylesheet" href="src/css/inpage.css">
    <title>Skateboard life</title>
    <link rel="shortcut icon" href="./src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.17/fullpage.css" integrity="sha512-hcCQQPp7EFTf6BXS6aGe9vk02E5YZzjaI4K1KsAUUjm6WvfvSPKFn4jJiYMiQ68NRl/I6SEl33gW+NVeqZI15g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>

    <div id = "main">
        <?php include "component_sidebar_left.php" ?>    

        <div class = "main_right_content">
            <div class = "right_content_position">
                <!-- main content -->
                <div class="inpage">
                    <h3>Login In</h3>
                    <div class="inpage_container">
                        <form class="inpage_form" action="process_login.php" method="post" onsubmit="return validateFormLogin()">
                            <input type="text" placeholder="Username" name="login_user" id="username">
                            <input type="password" placeholder="Password" name="password_user" id="password">

                            <a class="inpage_link" href="#">Forgot your password?</a>
                            
                            <p>
                                <input class="btn_inpage" type="submit" value="Login">
                            </p>

                            <a class="inpage_link" href="signin.php">Đăng ký tài khoản</a>
                            <a class="back_next" href="index.php">trở lại trang chủ</a>
                        </form>
                    </div>
                </div>

                <!-- footer content -->
                <?php include "component_footer.php" ?>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.17/fullpage.min.js" integrity="sha512-zAHJKGyoPf2Y20Wi4uo32sa/vSvwKfY4tYUt6gJfmkA79X0wt5ZfaxL5GqJ5cMnmvGslWi5PKTo51rHRZqYbJg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="src/javascript/index.js"></script>
    <script src="src/javascript/validation.js"></script>
</body>
</html> 