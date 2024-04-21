<?php 
$page_title = "index";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; ?>

      <!-- MAIN CONTENT||BODY -->
      <div class="main_content">
        <div class="header_wrapper">
            <div class="header_title">
                <span>Primary</span>
                <h2>User</h2>
            </div>
            <div class="user_info">
                <!-- <div class="search_bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search">
                </div> -->
                <a href="#"><img src="../IMG/User.jpg" alt=""></a> <!-- user-image -->
            </div>
        </div>

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

<?php include_once 'layout_foot.php'; ?>