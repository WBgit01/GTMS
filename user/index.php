<?php 
include_once '../config/core.php';
$require_login = true;
include_once '../login_checker.php';

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
                <span>Username</span>
                <a href="#"><img src="../IMG/User.jpg" alt=""></a> <!-- user-image -->
            </div>
        </div>

<div class="panel_container">
            <h3 class="main_title">Data Sample</h3>
            <div class="panel_wrapper">
              
                    </div>
                </div>
            </div>
        </div>

<?php include_once 'layout_foot.php'; ?>