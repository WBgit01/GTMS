<?php 
$id = isset($_GET['oid']) ? $_GET['oid'] : die('Error: ID not Found');
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);

// order id property that will be edited
$order->id = $id;

$order->readOne();

$require_login = true;
include_once '../login_checker.php';

$page_title = "Request details";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; ?>


<div class="panel_container" id="profile-container">
    <div class="panel_wrapper">
        <?php 
            if ($order->status == "Declined") {
                echo "<div class='status-message-declined'>";
                    echo $order->status;
                echo "</div>";
            }elseif($order->status == "Approved"){
                echo "<div class='status-message-approved'>";
                    echo $order->status;
                echo "</div>";
            }else{
                echo "<div class='status-message-pending'>";
                    echo $order->status;
                echo "</div>";
            }
        ?>
        <div class="input_container">
            <label>Reference No.</label>
            <input type="text" value="<?php echo $order->reference_no; ?>" disabled>
        </div>
        <div class="input_container">
            <label>Amount</label>
            <input type="text" value="<?php echo $order->amount; ?>" disabled>
        </div>

        <div class="input_container">
            <label>Garment Type</label>
            <input type="text" value="<?php echo $order->garment_type; ?>" disabled>
        </div>

        <div class="input_container">
            <label>Size Height</label>
            <input type="text" value="<?php echo $order->size_height; ?>" disabled>
            <label>Size Width</label>
            <input type="text" value="<?php echo $order->size_width; ?>" disabled>
        </div>
    </div>
</div>


<?php include_once 'layout_foot.php'; ?>