<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/nomalize.css">
    <link rel='stylesheet' type='text/css' href='../src/css/style.css'/>
    <link rel="stylesheet" href="../src/css/media.css">
    <link rel="stylesheet" href="../src/css/components.css">
    <title>Skateboard life</title>
    <link rel="shortcut icon" href="../src/img/favicon.png" type="image/x-icon">
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
                <div class="about-us">
                    <div class="about-section">
                        <div class="about_container_parapart">
                            <div class="about_parapart_img">
                                <img src="../src/img/abt_welcome_1.jpg">
                            </div>
                            <div class="about_parapart_img">
                                <div class="about_parapart_text">
                                    <h3>Multipurpose store</h3>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority 
                                        have suffered alteration in some form, by injected humour, or randomised words 
                                        which don't look even slightly believable. Lorem Ipsum available, but the majority
                                        have suffered alteration in some form. Vivamus adipiscing lobortis sagittis. Nullam 
                                        tempus mauris dolor, ac malesuada arcu. Praesent dolor quam, tincidunt in sollicitudin 
                                        sit amet, volutpat sed velit. Nullam non neque ipsum.Lorem ipsum dolor sit amet, 
                                        consectetur adipiscing elit. Morbi euismod diam eu arcu volutpat ut adipiscing sem auctor.
                                        Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu.
                                    </p>
                                    <a class="btn btn_about">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-section">
                        <div class="about_container_parapart">
                            <div class="about-us_grid_item">
                                <img src="../src/img/about_1.jpg">
                                <div class="about-us_hover_slitop">
                                    <span>STYLE</span>
                                </div>
                            </div>
                            <div class="about-us_grid_item">
                                <img src="../src/img/about_2.jpg">
                                <div class="about-us_hover_slitop">
                                    <span>COMFORT</span>
                                </div>
                            </div>
                            <div class="about-us_grid_item">
                                <img src="../src/img/about_3.jpg">
                                <div class="about-us_hover_slitop">
                                    <span>PRECISION</span>
                                </div>
                            </div>
                            <div class="about-us_grid_item">
                                <img src="../src/img/about_4.jpg">
                                <div class="about-us_hover_slitop">
                                    <span>DURABLE</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-section about_img_background">
                        <div class="about_overlayout"></div>
                        <div class="about_item_parapart3">
                            <div class="about_item_card">
                                <div class="about_icon_card">
                                    <i class="fa-regular fa-gem"></i>
                                </div>
                                <h5>TOTALLY RESPONSIVE</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.Suspendisse urna nibh, 
                                    viverra non, semper suscipit, posuere a, pede.
                                </p>
                            </div>
                            <div class="about_item_card">
                                <div class="about_icon_card">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                                <h5>DIFFERENT HEADER TYPES</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.Suspendisse urna nibh, 
                                    viverra non, semper suscipit, posuere a, pede.
                                </p>
                            </div>
                            <div class="about_item_card">
                                <div class="about_icon_card">
                                    <i class="fa-solid fa-headphones"></i>
                                </div>
                                <h5>HIGHLY CUSTOMIZABLE</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.Suspendisse urna nibh, 
                                    viverra non, semper suscipit, posuere a, pede.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="about-section">
                        <div class="about_container_parapart">
                            <h3>Our Team</h3>
                            <div class="about_ourteam_para">
                                <div class="about_container_text">
                                    <p>
                                    Nullam ultrices cursus orci id maximus. Etiam ultricies, turpis ac accumsan volutpat, 
                                    nisi nisi fermentum orci, eu pulvinar justo sapien ut orci. Lorem ipsum dolor sit amet, 
                                    consectetur adipiscing elit. Sed ut elit vel lectus fringilla molestie ac et turpis. Ut 
                                    sed tempus nisi. In eleifend vel velit nec pulvinar.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <ul class="about_leader_team">
                                    <li>
                                        <div class="about_thumb">
                                            <div class="about_thumb_img">
                                                <img src="src/img/team-1.jpg">
                                            </div>
                                            <div class="about_thumb_hover"></div>
                                        </div>
                                        <div class="about_detail_card">
                                            <h4>
                                                <a>
                                                    name
                                                </a>
                                            </h4>
                                            <h5>description</h5>
                                            <ul class="about_sociation_icon">
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about_thumb">
                                            <div class="about_thumb_img">
                                                <img src="src/img/team-1.jpg">
                                            </div>
                                            <div class="about_thumb_hover"></div>
                                        </div>
                                        <div class="about_detail_card">
                                            <h4>
                                                <a>
                                                    name
                                                </a>
                                            </h4>
                                            <h5>description</h5>
                                            <ul class="about_sociation_icon">
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about_thumb">
                                            <div class="about_thumb_img">
                                                <img src="src/img/team-1.jpg">
                                            </div>
                                            <div class="about_thumb_hover"></div>
                                        </div>
                                        <div class="about_detail_card">
                                            <h4>
                                                <a>
                                                    name
                                                </a>
                                            </h4>
                                            <h5>description</h5>
                                            <ul class="about_sociation_icon">
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about_thumb">
                                            <div class="about_thumb_img">
                                                <img src="src/img/team-1.jpg">
                                            </div>
                                            <div class="about_thumb_hover"></div>
                                        </div>
                                        <div class="about_detail_card">
                                            <h4>
                                                <a>
                                                    name
                                                </a>
                                            </h4>
                                            <h5>description</h5>
                                            <ul class="about_sociation_icon">
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="fa-brands fa-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="about-section">
                        <div class="about_container_parapart" style="height:100%">
                            <div class="about_part4_icon">
                                <div class="about_part4_card">
                                    <div class="about_icon_wrap">
                                        <i class="fa-solid fa-briefcase"></i>
                                    </div>
                                    <div class="about_text_wrap">
                                        <h4>548</h4>
                                        <p>
                                            PROJECT COMPLETED
                                        </p>
                                    </div>
                                </div>
                                <div class="about_part4_card">
                                    <div class="about_icon_wrap">
                                        <i class="fa-regular fa-clock"></i>
                                    </div>
                                    <div class="about_text_wrap">
                                        <h4>1548</h4>
                                        <p>
                                            WORKING HOURS
                                        </p>
                                    </div>
                                </div>
                                <div class="about_part4_card">
                                    <div class="about_icon_wrap">
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div class="about_text_wrap">
                                        <h4>748</h4>
                                        <p>
                                            POST FEEDBACKS
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="about_part4_introtext">
                                <div class="about_part4_main_content">
                                    <h3>Promo Ads</h3>
                                    <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.Veritatis et quasi architecto 
                                    beatae vitae dicta sunt explicabo.Lorem ipsum dolor sit amet, consectetur adipiscing 
                                    elit.Vivamus adipiscing lobortis sagittis.
                                    </p>
                                    <a class="btn btn_about">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- footer content -->
                <?php include "component_footer.php" ?>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.17/fullpage.min.js" integrity="sha512-zAHJKGyoPf2Y20Wi4uo32sa/vSvwKfY4tYUt6gJfmkA79X0wt5ZfaxL5GqJ5cMnmvGslWi5PKTo51rHRZqYbJg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../src/javascript/index.js"></script>
</body>
</html> 