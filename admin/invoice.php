<?php
    session_start();

    if (empty($_SESSION['id_user'])) {
        header('location:login.php');
    }

    require "connect.php";

    $sql_invoice = "select * from hoadon";
    $result_sql_invoice = mysqli_query($connect, $sql_invoice);

    if (isset($_POST['searchInput'])) {
        $searchTerm = $_POST['searchInput'];

        $sql_invoice = "select * from hoadon where ngaylap_hoadon like '%$searchTerm%'";
        $result_sql_invoice = mysqli_query($connect, $sql_invoice);
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
                    <form action="invoice.php" method="post">
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
                    <div class="main-header anim" style="--delay: 0s">CRUD invoice</div>
                    

                    <div class="table_data">
                        <table class="table_data_main">
                            <thead class="table_data_tittle">
                                <tr>
                                    <th>id</th>
                                    <th>id đơn hàng</th>
                                    <th>ngày lập</th>
                                    <th>tổng tiền</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody class="table_data_content">
                                
                                <?php foreach ($result_sql_invoice as $each_invoice) { ?>
                                
                                <tr>
                                    <td>
                                        <?php echo $each_invoice['id_hoadon']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each_invoice['id_donhang']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each_invoice['ngaylap_hoadon']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each_invoice['tongtien']; ?>
                                    </td>
                                    <td>
                                        <a href="invoice/process_del_invoice.php?id=<?php echo $each_invoice['id_hoadon'] ?>">
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