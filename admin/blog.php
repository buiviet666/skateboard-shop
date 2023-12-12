<?php
    session_start();

    if (empty($_SESSION['id_user'])) {
        header('location:login.php');
    } 

    require 'connect.php';
    $sql_blog = "select * from blog";
    $result_blog = mysqli_query($connect, $sql_blog);

    if (isset($_POST['searchInput'])) {
        $searchTerm = $_POST['searchInput'];

        $sql_blog = "select * from blog where name_blog like '%$searchTerm%'";
        $result_blog = mysqli_query($connect, $sql_blog);
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
                    <form action="blog.php" method="post">
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
                    <div class="main-header anim" style="--delay: 0s">CRUD Blog</div>
                    
                    <div class="table_data">
                        <table class="table_data_main">
                            <thead class="table_data_tittle">
                                <tr>
                                    <th>id</th>
                                    <th>tiêu đề</th>
                                    <th>mô tả</th>
                                    <th>ngày tạo</th>
                                    <th>ảnh</th>
                                    <th>crud</th>
                                </tr>
                            </thead>
                            <tbody class="table_data_content">

                                <?php foreach ($result_blog as $each) { ?>

                                <tr>
                                    <td>
                                        <?php echo $each['id_blog']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['name_blog']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['desc_blog']; ?>
                                    </td>
                                    <td>
                                        <?php echo $each['date_blog']; ?>
                                    </td>
                                    <td style ="width: 10%;">
                                        <img src="../src/save_img_from_db/<?php echo $each['img_blog']; ?>">
                                        <small>ảnh blog</small>
                                    </td>
                                    <td>
                                        <a onclick="getId_blog(event, <?php echo $each['id_blog']; ?>)" id="btn_fix_blog-<?php echo $each['id_blog']; ?>" style="cursor: pointer" >
                                            <i class="fa-solid fa-wrench"></i>
                                        </a>

                                        <div class="modal-container" id="modal_fix_blog-<?php echo $each['id_blog']; ?>">
                                            <div class="modal-wrapper">
                                                <div class="modal">

                                                    <form action="blog/process_fix_blog.php" method="post" enctype="multipart/form-data">
                                                        <header>
                                                            <h2>Sửa blog</h2>
                                                        </header>

                                                        <main>
                                                            <input style="display: none;" type="number" name="id_blog" value="<?php echo $each['id_blog']; ?>" />
                                                            <div class="input_position">
                                                                <input type="text" name="name_blog" value="<?php echo $each['name_blog']; ?>" required />
                                                                <p>Tiêu đề</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="text" name="desc_blog" value="<?php echo $each['desc_blog']; ?>" required />
                                                                <p>Mô tả</p>
                                                                <span></span>
                                                            </div>
                                                            <div class="input_position">
                                                                <input type="date" name="date_blog" value="<?php echo $each['date_blog']; ?>" required />
                                                                <p>ngày tạo</p>
                                                                <span></span>
                                                            </div>
                                                            
                                                            <!-- ảnh -->
                                                            <div class="input_position">
                                                                <input type="file" name="img_blog" accept="image/*"/>
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
                                                                    <a class="btn btn-confirm" onclick="hideModalfixBlog(event, <?php echo $each['id_blog']; ?>)" style="color: color: #d02b20 !important;">
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

                                        <a href="blog/process_del_blog.php?id=<?php echo $each['id_blog'] ?>">
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

                                    <form action="blog/process_add_blog.php" method="post" enctype="multipart/form-data">
                                        <header>
                                            <h2>Thêm blog</h2>
                                        </header>

                                        <main>
                                            <div class="input_position">
                                                <input type="text" name="name_blog" required />
                                                <p>Tiêu đề</p>
                                                <span></span>
                                            </div>
                                            <div class="input_position">
                                                <input type="text" name="desc_blog" required />
                                                <p>Mô tả</p>
                                                <span></span>
                                            </div>
                                            
                                            <div class="input_position">
                                                <input type="date" name="date_blog" required />
                                                <p>ngày tạo</p>
                                                <span></span>
                                            </div>
                                            
                                            <!-- ảnh -->
                                            <div class="input_position">
                                                <input type="file" name="img_blog" required />
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
</body>
</html>