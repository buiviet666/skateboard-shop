<?php
    $id_product = $_GET['id'];

    require 'admin/connect.php';

    $sql_id_product = "select * from product where id_product = '$id_product'";
    $result_id_product = mysqli_query($connect, $sql_id_product);
    $each = mysqli_fetch_array($result_id_product);
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
    <link rel="stylesheet" href="src/css/single.css">
    <link rel="stylesheet" href="src/css/css_sk8.css">
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
                <div class="single_shop">
                    <div class="single_shop_container">
                        <div class="single_shop_half_item">
                            <div class="single_shop_main_img">
                                <img src="src/save_img_from_db/<?php echo $each['img_product']; ?>">
                            </div>
                            <!-- <ul class="single_shop_list_img">
                                <li>
                                    <a>
                                        <img src="src/img/variant-10_grande.jpg">
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <img src="src/img/variant-10_grande.jpg">
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <img src="src/img/variant-10_grande.jpg">
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <img src="src/img/variant-10_grande.jpg">
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                        <div class="single_shop_half_item">
                            <div class="single_shop_content_product">
                                <h3>
                                    <?php echo $each['name_product']; ?>
                                </h3>
                                <div>
                                    <div class="single_shop_price">
                                        <span>
                                            <?php echo $each['price_product']; ?> $
                                        </span>
                                    </div>
                                    <div class="single_shop_situation">
                                        <p>
                                            <label>Availability:</label>
                                            <span>
                                                <?php echo $each['number_product']; ?>
                                            </span>
                                        </p>
                                        <p>
                                            <label>Product Vendor:</label>
                                            <span>
                                                <?php
                                                    $id_producer = $each['id_producer'];
                                                    $sql_n_producer = "SELECT name_producer FROM producer WHERE id_producer = $id_producer";
                                                    $result_n_producer = mysqli_query($connect, $sql_n_producer);

                                                    $rows = mysqli_fetch_array($result_n_producer);
                                                    $name_producer = $rows['name_producer'];

                                                    echo $name_producer;
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                    <form class="single_shop_form">
                                        <!-- <div class="single_shop_form_container">
                                            <label class="single_shop_size_title">
                                                Size:
                                            </label>
                                            <div class="single_shop_input">
                                                <label for="size_one">8.5</label>
                                                <input type="radio" id="size_one" value="1">
                                            </div>
                                            <div class="single_shop_input">
                                                <label for="size_two">8.6</label>
                                                <input type="radio" id="size_two" value="2">
                                            </div>
                                        </div> -->
                                        <!-- <div>
                                            <label class="single_shop_size_title">
                                                Quantity:
                                            </label>
                                            <div class="single_shop_quantity">
                                                <input class="decrease btn_quanti" value="-">
                                                <input class="input_number_quanti" type="number">
                                                <input class="increase btn_quanti" value="+">
                                            </div>
                                        </div> -->
                                        <a href="login.php" class="btn btn_sshop">
                                            add to card
                                        </a>
                                        <a class="btn btn_sshop" href="shop.php">back to shop</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_shop_descrip">
                        <h3>Description</h3>
                        <p>
                            <?php echo $each['desc_product']; ?>
                        </p>
                    </div>
                    <div class="single_shop_ship_pos">
                        <div class="single_shop_content">
                            <h3>Shipping details</h3>
                            <p>
                                daskdajkw
                            </p>
                        </div>
                        <div class="single_shop_content">
                            <div class="sk8_css">
                                <?php include "component_sk8.php" ?>
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
    <script src="src/javascript/index.js"></script>
</body>
</html> 