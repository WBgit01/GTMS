<?php 

include_once 'layout_head.php';
include_once 'sidebar.php'; 


?>
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
                <a href="#"><img src="../IMG/Admin.jpg" alt=""></a> <!-- admin-image -->
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
<?php include_once 'layout_foot.php'; ?>