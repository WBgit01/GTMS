<!DOCTYPE html>
<html lang="en">
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
                <a href="#">
                    <i class="fa-regular fa-rectangle-list"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-regular fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-file-circle-question"></i>
                    <span>Example1</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-file-circle-question"></i>
                    <span>Example2</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-file-circle-question"></i>
                    <span>Example3</span>
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

    <!-- MAIN CONTENT||BODY -->
    <div class="main_content">
        <div class="header_wrapper">
            <div class="header_title">
                <span>Primary</span>
                <h2>Admin Dashboard</h2>
            </div>
            <div class="user_info">
                <div class="search_bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="IMG/Admin.jpg" alt=""> <!-- admin-image -->
            </div>
        </div>

        <!-- PANEL-CONTAINER -->
        <div class="panel_container">
            <h3 class="main_title">Data Sample</h3>
            <div class="panel_wrapper">
                <!-- PANEL-1 -->
                <div class="panel_content lightcolor-1">
                    <div class="panel_header">
                        <div class="amount">
                            <span class="title">Example 1</span>
                            <span class="amount_value">500</span>
                        </div>
                        <i class="fa-solid fa-peso-sign icon darkcolor-1"></i>
                    </div>
                </div>
                <!-- PANEL-2 -->
                <div class="panel_content lightcolor-2">
                    <div class="panel_header">
                        <div class="amount">
                            <span class="title">Example 2</span>
                            <span class="amount_value">500</span>
                        </div>
                        <i class="fa-solid fa-users icon darkcolor-2"></i>
                    </div>
                </div>
                <!-- PANEL-3 -->
                <div class="panel_content lightcolor-3">
                    <div class="panel_header">
                        <div class="amount">
                            <span class="title">Example 3</span>
                            <span class="amount_value">500</span>
                        </div>
                        <i class="fa-solid fa-rectangle-list icon darkcolor-3"></i>
                    </div>
                </div>
                <!-- PANEL-4 -->
                <div class="panel_content lightcolor-4">
                    <div class="panel_header">
                        <div class="amount">
                            <span class="title">Example 4</span>
                            <span class="amount_value">500</span>
                        </div>
                        <i class="fa-solid fa-check icon darkcolor-4"></i>
                    </div>
                </div>
            </div>
        </div>
                <!-- TABLE-DATA -->
                <div class="table_wrapper">
                    <h3 class="main_title">Data List</h3>
                    <div class="table_container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Student ID</th>
                                    <th>Payment Status</th>
                                    <th>Order Created</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                             <tbody>
                                <!-- DATA HERE -->
                                <!-- SAMPLE DATA 1 -->
                                 <tr>
                                    <td>0120921</td>
                                    <td>22B0921</td>
                                    <td>FULLY PAID</td>
                                    <td>02-22-24 14:20:07</td>
                                    <td>READY TO PICK-UP</td>
                                    <td><a href="#"><button class="data_btn">Edit</button></a></td>
                                </tr>
                                <!-- SAMPLE DATA 2 -->
                                <tr>
                                    <td>0140915</td>
                                    <td>23B0823</td>
                                    <td>PARTIAL</td>
                                    <td>03-21-24 12:02:06</td>
                                    <td>PENDING</td>
                                    <td><a href="#"><button class="data_btn">Edit</button></a></td>
                                </tr>
                                <!-- SAMPLE DATA 3 -->
                                <tr>
                                    <td>425391</td>
                                    <td>22C1921</td>
                                    <td>FULLY PAID</td>
                                    <td>04-07-24 09:57:33</td>
                                    <td>PENDING</td>
                                    <td><a href="#"><button class="data_btn">Edit</button></a></td>
                                </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="table_foot">EXAMPLE TABLE FOOTER</td>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
