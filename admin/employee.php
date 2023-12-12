<?php
    session_start();

    if (empty($_SESSION['id_user'])) {
        header('location:login.php');
    }

    require "connect.php";

    $sql_employee = "select * from users where id_roles = 2";
    $result_sql_employee = mysqli_query($connect, $sql_employee);

    if (isset($_POST['searchInput'])) {
        $searchTerm = $_POST['searchInput'];

        $sql_employee = "select * from users where id_roles = 2 and ten_user like '%$searchTerm%'";
        $result_sql_employee = mysqli_query($connect, $sql_employee);
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
                    <form action="employee.php" method="post">
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
                    <div class="main-header anim" style="--delay: 0s">CRUD employee</div>
                    
                    <div class="table_data">
                        <table class="table_data_main">
                            <thead class="table_data_tittle">
                                <tr>
                                    <th>id</th>
                                    <th>tên</th>
                                    <th>giới tính</th>
                                    <th>tên đăng nhập</th>
                                    <th>mật khẩu</th>
                                    <th>số điện thoại</th>
                                    <th>email</th>
                                    <th>địa chỉ</th>
                                    <th>crud</th>
                                </tr>
                            </thead>
                            <tbody class="table_data_content">
                                
                                <?php foreach ($result_sql_employee as $each_employee) { ?>
                                
                                <tr>
                                    <td>
                                        <?php echo $each_employee['id_user']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each_employee['ten_user']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each_employee['gioitinh_user']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each_employee['username_user']; ?>
                                    </td>
                                    <td>
                                        <a>
                                            <?php echo $each_employee['password_user']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $each_employee['phone_user']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each_employee['email_user']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each_employee['address_user']; ?>
                                    </td>
                                    <td>
                                        <a onclick="getId_employee(event, <?php echo $each_employee['id_user']; ?>)" id="btn_employee-<?php echo $each_employee['id_user']; ?>" style="cursor: pointer" >
                                            <i class="fa-solid fa-wrench"></i>
                                        </a>

                                        <div class="modal-container" id="modal_employee-<?php echo $each_employee['id_user']; ?>">
                                            <div class="modal-wrapper">
                                                <div class="modal">

                                                    <form action="employee/process_fix_employee.php" method="post" enctype="multipart/form-data">
                                                        <header>
                                                            <h2>Sửa nhân viên</h2>
                                                        </header>

                                                        <main>
                                                            <input type="hidden" name="id_employee" value="<?php echo $each_employee['id_user']; ?>" />
                                                            <div class="input_position">
                                                                <input type="text" name="name_employee" value="<?php echo $each_employee['ten_user'];?>" required />
                                                                <p>Tên nhân viên</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="text" name="username_employee" value="<?php echo $each_employee['username_user'];?>" required />
                                                                <p>Tên đăng nhập</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="password" name="password_employee" value="<?php echo $each_employee['password_user'];?>" required />
                                                                <p>Mật khẩu</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="number" name="numberphone_employee" value="<?php echo $each_employee['phone_user'];?>" required />
                                                                <p>Số điện thoại</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="email" name="email_employee" value="<?php echo $each_employee['email_user'];?>" required />
                                                                <p>Email</p>
                                                                <span></span>
                                                            </div>

                                                            <div class="input_position">
                                                                <input type="text" name="address_employee" value="<?php echo $each_employee['address_user'];?>" required />
                                                                <p>Địa chỉ</p>
                                                                <span></span>
                                                            </div>
                                                            
                                                            <div class="input_position">
                                                                <p style="font-family: var(--body-font); color: var(--body-color);">Giới tính</p>
                                                                <div style="font-family: var(--body-font); color: var(--body-color);">
                                                                    <label for="gender_khac">Khác</label>
                                                                    <input id="gender_khac" type="radio" name="gender_employee" value="Khác"/>
                                                                    
                                                                    <label for="gender_nam" style="padding-left: 15px;">Nam</label>
                                                                    <input id="gender_nam" type="radio" name="gender_employee" value="Nam"/>
                                                                    
                                                                    <label for="gender_nu" style="padding-left: 15px;">Nữ</label>
                                                                    <input id="gender_nu" type="radio" name="gender_employee" value="Nữ"/>
                                                                </div>
                                                            </div>
                                                            
                                                        </main>

                                                        <footer>
                                                            <div class="btn-container">
                                                                <div class="cancel-wrapper">
                                                                    <input type="submit" class="btn btn-cancel" value="tạo">
                                                                </div>
                                                                <div class="delet-confirm-wrapper">
                                                                    <a class="btn btn-confirm" onclick="hideModal(event, <?php echo $each_employee['id_user']; ?>)" style="color: color: #d02b20 !important;">
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

                                        <a href="employee/process_del_employee.php?id=<?php echo $each_employee['id_user'] ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div style="padding-top: 10px">
                        <div class="btn-wrapper">
                            <button class="myBtn" id="myBtn">add</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal-container" id="myModal">
                            <div class="modal-wrapper">
                                <div class="modal">

                                    <form action="employee/process_add_employee.php" method="post" enctype="multipart/form-data">
                                        <header>
                                            <h2>Thêm nhân viên</h2>
                                        </header>

                                        <main>
                                            <div class="input_position">
                                                <input type="text" name="name_employee" required />
                                                <p>Tên nhân viên</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="text" name="username_employee" required />
                                                <p>Tên đăng nhập</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="password" name="password_employee" required />
                                                <p>Mật khẩu</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="number" name="numberphone_employee" required />
                                                <p>Số điện thoại</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="email" name="email_employee" required />
                                                <p>Email</p>
                                                <span></span>
                                            </div>

                                            <div class="input_position">
                                                <input type="text" name="address_employee" required />
                                                <p>Địa chỉ</p>
                                                <span></span>
                                            </div>
                                            
                                            <div class="input_position">
                                                <p>Giới tính</p>
                                                <div>
                                                    <label for="input_value_gender_gender">Khác</label>
                                                    <input id="input_value_gender_gender" type="radio" name="gender_employee" value="Khác"/>
                                                    
                                                    <label for="input_value_gender_male" style="padding-left: 15px;">Nam</label>
                                                    <input id="input_value_gender_male" type="radio" name="gender_employee" value="Nam"/>
                                                    
                                                    <label for="input_value_gender_female" style="padding-left: 15px;">Nữ</label>
                                                    <input id="input_value_gender_female" type="radio" name="gender_employee" value="Nữ"/>
                                                </div>
                                            </div>
                                            
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
</body>
</html>