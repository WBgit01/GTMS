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

$page_title = "Alerts";
$require_login = true;
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';
?>

<div class="table_wrapper">
  <link rel="stylesheet" href="../libs/css/alerts.css"/>

  
    <ul class="alerts-list">
      <li class="alert-item alert-critical">
        <div class="alert-message">Machine 1 is offline!</div>
        <div class="alert-time">5 minutes ago</div>
        <button class="alert-dismiss-btn" onclick="dismissAlert(this)">Dismiss</button>
      </li>
      <li class="alert-item alert-critical">
        <div class="alert-message">Revenue dropped below threshold on Machine 3.</div>
        <div class="alert-time">12 minutes ago</div>
        <button class="alert-dismiss-btn" onclick="dismissAlert(this)">Dismiss</button>
      </li>
      <li class="alert-item alert-critical">
        <div class="alert-message">New software update available.</div>
        <div class="alert-time">1 hour ago</div>
        <button class="alert-dismiss-btn" onclick="dismissAlert(this)">Dismiss</button>
      </li>
      <li class="alert-item alert-critical">
        <div class="alert-message">Machine 4 is experiencing intermittent connectivity issues."</div>
        <div class="alert-time">1 hour ago</div>
        <button class="alert-dismiss-btn" onclick="dismissAlert(this)">Dismiss</button>
      </li>
      <li class="alert-item alert-critical">
        <div class="alert-message">Machine 3 has not reported revenue updates in the past hour.</div>
        <div class="alert-time">1 hour ago</div>
        <button class="alert-dismiss-btn" onclick="dismissAlert(this)">Dismiss</button>
      </li>
      <li class="alert-item alert-critical">
        <div class="alert-message">Partial data loss detected during last sync attempt.</div>
        <div class="alert-time">1 hour ago</div>
        <button class="alert-dismiss-btn" onclick="dismissAlert(this)">Dismiss</button>
      </li>
    </ul>
</div>

<script>
function dismissAlert(button) {
  const alertItem = button.closest('.alert-item');
  alertItem.style.transition = 'opacity 0.3s ease';
  alertItem.style.opacity = '0';
  setTimeout(() => alertItem.remove(), 300);
}
</script>

<?php include_once 'layout_foot.php'; ?>
