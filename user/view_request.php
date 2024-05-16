<?php 
$id = isset($_GET['oid']) ? $_GET['oid'] : die('Error: ID not Found');
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';
include_once '../object/garment_size.php';
include_once '../object/user.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$garment_size = new Garmentsize($db);

// order id property that will be edited
$order->id = $id;

$order->readOne();

$require_login = true;
include_once '../login_checker.php';

$page_title = "Request details";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; ?>

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


<div class = "invoice-wrapper" id = "print-area">
            <div class = "invoice">
                <div class = "invoice-container">
                    <div class = "invoice-head">
                        <div class = "invoice-head-top">
                            <div class = "invoice-head-top-left text-start">
                                <img src = "../IMG/GTMS_logo1.png">
                            </div>
                            <div class = "invoice-head-top-right text-end">
                                <h3>Invoice</h3>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-middle">
                            <div class = "invoice-head-middle-left text-start">
                                <p><span class = "text-bold">Date: </span>00-00-00 | 00:00:00</p> <!-- date time function -->
                            </div>
                            <div class = "invoice-head-middle-right text-end">
                                <p><spanf class = "text-bold">Reference No: </span><?php echo $order->reference_no; ?></p>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-bottom">
                            <div class = "invoice-head-bottom-left">
                                <ul>
                                    <li class = 'text-bold'>Invoiced To:</li>
                                    <li>Name of user</li> <!-- user name function -->
                                    <li>Id of student</li> <!-- student id function -->
                                    <li>Address of user</li> <!-- Address function -->
                                    <!-- <li></li> -->
                                </ul>
                            </div>
                            <div class = "invoice-head-bottom-right">
                                <ul class = "text-end">
                                    <li class = 'text-bold'>Pay To:</li>
                                    <li>Garments Inc.</li>
                                    <li>Marinduque, Philippines</li>
                                    <!-- <li></li> -->
                                    <li>gtms@mail.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "overflow-view">
                        <div class = "invoice-body">
                            <table>
                                <thead>
                                    <tr>
                                        <td class = "text-bold">Service</td>
                                        <td class = "text-bold">Description</td>
                                        <td class = "text-bold">Rate</td>
                                        <td class = "text-bold">QTY</td>
                                        <td class = "text-bold">Amount</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sample 1</td>
                                        <td>Creating a website design</td>
                                        <td>$50.00</td>
                                        <td>10</td>
                                        <td class = "text-end">$500.00</td>
                                    </tr>
                                    <tr>
                                        <td>Sample 2</td>
                                        <td>Website Development</td>
                                        <td>$50.00</td>
                                        <td>10</td>
                                        <td class = "text-end">$500.00</td>
                                    </tr>
                                    <tr>
                                        <td>Sample 3</td>
                                        <td>Uniform Men</td>
                                        <td>$50.00</td>
                                        <td>10</td>
                                        <td class = "text-end">$500.00</td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="4">10</td>
                                        <td>$500.00</td>
                                    </tr> -->
                                </tbody>
                            </table>
                            <div class = "invoice-body-bottom">
                                <div class = "invoice-body-info-item border-bottom">
                                    <div class = "info-item-td text-end text-bold">Sub Total:</div>
                                    <div class = "info-item-td text-end">$2150.00</div>
                                </div>
                                <div class = "invoice-body-info-item border-bottom">
                                    <div class = "info-item-td text-end text-bold">Tax:</div>
                                    <div class = "info-item-td text-end">$215.00</div>
                                </div>
                                <div class = "invoice-body-info-item">
                                    <div class = "info-item-td text-end text-bold">Total:</div>
                                    <div class = "info-item-td text-end">$21365.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "invoice-foot text-center">
                        <p><span class = "text-bold text-center">NOTE:&nbsp;</span>This is computer generated receipt and does not require physical signature.</p>

                        <div class = "invoice-btns">
                            <button type = "button" class = "invoice-btn" onclick="printInvoice()">
                                <span>
                                    <i class="fa-solid fa-print"></i>
                                </span>
                                <span>Print</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once 'layout_foot.php'; ?>






        <!-- <div class="input_container">
            <label>Reference No.</label>
            <input type="text" value="<?php //echo $order->reference_no; ?>" disabled>
        </div>
        <div class="input_container">
            <label>Amount</label>
            <input type="text" value="<?php //echo $order->amount; ?>" disabled>
        </div>

        <div class="input_container">
            <label>Garment Type</label>
            <input type="text" value="<?php //echo $order->garment_type; ?>" disabled>
        </div>

        <div class="input_container">
            <label>Garment Measure</label>
            <?php
                //$garment_size->id = $order->garment_id;
                //$garment_size->readGarmentmeasure();
                //echo "<input type='text' value='{$garment_size->garment_measure}' disabled>";
            ?>
                <label>Size</label>
            <?php
                //$garment_size->id = $order->garment_id;
                //$garment_size->readGarmentmeasure();
                //echo "<input type='text' value='{$garment_size->size}' disabled>";
            ?>
        </div>
        </div>
    </div>
</div> -->


