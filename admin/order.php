<?php
    session_start();

    if (empty($_SESSION['id_user'])) {
        header('location:login.php');
    } 

    require 'connect.php';
    $sql_order = "SELECT donhang.id_donhang, donhang.address_donhang, donhang.phone_donhang, donhang.email_donhang, donhang.trangthai_donhang, donhang.soluong_sanpham, users.ten_user, users.id_user
    FROM donhang
    JOIN users ON donhang.id_user = users.id_user;";
    $result_order = mysqli_query($connect, $sql_order);

    // if (isset($_POST['searchInput'])) {
    //     $searchTerm = $_POST['searchInput'];

    //     $sql_order = "select * from donhang where name_blog like '%$searchTerm%'";
    //     $result_order = mysqli_query($connect, $sql_order);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/nomalize.css">
    <link rel="stylesheet" href="src/css/tabledata.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link rel="stylesheet" href="src/css/admincss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>

    <div class="dashboard_main">
        <div class="container">
            <!-- menu -->
            <?php include "component_menu.php" ?>

            <div class="wrapper">
                <!-- header -->
                <div class="header">
                    <form action="order.php" method="post">
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
                    <div class="main-header anim" style="--delay: 0s">CRUD Order</div>
                    
                    <div class="table_data">
                        <table class="table_data_main">
                            <thead class="table_data_tittle">
                                <tr>
                                    <th>id đơn hàng</th>
                                    <th>tên người nhận</th>
                                    <th>địa chỉ nhận</th>
                                    <th>số điện thoại</th>
                                    <th>email</th>
                                    <th>số lượng sản phẩm</th>
                                    <th>trạng thái</th>
                                    <th>crud</th>
                                </tr>
                            </thead>
                            <tbody class="table_data_content">

                                <?php foreach ($result_order as $each) { ?>

                                <tr>
                                    <td>
                                        <?php echo $each['id_donhang']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['ten_user']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['address_donhang']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['phone_donhang']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['email_donhang']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['soluong_sanpham']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['trangthai_donhang']; ?>
                                    </td>
                                    <td>
                                        <a onclick="getId_order(event, <?php echo $each['id_donhang']; ?>)" id="btn_fix_order-<?php echo $each['id_donhang']; ?>" style="cursor: pointer" >
                                            <i class="fa-solid fa-wrench"></i>
                                        </a>

                                        <div class="modal-container" id="modal_fix_order-<?php echo $each['id_donhang']; ?>">
                                            <div class="modal-wrapper">
                                                <div class="modal">

                                                    <form action="order/process_fix_order.php" method="post" enctype="multipart/form-data">
                                                        <header>
                                                            <h2>Sửa đơn hàng</h2>
                                                        </header>

                                                        <main>
                                                            <input style="display: none;" type="number" name="id_donhang" value="<?php echo $each['id_donhang']; ?>" />
                                                            <input style="display: none;" type="number" name="id_user" value="<?php echo $each['id_user']; ?>" />
                                                            <div class="input_position">
                                                                <input type="text" name="ten_user" value="<?php echo $each['ten_user']; ?>" required />
                                                                <p>Tên người nhận</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="text" name="address_donhang" value="<?php echo $each['address_donhang']; ?>" required />
                                                                <p>Địa chỉ nhận</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="number" name="phone_donhang" value="<?php echo $each['phone_donhang']; ?>" required />
                                                                <p>Số điện thoại</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="email" name="email_donhang" value="<?php echo $each['email_donhang']; ?>" required />
                                                                <p>Email</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="number" name="soluong_sanpham" value="<?php echo $each['soluong_sanpham']; ?>" required />
                                                                <p>Số lượng sản phẩm</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <?php 
                                                                    switch ($each['trangthai_donhang']) {
                                                                        case 'Đã hoàn thành':
                                                                            echo "<select id='trangthai' name='trangthai_donhang'>";
                                                                            echo "<option value='Đã hoàn thành' selected='true'>Đã hoàn thành</option>";
                                                                            echo "<option value='Đang xử lý'>Đang xử lý</option>";
                                                                            echo "<option value='Đang giao hàng'>Đang giao hàng</option>";
                                                                            echo "<option value='Đã hủy'>Đã hủy</option>";
                                                                            echo "</select>";
                                                                            break;
                                                                        case 'Đang xử lý':
                                                                            echo "<select id='trangthai' name='trangthai_donhang'>";
                                                                            echo "<option value='Đã hoàn thành'>Đã hoàn thành</option>";
                                                                            echo "<option value='Đang xử lý' selected='true'>Đang xử lý</option>";
                                                                            echo "<option value='Đang giao hàng'>Đang giao hàng</option>";
                                                                            echo "<option value='Đã hủy'>Đã hủy</option>";
                                                                            echo "</select>";
                                                                            break;      
                                                                        case 'Đang giao hàng':
                                                                            echo "<select id='trangthai' name='trangthai_donhang'>";
                                                                            echo "<option value='Đã hoàn thành'>Đã hoàn thành</option>";
                                                                            echo "<option value='Đang xử lý'>Đang xử lý</option>";
                                                                            echo "<option value='Đang giao hàng' selected='true'>Đang giao hàng</option>";
                                                                            echo "<option value='Đã hủy'>Đã hủy</option>";
                                                                            echo "</select>";
                                                                            break;               
                                                                        default:
                                                                            echo "<select id='trangthai' name='trangthai_donhang'>";
                                                                            echo "<option value='Đã hoàn thành'>Đã hoàn thành</option>";
                                                                            echo "<option value='Đang xử lý'>Đang xử lý</option>";
                                                                            echo "<option value='Đang giao hàng'>Đang giao hàng</option>";
                                                                            echo "<option value='Đã hủy' selected='true'>Đã hủy</option>";
                                                                            echo "</select>";
                                                                            break;   
                                                                    }
                                                                ?>
                                                                <!-- <input type="text" name="trangthai_donhang" value="<?php echo $each['trangthai_donhang']; ?>" required />
                                                                <p>Trạng thái</p>
                                                                <span></span> -->
                                                            </div>
                                                            </div>

                                                        </main>

                                                        <footer>
                                                            <div class="btn-container">
                                                                <div class="cancel-wrapper">
                                                                    <input type="submit" class="btn btn-cancel" value="sửa">
                                                                </div>
                                                                <div class="delet-confirm-wrapper">
                                                                    <a class="btn btn-confirm" onclick="hideModalfixOrder(event, <?php echo $each['id_donhang']; ?>)" style="color: color: #d02b20 !important;">
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

                                        <a href="order/process_del_order.php?id=<?php echo $each['id_donhang'] ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="src/javascript/adminjs.js"></script>
</body>
</html>