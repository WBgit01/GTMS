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

$page_title = "Update request details";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 

if ($_POST) {
    
    $order->size_height = $_POST['size_height'];
    $order->size_width = $_POST['size_width'];

    if ($order->updateRequest()) {
        echo "<div class='message-box-success'>";
            echo "Request details updated.";
        echo "</div>";
    }else{
        echo "<div class='message-box-failed'>";
        echo "ERROR: Update details failed";
    echo "</div>";
    }
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?oid={$id}"; ?>" method="POST">
    <div class="panel_container" id="profile-container">
        <div class="panel_wrapper">

            <?php 
            if ($order->status == "Declined") {
                echo "<div class='status-message-declined'>";
                echo $order->status;
                echo "</div>";
            } elseif ($order->status == "Approved") {
                echo "<div class='status-message-approved'>";
                echo $order->status;
                echo "</div>";
            } else {
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
                <label>Men Pants</label>
                <select name="size_height">
                    <option value="" disabled>Select Size</option>
                    <option value="Small (Men Pants)">(Small)Length: 39-40 inches Hips: 38-41 inches Waist - 29-32 inches</option>
                    <option value="Medium (Men Pants)">(Small)Length: 39-40 inches Hips: 38-41 inches Waist - 29-32 inches</option>
                    <option value="Medium(Men Pants)">(Small)Length: 39-40 inches Hips: 38-41 inches Waist - 29-32 inches</option> 
                </select>
            </div>

            <div class="input_container">
                <label>Men Blouse</label>
                <select name="size_width">
                    <option value="" disabled>Select Size</option>
                    <option value="Small (Men Blouse)">(Small) Length 27 to 28 inches Width 40 to 42 inches Shoulder 16 to 17 inches</option>
                    <option value="Medium (Men Blouse)" >(Medium) Length: 28 to 29 inches Width: 43 to 44 inches Shoulder: 18 to 19 inches</option>
                    <option value="Large (Men Blouse)">(Large) Length: 29 to 30 inches Width: 45 to 48 inches Shoulder: 20 to 22 inches</option>
                </select>
            </div>
            <div class="btn_container">
                <button class="btn_cancel">Cancel</button>
                <button class="btn_save">Save</button>
            </div>
        </div>
    </div>
</form>


<?php include_once 'layout_foot.php'; ?>