<?php 
    session_start();

    if (empty($_SESSION['cart'])) {
        header('location: shop.php');
    }

    $cart = $_SESSION['cart'];
    $sum_price = 0;
    $id_user = $_SESSION['id_user'];

    require 'connect.php';

    $sql = "select * from users where id_user = $id_user";
    $result_sql = mysqli_query($connect, $sql);
    $each_user = mysqli_fetch_array($result_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//src/css/nomalize.css">
    <link rel="stylesheet" href="src/customer.css">
    <link rel="stylesheet" href="../src/css/css_sk8.css">
    <title>Document</title>
</head>
<body>

    <div class="form_cart">
        <div class="form_cart_info">
            <div class="form_cart_container">
                <header class="form_cart_tittle">
                    <div>
                        <a href="index.php">Skateboard</a>
                    </div>
                </header>
                <div class="form_cart_info-form">
                    <div>
                        <form action="process_form_order_cart.php" method="post">
                            <div>
                                <div class="form_area_contact">
                                    <div class="form_contact_tittle">
                                        <h2>contact</h2>
                                        <span>back to <a href="shop.php" style="color:#ffffff">shop</a></span>
                                    </div>
                                    <div class="form_cart_input">
                                        <input name="contact" type="text" placeholder="Email" value="<?php echo $each_user['email_user'] ?>" />
                                        <span class="bottom"></span>
                                        <span class="right"></span>
                                        <span class="top"></span>
                                        <span class="left"></span>
                                    </div>
                                </div>
                                <div>
                                    <h2>Shipping address</h2>
                                    <div class="form_cart_input">
                                        <input name="address" type="text" placeholder="Địa chỉ" value="<?php echo $each_user['address_user'] ?>" />
                                        <span class="bottom"></span>
                                        <span class="right"></span>
                                        <span class="top"></span>
                                        <span class="left"></span>
                                    </div>
                                    <div class="form_cart_input">
                                        <input name="phonenumber" type="text" placeholder="Số điện thoại" value="<?php echo $each_user['phone_user'] ?>" />
                                        <span class="bottom"></span>
                                        <span class="right"></span>
                                        <span class="top"></span>
                                        <span class="left"></span>
                                    </div>
                                    <div class="form_cart_input">
                                        <input name="name" type="text" placeholder="Tên Khách hàng" value="<?php echo $each_user['ten_user'] ?>" />
                                        <span class="bottom"></span>
                                        <span class="right"></span>
                                        <span class="top"></span>
                                        <span class="left"></span>
                                    </div>
                                </div>
                            </div>
                            <div style="float: right;">
                                <button class="btn_form_cart_p">
                                    <span>Purchase</span>
                                    <div></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <footer class="form_cart_footer-end">
                    <div>
                        <p style="color: #9A8C8C;">All rights reserved Skateboards is make by me!</p>
                    </div>
                </footer>
            </div>
        </div>
        <div class="form_cart_product_info">
            <div class="form_cart_container">
                <div class="form_cart_position_content">
                    <div class="form_img_cart">

                    <?php foreach ($cart as $id_product_each => $each) { ?>
                        <div class="form_cart_each_item">
                            <div style="width: 100px;height: 100%;">
                                <img src="../src/save_img_from_db/<?php echo $each['img_product']; ?>" style="width: 100%">
                            </div>
                            <div>
                                <p><?php echo $each['name_product']; ?></p>
                                <small><?php echo $each['desc_product']; ?></small>
                            </div>
                            <div></div>
                            <div>
                                <span>
                                    <?php
                                        echo $each['price_product']; 
                                        $price_new = $each['price_product'] * $each['quantity'];
                                        $sum_price = $sum_price + $price_new;
                                    ?> $
                                </span>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div>
                        <div class="sk8_css">                 
                            <div class="wrapper" style="height: 230px !important;">
                                <div class="board">
                                    <div class="board__body board__body--back">
                                    <div class="board__side board__side--left"></div>
                                    <div class="board__center"></div>
                                    <div class="board__side board__side--right"></div>
                                    </div>
                                    <div class="board__body board__body--front">
                                    <div class="board__side board__side--left"></div>
                                    <div class="board__center"></div>
                                    <div class="board__side board__side--right"></div>
                                    </div>
                                    <div class="board__tires">
                                    <div class="board__tire"><span></span></div>
                                    <div class="board__tire"><span></span></div>
                                    <div class="board__tire"><span></span></div>
                                    <div class="board__tire"><span></span></div>
                                    </div>
                                </div>
                                <div class="shadow"></div>
                                <div class="wind">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form_price_cart">
                        <div class="each_form_price_cart">
                            <span>tổng tiền</span>
                            <span>
                                <?php
                                
                                echo $sum_price ?> $
                            </span>
                        </div>
                        <div class="each_form_price_cart">
                            <span>giá cuối</span>
                            <span>
                                <?php
                                
                                echo $sum_price ?> $
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>