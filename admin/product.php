<?php
    session_start();

    if (empty($_SESSION['id_user'])) {
        header('location:login.php');
    }

    require 'connect.php';
    $sql_product = "select * from product";
    $result_product = mysqli_query($connect, $sql_product);

    $sql_producer = "select * from producer";
    $result_producer = mysqli_query($connect, $sql_producer);

    if (isset($_POST['searchInput'])) {
        $searchTerm = $_POST['searchInput'];

        $sql_product = "select * from product where name_product like '%$searchTerm%'";
        $result_product = mysqli_query($connect, $sql_product);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/nomalize.css">
    <link rel="stylesheet" href="src/css/tabledata.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <title>Document</title>
    <link rel="stylesheet" href="src/css/admincss.css">
</head>
<body>

    <div class="dashboard_main">
        <div class="container">
            <!-- menu -->
            <?php include "component_menu.php" ?>

            <div class="wrapper">
                <!-- header -->
                <div class="header">
                    <form action="product.php" method="post">
                        <div class="search-bar">
                            <input type="text" placeholder="Search" name="searchInput">
                        </div>
                    </form>
                    <div class="user-settings">
                        <img class="user-img" src="https://images.unsplash.com/photo-1587918842454-870dbd18261a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=943&q=80" alt="">
                        <div class="user-name">
                            <?php
                                echo $_SESSION['ten_admin'];
                            ?>
                        </div>
                        <i class="fa-solid fa-chevron-down"></i>
                        <div class="notify">
                            <div class="notification"></div>
                            <i class="fa-solid fa-bell"></i>
                        </div>
                    </div>
                </div>

                <!-- content -->
                <div class="main-container">
                    <div class="main-header anim" style="--delay: 0s">CRUD Product</div>
                    
                    <div class="table_data">
                        <table class="table_data_main">
                            <thead class="table_data_tittle">
                                <tr>
                                    <th>id</th>
                                    <th>tên</th>
                                    <th>mô tả</th>
                                    <th>giá</th>
                                    <th>ảnh</th>
                                    <th>số lượng</th>
                                    <th>loại</th>
                                    <th>nhà sản xuất</th>
                                    <th>crud</th>
                                </tr>
                            </thead>
                            <tbody class="table_data_content">

                                <?php foreach ($result_product as $each) { ?>

                                <tr>
                                    <td>
                                        <?php echo $each['id_product']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['name_product']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['desc_product']; ?>
                                    </td>
                                    <td>
                                        <a>
                                            <?php echo $each['price_product']; ?> $
                                        </a>
                                    </td>
                                    <td style ="width: 10%;">
                                        <img src="../src/save_img_from_db/<?php echo $each['img_product']; ?>">
                                        <small>ảnh sản phẩm</small>
                                    </td>
                                    <td>
                                        <?php echo $each['number_product']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['type_product']; ?>
                                    </td>
                                    <td>
                                        <a class="more">
                                            <?php 

                                                $id_producer = $each['id_producer'];
                                                $sql_name_producer = "select name_producer from producer where id_producer = $id_producer";
                                                $result_n_producer = mysqli_query($connect, $sql_name_producer);

                                                $row = mysqli_fetch_assoc($result_n_producer);
                                                echo $row['name_producer'];

                                            ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="getId(event, <?php echo $each['id_product']; ?>)" id="btn_fix-<?php echo $each['id_product']; ?>" style="cursor: pointer" >
                                            <i class="fa-solid fa-wrench"></i>
                                        </a>

                                        <div class="modal-container" id="modal_fix-<?php echo $each['id_product']; ?>">
                                            <div class="modal-wrapper">
                                                <div class="modal">

                                                    <form action="product/process_fix_product.php" method="post" enctype="multipart/form-data">
                                                        <header>
                                                            <h2>Sửa sản phẩm</h2>
                                                        </header>

                                                        <main>
                                                            <input style="display: none;" type="number" name="id_product" value="<?php echo $each['id_product']; ?>" />
                                                            <div class="input_position">
                                                                <input type="text" name="name_product" value="<?php echo $each['name_product']; ?>" required />
                                                                <p>Tên sản phẩm</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="text" name="desc_product" value="<?php echo $each['desc_product']; ?>" required />
                                                                <p>Mô tả</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="number" name="price_product" value="<?php echo $each['price_product']; ?>" required />
                                                                <p>Giá</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="text" name="type_product" value="<?php echo $each['type_product']; ?>" required />
                                                                <p>Loại sản phẩm</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="number" name="number_product" value="<?php echo $each['number_product']; ?>" required />
                                                                <p>Số lượng sản phẩm</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input id="input_value_fix_producer" type="text" value="<?php
                                                                    $sql_product_name = "SELECT * FROM producer WHERE id_producer = " . mysqli_real_escape_string($connect, $each['id_producer']);
                                                                    $result_sql_product_name = mysqli_query($connect, $sql_product_name);
                                                                    $each_name_producer = mysqli_fetch_array($result_sql_product_name);
                                                                    echo $each_name_producer['name_producer']; ?>" name="name_fix_producer"/>
                                                                <input id="id_fix_producer" value="<?php echo $each['id_producer']; ?>" type="hidden" name="id_fix_producer" />
                                                                <p>Tên nhà sản xuất</p>
                                                                <span></span>

                                                                <ul class="dropdown_fix_producer">
                                                                    <li>
                                                                        <?php foreach ($result_producer as $each_producer) { ?>
                                                                        <li>
                                                                            <a data-id="<?php echo $each_producer['id_producer']; ?>" data-name="<?php echo $each_producer['name_producer']; ?>" class="fill-fix_input" style="color: #363636 !important;">
                                                                                <?php echo $each_producer['name_producer']; ?>
                                                                            </a>
                                                                        </li>
                                                                        <?php } ?>
                                                                    </li>
                                                                    
                                                                </ul>
                                                            </div>

                                                            <div class="dropdown_fix_producer_click">Chọn nhà sản xuất</div>
                                                            
                                                            <!-- ảnh -->
                                                            <div class="input_position">
                                                                <input type="file" name="img_product" accept="image/*"/>
                                                                <span></span>
                                                            </div>
                                                            <!-- hết ảnh -->

                                                        </main>

                                                        <footer>
                                                            <div class="btn-container">
                                                                <div class="cancel-wrapper">
                                                                    <input type="submit" class="btn btn-cancel" value="sửa">
                                                                </div>
                                                                <div class="delet-confirm-wrapper">
                                                                    <a class="btn btn-confirm" onclick="hideModalfix(event, <?php echo $each['id_product']; ?>)" style="color: color: #d02b20 !important;">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                        Hủy
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </footer>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="product/process_del_product.php?id=<?php echo $each['id_product'] ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="form_popup" style="padding-top: 10px;">
                        <!-- Button -->
                        <div class="btn-wrapper">
                            <button class="myBtn" id="myBtn">add</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal-container" id="myModal">
                            <div class="modal-wrapper">
                                <div class="modal">

                                    <form action="product/process_add_product.php" method="post" enctype="multipart/form-data">
                                        <header>
                                            <h2>Thêm sản phẩm</h2>
                                        </header>

                                        <main>
                                            <div class="input_position">
                                                <input type="text" name="name_product" required />
                                                <p>Tên sản phẩm</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="text" name="desc_product" required />
                                                <p>Mô tả</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="number" name="price_product" required />
                                                <p>Giá</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="text" name="type_product" required />
                                                <p>Loại sản phẩm</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="number" name="number_product" required />
                                                <p>Số lượng sản phẩm</p>
                                                <span></span>
                                            </div>
                                            
                                            <div class="input_position">
                                                <input id="input_value_producer" type="text" name="name_producer" required />
                                                <input id="id_producer" type="hidden" name="id_producer" />
                                                <p>Tên nhà sản xuất</p>
                                                <span></span>

                                                <ul class="dropdown_producer">
                                                    <li>
                                                        <?php foreach ($result_producer as $each_producer) { ?>
                                                            <li>
                                                                <a data-id="<?php echo $each_producer['id_producer']; ?>" data-name="<?php echo $each_producer['name_producer']; ?>" class="fill-input">
                                                                    <?php echo $each_producer['name_producer']; ?>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </li>
                                                    
                                                </ul>
                                                
                                            </div>
                                            
                                            <div class="dropdown_producer_click">Chọn nhà sản xuất</div>
                                            
                                            <!-- ảnh -->
                                            <div class="input_position">
                                                <input type="file" name="img_product" required />
                                                <span></span>
                                            </div>
                                            <!-- hết ảnh -->

                                        </main>

                                        <footer>
                                            <div class="btn-container">
                                                <div class="cancel-wrapper">
                                                    <input type="submit" class="btn btn-cancel" value="tạo">
                                                </div>
                                                <div class="delet-confirm-wrapper">
                                                    <a class="btn btn-confirm">
                                                        <i class="fa-solid fa-trash"></i>
                                                        Hủy
                                                    </a>
                                                </div>
                                            </div>
                                        </footer>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

    <script src="src/javascript/adminjs.js"></script>
    <script src="../src/javascript/index.js"></script>
    <script src="src/javascript/search_input.js"></script>
</body>
</html>