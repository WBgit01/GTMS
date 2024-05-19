<?php 
$id = isset($_GET['oid']) ? $_GET['oid'] : die('Error: ID not Found');
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';
include_once '../object/garment_size.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$garment_size = new Garmentsize($db);

// order id property that will be edited
$order->id = $id;

$order->readOne();

$require_login = true;
include_once '../login_checker.php';

$page_title = "Update request details";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 

if ($_POST) {

    $order->status = "Updated";
    $order->garment_id = $_POST['garment_id'];


    // Update the order details
    if ($order->editRequest()) {
        echo "<div class='message-box-success'>";
            echo "Request details updated.";
        echo "</div>";
    } else {
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
            } elseif ($order->status == "Updated") {
                echo "<div class='status-message-updated'>";
                echo $order->status;
                echo "</div>";
            }
             else {
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

            <?php
                if ($order->gender == "Male") {
                    if ($order->garment_type == "Polo" || $order->garment_type == "Pants" || $order->garment_type == "SHS Polo") {
                        echo "<div class='input_container'>";
                        echo "<label>$order->garment_type</label>";
                        $garment_size->gender = $order->gender;
                        $garment_size->garment_type = $order->garment_type;
                        $stmt = $garment_size->read();
                            echo "<select name='garment_id' required>";
                                echo "<option disabled>Select Polo Size</option>";
                                while ($row_polo_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row_polo_size);          
                                    $garment_id = $row_polo_size['id'];

                                    if ($order->garment_id == $garment_id) {
                                        echo "<option value='{$garment_id}'selected>{$size} - {$garment_measure}</option>";
                                    } else {
                                        echo "<option value='{$id}'>{$size} - {$garment_measure}</option>";
                                    }
                                }
                        echo "</select>";
                    }elseif ($order->garment_type == "PE Polo Shirt") {
                        echo "<label>$order->garment_type</label>";
                        echo "<div class='input_container'>";
                        echo "<label>Polo</label>";
                        $garment_size->gender = $order->gender;
                        $garment_size->garment_type = "Polo";
                        $stmt = $garment_size->read();
                            echo "<select name='polo_id' required>";
                                echo "<option disabled>Select Polo Size</option>";
                                while ($row_polo_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row_polo_size);
                                    echo "<option value='{$id}'>{$size} - {$garment_measure}</option>";
                                }
                        echo "</select>";

                        echo "<label>Pants</label>";
                        $garment_size->gender = $order->gender;
                        $garment_size->garment_type = "Pants";
                        $stmt = $garment_size->read();
                            echo "<select name='pants_id' required>";
                                echo "<option disabled>Select Pants Size</option>";
                                while ($row_pants_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row_pants_size);
                                    echo "<option value='{$id}'>{$size} - {$garment_measure}</option>";

                                }
                        echo "</select>";

                    }
                }elseif ($order->gender == "Female") {
                    if ($order->garment_type == "Blouse" || $order->garment_type == "Skirt" || $order->garment_type =="PE Polo Shirt") {
                        echo "<div class='input_container'>";
                        echo "<label>$order->garment_type</label>";
                        $garment_size->gender = $order->gender;
                        $garment_size->garment_type = $order->garment_type;
                        $stmt = $garment_size->read();
                            echo "<select name='garment_id' required>";
                                echo "<option disabled>Select Blouse Size</option>";
                                while ($row_polo_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row_polo_size);          
                                    $garment_id = $row_polo_size['id'];

                                    if ($order->garment_id == $garment_id) {
                                        echo "<option value='{$garment_id}'selected>{$size} - {$garment_measure}</option>";
                                    } else {
                                        echo "<option value='{$id}'>{$garment_type}-{$size}-{$gender}-{$garment_measure}</option>";
                                    }
                                }
                        echo "</select>";
                    }
                }else{
                    $garment_size->gender = "Both";
                    $garment_size->garment_type = "PE Pants";
                    $stmt = $garment_size->read();
                    echo "<div class='input_container'>";
                    echo "<label>PE Pants</label>";
                        echo "<select name='garment_id' required>";
                            echo "<option disabled>Select Pants Size</option>";
                            while ($row_pe_pants_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row_pe_pants_size);
                                echo "<option value='{$id}'>{$garment_type}-{$size}-{$garment_measure}</option>";

                            }
                    echo "</select>";
                    
                }
            ?>
        </div>
        <div class="btn_container">

            <button class="btn_save">Save</button>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php'; ?>