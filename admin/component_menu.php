<div class="sidebar">
    <a class="logo-expand" href="">skateboard</a>

    <div class="side-wrapper">
        <div class="side-title">MENU</div>
        <div class="side-menu">
            <a class="sidebar-link discover is-active" href="index.php">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z" />
                </svg>
                Home
            </a>

            <a class="sidebar-link trending" href="employee.php">
                <i class="db_icon fa-solid fa-user"></i>
                Employee management
            </a>

            <a class="sidebar-link trending" href="customer.php">
                <i class="db_icon fa-solid fa-users"></i>
                Customer management
            </a>

            <a class="sidebar-link" href="product.php">
                <i class="db_icon fa-solid fa-store"></i>
                Product Management
            </a>

            <a class="sidebar-link" href="order.php">
                <i class="db_icon fa-solid fa-newspaper"></i>
                Order management
            </a>

            <a class="sidebar-link" href="invoice.php">
                <i class="db_icon fa-solid fa-receipt"></i>
                Invoice Management
            </a>

            <a class="sidebar-link" href="blog.php">
                <i class="db_icon fa-solid fa-newspaper"></i>
                Blog management
            </a>
        </div>
    </div>

    <div class="side-wrapper">
        <div class="side-title">SETTING</div>
        <div class="side-menu">
            <a class="sidebar-link" href="process_logout_admin.php" onclick="return confirmLogout();">
                <i class="db_icon fa-solid fa-gear"></i>
                Log Out
            </a>

            <!-- <a class="sidebar-link" href="privacy.php">
                <i class="db_icon fa-solid fa-file-contract"></i>
                Privacy
            </a> -->
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirmLogout() {
        return confirm("Are you sure you want to log out?");
    }
</script>