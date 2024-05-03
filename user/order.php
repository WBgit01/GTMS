<?php 
include_once '../config/core.php';
$require_login = true;
include_once '../login_checker.php';

$page_title = "order";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 
?>

<div class="main_content">
    <div class="header_wrapper">
        <div class="header_title">
            <h2>Order Page</h2>
        </div>
        <div class="user_info">
            <?php echo isset($_SESSION['profile_image']) ? "<img src='uploads/{$_SESSION['user_id']}/{$_SESSION['profile_image']}' alt='User Image'>" : "No image found."; ?>
        </div>
    </div>

    <div class="panel_container">
        <div class="panel_wrapper2">
            <div class="table_detail">
                <h2>School Attire</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci voluptas 
                    sapiente molestiae aut laboriosam aliquam sint earum distinctio eaque perspiciatis? 
                    Enim qui itaque iure, quibusdam cum vel dolorum nostrum nam!</p>
            </div>
            <!-----PANEL 1----->
            <div class="grid">
                <div class="box bx1">
                    <div class="title_box">Uniform Men</div>
                    <div class="price_table">
                        <b>₱300.00</b>
                    </div>
                    <div class="features">
                        <div>Size: 19, 20, 21</div>
                        <div>Color: Beige</div>
                        <div>Quantity: 1</div>
                        <div>Sample</div>
                    </div>
                    <div class="btn2">
                        <button>Inquire Now</button>
                    </div>
                </div>

            <!-----PANEL 2----->
                <div class="box bx1">
                    <div class="title_box">Uniform Women</div>
                    <div class="price_table">
                        <b>₱300.00</b>
                    </div>
                    <div class="features">
                        <div>Size: 19, 20, 21</div>
                        <div>Color: Beige</div>
                        <div>Quantity: 1</div>
                        <div>Sample</div>
                    </div>
                    <div class="btn2">
                        <button>Inquire Now</button>
                    </div>
                </div>

             <!-----PANEL 3----->
                <div class="box bx1">
                    <div class="title_box">PE Attire</div>
                    <div class="price_table">
                        <b>₱300.00</b>
                    </div>
                    <div class="features">
                        <div>Size: 19, 20, 21</div>
                        <div>Color: Green</div>
                        <div>Quantity: 1</div>
                        <div>Sample</div>
                    </div>
                    <div class="btn2">
                        <button>Inquire Now</button>
                    </div>
                </div>

             <!-----PANEL 4----->
                <div class="box bx1">
                    <div class="title_box">SHS Uniform</div>
                    <div class="price_table">
                        <b>₱300.00</b>
                    </div>
                    <div class="features">
                        <div>Size: 19, 20, 21</div>
                        <div>Color: Gray</div>
                        <div>Quantity: 1</div>
                        <div>Sample</div>
                    </div>
                    <div class="btn2">
                        <button>Inquire Now</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once 'layout_foot.php'; ?>