<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/css/admin-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard</title>

</head>
<body>
    <!-- SIDEBAR PANEL -->
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="dash">
                <a href="index-admin.php">
                    <i class="fa-brands fa-dashcube"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="sales.php">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Sales</span>
                </a>
            </li>
            <li>
                <a href="product_list.php">
                    <i class="fa-regular fa-rectangle-list"></i>
                    <span>Product List</span>
                </a>
            </li>
            <li>
                <a href="users_admin.php">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="logout">
                <a href="#">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</body>