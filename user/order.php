<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';
include_once '../object/user.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$user = new User($db);


// to show profile for each webpage
$user_id = $_SESSION['user_id'];
$user->getProfileimage($user_id);

$require_login = true;
include_once '../login_checker.php';

$page_title = "Order Form";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 

$order->student_id = $_SESSION['student_id'];
$order_count = $order->countOrder();

if ($_POST) {
    switch ($_POST['uniform']) {
        case 'uniform_men':
            $order->amount = "300.00";
            $order->size_height = "";
            $order->size_width = "";
            $order->garment_type = "Uniform Men";
            $order->status = "Pending";
            $order->gender = $_SESSION['gender'];
            $order->student_id = $_SESSION['student_id'];
            
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
            break;
    
        case 'uniform_woman':
            $order->amount = "300.00";
            $order->size_height = "";
            $order->size_width = "";
            $order->garment_type = "Uniform Woman";
            $order->status = "Pending";
            $order->gender = $_SESSION['gender'];
            $order->student_id = $_SESSION['student_id'];
                
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;

        case 'pe_attire':
            $order->amount = "350.00";
            $order->size_height = "";
            $order->size_width = "";
            $order->garment_type = "PE Attire";
            $order->status = "Pending";
            $order->gender = $_SESSION['gender'];
            $order->student_id = $_SESSION['student_id'];
                        
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;

        case 'shs_uniform':
            $order->amount = "350.00";
            $order->size_height = "";
            $order->size_width = "";
            $order->garment_type = "SHS Uniform";
            $order->status = "Pending";
            $order->gender = $_SESSION['gender'];
            $order->student_id = $_SESSION['student_id'];
                        
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;
        
        default:
            # code...
            break;
    }
}


?>


    <div class="panel_container">
        <div class="panel_wrapper2">
            <div class="table_detail">
                <h2>School Attire</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci voluptas 
                    sapiente molestiae aut laboriosam aliquam sint earum distinctio eaque perspiciatis? 
                    Enim qui itaque iure, quibusdam cum vel dolorum nostrum nam!
                </p>
            </div>

            <!-- PANEL 1 -->
            <div class="grid">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
                            <input type="hidden" name="uniform" value="uniform_men">
                            <button type="submit">Get This Now</button>
                        </div>
                    </div>
                </form>

                <!-- PANEL 2 -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
                        <input type="hidden" name="uniform" value="uniform_woman">
                        <div class="btn2">
                            <button type="submit">Get This Now</button>
                        </div>
                    </div>
                </form>

                <!-- PANEL 3 -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
                        <input type="hidden" name="uniform" value="pe_attire">
                        <div class="btn2">
                            <button type="submit">Get This Now</button>
                        </div>
                    </div>
                </form>

                <!-- PANEL 4 -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
                        <input type="hidden" name="uniform" value="shs_uniform">
                        <div class="btn2">
                            <button type="submit">Get This Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'layout_foot.php'; ?>
