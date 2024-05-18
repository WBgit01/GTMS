<?php 

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/transaction.php';
include_once '../object/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$transaction = new Transaction($db);


$page_title = "Dashboard";
$require_login = true;
$isAccessible = $_SESSION['isAccessible'];
include_once '../login_checker.php';



include_once 'sidebar.php'; 
include_once 'layout_head.php';

$stmt = $transaction->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

$user_count = $user->countUser();
$transaction_count = $transaction->countTransaction();

?>

<!-- PANEL-CONTAINER -->
<div class="panel_container">
    <h3 class="main_title">Statistics</h3>
    <div class="panel_wrapper">
        <!-- PANEL-1 -->
        <div class="panel_content lightcolor-1">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Sales</span>
                    <span class="amount_value">500</span>
                </div>
                <i class="fa-solid fa-peso-sign icon darkcolor-1"></i>
            </div>
        </div>

        <!-- PANEL-2 -->
        <div class="panel_content lightcolor-2">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Users</span>
                    <span class="amount_value"><?php echo $user_count;?></span>
                </div>
                <i class="fa-solid fa-users icon darkcolor-2"></i>
            </div>
        </div>

        <!-- PANEL-3 -->
        <div class="panel_content lightcolor-3">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Orders</span>
                    <span class="amount_value"><?php echo $transaction_count;?></span>
                </div>
                <i class="fa-solid fa-cart-plus icon darkcolor-3"></i>
            </div>
        </div>

        <!-- PANEL-4 -->
        <div class="panel_content lightcolor-4">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Products</span>
                    <span class="amount_value">500</span>
                </div>
                <i class="fa-regular"></i>
                <i class="fa-solid  fa-rectangle-list icon darkcolor-4"></i>
            </div>
        </div>
    </div>
</div>

<!-- TABLE-DATA -->
<?php 
    include_once 'orders.php';
    include_once 'layout_foot.php'; ?>