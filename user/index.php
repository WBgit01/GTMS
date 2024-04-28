<?php 
include_once '../config/core.php';
$require_login = true;


$page_title = "index";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 
?>


      <!-- MAIN CONTENT||BODY -->
      <div class="main_content">
        <div class="header_wrapper">
            <div class="header_title">
                <span>Welcome Back!</span>
                <h2><?php 
                        echo $_SESSION['firstname']; 
                        echo " ";
                        echo $_SESSION['lastname']; 
                    ?></h2>
            </div>
            <div class="user_info">
                <span>Username</span>
                <?php echo isset($_SESSION['profile_image']) ? "<img src='uploads/{$_SESSION['user_id']}/{$_SESSION['profile_image']}' alt='User Image'>" : "No image found.";?>
            </div>
        </div>

<div class="panel_container">
            <h3 class="main_title">Data Sample</h3>
            <div class="panel_wrapper">
              
                    </div>
                </div>
            </div>
        </div>


<?php 

    include_once 'layout_foot.php'; 
?>