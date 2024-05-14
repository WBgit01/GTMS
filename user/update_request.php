<?php 
$id = isset($_GET['oid']) ? $_GET['oid'] : die('Error: ID not Found');

// database && object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);


// set the id property for order to be edited;
$order->id = $id;

// read the details of the product to be edited
$order->readOne();


$require_login = true;
include_once '../login_checker.php';

$page_title = "Update details";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 
if ($_POST) {
    # code...
}
?>


<div class="panel_container" id="profile-container">
    <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="panel_wrapper">
                <?php 
                    if ($order->status == "Approved") {
                        echo "<div class='status-message-approved'>";
                            echo $order->status;
                        echo "</div>";
                    }elseif($order->status == "Pending"){
                        echo "<div class='status-message-pending'>";
                            echo $order->status;
                        echo "</div>";
                    }else{
                        echo "<div class='status-message-declined'>";
                            echo $order->status;
                        echo "</div>";
                    }
                ?>

                <div class="input_container">
                    <label>Reference No</label>
                    <input type="text" name="reference_no" value="<?php echo $order->reference_no;?>" disabled>
                </div>

                <div class="input_container">
                    <label>Amount</label>
                    <input type="text" name="lastname" placeholder="Lastname" value="<?php  echo "$ " .$order->amount; ?>" disabled>
                </div>

                <div class="input_container">
                    <label>Garment Type</label>
                    <input type="text" name="garment_type" value="<?php echo $order->garment_type;?>" disabled>
                </div>

                <div class="account_edit">
                    <div class="input_container">
                        <label>Size (width)</label>
                        <input type="text" name="garment_type" value="<?php echo $order->size_width;?>">
                    </div>
                    <div class="input_container">
                        <label>Size (height)</label>
                        <input type="text" name="garment_type" value="<?php echo $order->size_width?>">
                    </div>
                </div>
            </div>
            <button class='btn_save' type="submit">Save</button>
        </div>
    </form>
</div>



<?php include_once 'layout_foot.php'; ?>