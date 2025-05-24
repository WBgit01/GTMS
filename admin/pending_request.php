<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/transaction.php';
include_once '../object/order.php';
include_once '../object/user.php';


$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$user = new User($db);
$transaction = new Transaction($db);

$page_title = "System Settings";
$require_login = true;
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';

// Fetch orders
$stmt = $order->readUpdatedRequests();
$num = $stmt->rowCount();

$user_count = $user->countUser();
?>


    <div class="table_wrapper">
      <link rel="stylesheet" href="../libs/css/system_settings.css" />

      
      <div class="settings-buttons">
        <button class="settings-btn">
          <span class="btn-title">Profile Settings</span>
          <span class="btn-description">Manage your account details such as name, email, contact number, and address.</span>
        </button>
        <button class="settings-btn">
          <span class="btn-title">Password Settings</span>
          <span class="btn-description">Manage your account password and security.</span>
        </button>
        <button class="settings-btn">
          <span class="btn-title">Machine Settings</span>
          <span class="btn-description">Add, edit, or remove vending machines from the system. You can update each machine’s name and location here.</span>
        </button>
        <button class="settings-btn">
          <span class="btn-title">Alert Settings</span>
          <span class="btn-description">Set up alerts to know when something needs your attention, and pick how to get notified.</span>
        </button>
      </div>


    </div>

<?php include_once 'layout_foot.php'; ?>


