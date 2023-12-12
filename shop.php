<?php 
    require 'admin/connect.php';

    // Kiểm tra xem người dùng đã chọn sắp xếp theo và lấy giá trị
    $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'default';

    // Xây dựng truy vấn SQL cho sắp xếp
    switch ($sort_by) {
        case 'az':
            $sort_sql = "ORDER BY name_product ASC";
            break;
        case 'za':
            $sort_sql = "ORDER BY name_product DESC";
            break;
        case 'price_asc':
            $sort_sql = "ORDER BY price_product ASC";
            break;
        case 'price_desc':
            $sort_sql = "ORDER BY price_product DESC";
            break;
        default:
            $sort_sql = ""; // Sắp xếp mặc định hoặc không sắp xếp
            break;
    }

    $sql_product = "select * from product $sort_sql";
    $result_product = mysqli_query($connect, $sql_product);

    $sql_producer = "select * from producer";
    $result_producer = mysqli_query($connect, $sql_producer);

    // sau khi ấn => lọc sản phẩm
    if (isset($_GET['filter']) && $_GET['filter'] === 'deck') {
        $sql = "SELECT * FROM product WHERE type_product = 'deck'";
        $result_product = mysqli_query($connect, $sql);
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'truck') {
        $sql = "SELECT * FROM product WHERE type_product = 'truck'";
        $result_product = mysqli_query($connect, $sql);
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'wheels') {
        $sql = "SELECT * FROM product WHERE type_product = 'wheels'";
        $result_product = mysqli_query($connect, $sql);
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'tool') {
        $sql = "SELECT * FROM product WHERE type_product = 'tool'";
        $result_product = mysqli_query($connect, $sql);
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'shirt') {
        $sql = "SELECT * FROM product WHERE type_product = 'shirt'";
        $result_product = mysqli_query($connect, $sql);
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'trousers') {
        $sql = "SELECT * FROM product WHERE type_product = 'trousers'";
        $result_product = mysqli_query($connect, $sql);
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'shoe') {
        $sql = "SELECT * FROM product WHERE type_product = 'shoe'";
        $result_product = mysqli_query($connect, $sql);
    }


    // sau khi ấn => thay đổi count
    if (isset($_GET['filter']) && $_GET['filter'] === 'deck') {
        $sql_count = "SELECT COUNT(*) AS total_rows FROM product WHERE type_product = 'deck'";
        $result_count_product = mysqli_query($connect, $sql_count);
        $rows = mysqli_fetch_array($result_count_product);
        $total_rows = $rows['total_rows'];
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'truck') {
        $sql_count = "SELECT COUNT(*) AS total_rows FROM product WHERE type_product = 'truck'";
        $result_count_product = mysqli_query($connect, $sql_count);
        $rows = mysqli_fetch_array($result_count_product);
        $total_rows = $rows['total_rows'];
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'wheels') {
        $sql_count = "SELECT COUNT(*) AS total_rows FROM product WHERE type_product = 'wheels'";
        $result_count_product = mysqli_query($connect, $sql_count);
        $rows = mysqli_fetch_array($result_count_product);
        $total_rows = $rows['total_rows'];
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'tool') {
        $sql_count = "SELECT COUNT(*) AS total_rows FROM product WHERE type_product = 'tool'";
        $result_count_product = mysqli_query($connect, $sql_count);
        $rows = mysqli_fetch_array($result_count_product);
        $total_rows = $rows['total_rows'];
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'shirt') {
        $sql_count = "SELECT COUNT(*) AS total_rows FROM product WHERE type_product = 'shirt'";
        $result_count_product = mysqli_query($connect, $sql_count);
        $rows = mysqli_fetch_array($result_count_product);
        $total_rows = $rows['total_rows'];
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'trousers') {
        $sql_count = "SELECT COUNT(*) AS total_rows FROM product WHERE type_product = 'trousers'";
        $result_count_product = mysqli_query($connect, $sql_count);
        $rows = mysqli_fetch_array($result_count_product);
        $total_rows = $rows['total_rows'];
    } else if (isset($_GET['filter']) && $_GET['filter'] === 'shoe') {
        $sql_count = "SELECT COUNT(*) AS total_rows FROM product WHERE type_product = 'shoe'";
        $result_count_product = mysqli_query($connect, $sql_count);
        $rows = mysqli_fetch_array($result_count_product);
        $total_rows = $rows['total_rows'];
    } else {
        // Nếu không áp dụng bộ lọc, đếm tất cả sản phẩm
        $sql_count = "SELECT COUNT(*) AS total_rows FROM product";
        $result_count_product = mysqli_query($connect, $sql_count);
        $rows = mysqli_fetch_array($result_count_product);
        $total_rows = $rows['total_rows'];
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
    <link rel="stylesheet" href="src/css/single.css">
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
                <!-- <div>bread-crumb</div> -->
                <div class="shop">
                    <div style="display: flex">
                        <div class="shop_main_left shop_container">
                            <!-- Danh mục sản phẩm -->
                            <div style="margin-bottom: 40px;">
                                <div class="shop_category_tittle">
                                    <h2>
                                        <span>
                                            Danh mục
                                        </span>
                                    </h2>
                                </div>
                                <div class="shop_category_content">
                                    <ul>
                                        <li>
                                            <i class="fa-solid fa-caret-right"></i>
                                            <a href="shop.php">Home</a>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-caret-right"></i>
                                            <a class="down_product_sk8">Skateboard</a>
                                            <i class="shop_down_icon fa-solid fa-chevron-down"></i>
                                            <ul class="shop_dropdown-menu list_down_product_sk8">
                                                <li>
                                                    <a href="shop.php?filter=deck">decks</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php?filter=truck">trucks</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php?filter=wheels">wheels</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php?filter=tool">tools</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-caret-right"></i>
                                            <a class="down_clother_sk8">Phụ kiện</a>
                                            <i class="shop_down_icon fa-solid fa-chevron-down"></i>
                                            <ul class="shop_dropdown-menu list_down_clother_sk8">
                                                <li>
                                                    <a href="shop.php?filter=shirt">shirts</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php?filter=trousers">trousers</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php?filter=shoe">shoes</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Danh mục nhà sản xuất -->
                            <div style="margin-bottom: 40px;">
                                <div class="shop_category_tittle">
                                    <h2>
                                        <span>nhà sản xuất</span>
                                    </h2>
                                </div>
                                <div class="shop_category_content">
                                    <ul class="shop_manufac_product">
                                        <?php foreach ($result_producer as $eacher) { ?>
                                        <li>
                                            <span>
                                                <?php echo $eacher['name_producer']; ?>
                                            </span>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="shop_main_right shop_container">
                            <div>
                                <!-- part 1 -->
                                <div class="shop_tittle_content_container">
                                    <div class="shop_flex_title_sort">
                                        <div class="shop_main_content_title">
                                            <div style="display:flex; align-items: center;">
                                                <h1>
                                                    kết quả lọc
                                                </h1>
                                                <span>
                                                    ( <?php echo $total_rows; ?> sản phẩm)
                                                </span>
                                            </div>
                                        </div>
                                        <div class="shop_main_content_title">
                                            <div>
                                                <!-- <label>
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </label> -->
                                                <ul class="shop_sort_by_wat">
                                                    <li class="shop_size_text">
                                                        <span>
                                                            Sắp xếp theo
                                                        </span>
                                                        <i class="fa-solid fa-chevron-down"></i>
                                                        <ul class="shop_sort_down">
                                                            <li>
                                                                <a href="shop.php?filter=skateboard&sort_by=default">
                                                                    Mặc định
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.php?filter=skateboard&sort_by=az">
                                                                    A -> Z
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.php?filter=skateboard&sort_by=za">
                                                                    Z -> A
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.php?filter=skateboard&sort_by=price_asc">
                                                                    Giá tăng dần
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.php?filter=skateboard&sort_by=price_desc">
                                                                    Giá giảm dần
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- part 2 -->
                                <div>
                                    <div class="shop_card_container">
                                        <!-- list product -->
                                        <!-- product 1 -->
                                        <?php foreach ($result_product as $each) { ?>
                                        <div class="shop_all_item">
                                            <div class="shop_item_box">
                                                <div class="shop_item_thumbnail">
                                                    <a href="" class="shop_item_img">
                                                        <img src="src/save_img_from_db/<?php echo $each['img_product']; ?>">
                                                    </a>
                                                    <div class="shop_hover_item clear_fix">
                                                        <form class="shop_form_mini_card">
                                                            <div>
                                                                <a style="display: inline-block; color: #000;" href="login.php" class="shop_icon_minicss hover_green_icon">
                                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                                </a>
                                                                <a href="single_product.php?id=<?php echo $each['id_product'] ?>" style="display: inline-block;" class="shop_icon_minicss hover_green_icon">
                                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                                </a>
                                                                <a style="display: inline-block;" class="shop_icon_minicss hover_pink_icon">
                                                                    <i class="fa-solid fa-heart"></i>
                                                                </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="shop_item_content">
                                                    <h3>
                                                        <a href="single_product.php?id=<?php echo $each['id_product'] ?>">
                                                            <?php echo $each['name_product']; ?>
                                                        </a>
                                                    </h3>
                                                    <div class="shop_item_price">
                                                        <div class="shop_special_price">
                                                            <span>
                                                                <?php echo $each['price_product']; ?> $
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php } ?>

                                    </div>
                                    <!-- <div>
                                        <div>
                                            <ul class="shop_pagination">
                                                
                                                <li>
                                                    <a><<</a>
                                                </li>

                                                <li>
                                                    <a>1</a>
                                                </li>
                                                <li>
                                                    <a>2</a>
                                                </li>
                                                <li>
                                                    <a>3</a>
                                                </li>

                                                
                                                <li>
                                                    <a>>></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
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
    <script src="src/javascript/index.js"></script>
</body>
</html> 