<div class="main_left_sidebar">
    <header class="left_sidebar_position">
        <div class="header_sticky">
            <!-- header logo icon -->
            <div class = "header_top">
                <!-- p1 login signup -->
                <div class="header_login_signup">
                    <ul>
                        <li class = "register" style="color: #fff">
                            hi <a href = "user.php?id=<?php echo $_SESSION['id_user'] ?>">
                                <?php
                                    echo $_SESSION['ten_user'];
                                ?>
                                </a>
                        </li>
                        <li class = "login">
                            <a href="process_logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </div>

                <!-- p2 logo -->
                <h1 class = "header_logo">
                    <a href ="index.php">
                        <img src="../src/img/logo.avif" />
                    </a>
                </h1>
            </div>

            <!-- menu categories -->
            <div class="grid--full header_menu_categories">
                <div class ="index_list_menu">
                    <div>
                        <ul class = "header_menu_list">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="about_us.php">ABOUT US</a></li>
                            <li><a href="shop.php">SHOP</a></li>
                            <!-- <li style="cursor: default;"><a>CATEGORIES <i class="icon_hover_setup fa-solid fa-chevron-right"></i></a></li> -->
                            <li><a href="blog.php">BLOG</a></li>
                            <li><a href="contact_us.php">CONTACT US</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- icon categories -->
            <ul class = "header_icon_categories">
                <li>
                    <a href = "#">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </li>
                <li>
                    <a href = "cart.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
</div>