<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';
include_once '../object/user.php';
include_once '../object/academic_year.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$user = new User($db);
$academic_year = new Academic_year($db);

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

        case 'uniform_men_polo':
            $order->amount = "300.00";
            $order->status = "Pending";
            $order->garment_type = "Polo";
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

            case 'uniform_men_pants':
                $order->amount = "330.00";
                $order->status = "Pending";
                $order->garment_type = "Pants";
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

        case 'uniform_women_blouse':
            $order->amount = "300.00";
            $order->status = "Pending";
            $order->garment_type = "Blouse";
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

        case 'uniform_women_skirt':
            $order->amount = "280.00";
            $order->status = "Pending";
            $order->garment_type = "Skirt";
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
            $order->status = "Pending";
            $order->gender = $_SESSION['gender'];
            $order->student_id = $_SESSION['student_id'];
            $order->garment_type = "PE Attire";
                        
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

<!-- <div class="panel_container"> -->
    <div class="panel_wrapper2">
        <div class="table_detail">
            <h2>School Attire</h2>
            <p>Choose from polo shirts, pants, blouses, skirts, and P.E. uniforms to match
                 your school's dress code. Discover attire that mirrors your school's values
                  and enhances its appearance. Make a statement with our school attire and set the standard for style!
                </p>
        </div>

        <!-----------PANEL 1 COLLEGE MEN----------->
        <div class="grid">
            <?php
            $acad_year = explode(', ', '1, 2, 3, 4');
            if (in_array($_SESSION['academic_year'], $acad_year) && $_SESSION['gender']=='male') {
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>Uniform Men <strong>(Polo ONLY)</strong></div>";
                echo "<div class='price_table'>";
                echo "<b>₱300.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Cream</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<div class='btn2'>";
                echo "<input type='hidden' name='uniform' value='uniform_men_polo'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo"</div>";
                echo "</form>";
            }
            $acad_year = explode(', ', '1, 2, 3, 4');
            if (in_array($_SESSION['academic_year'], $acad_year) && $_SESSION['gender']=='male') {
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>Uniform Men <strong>(Pants ONLY)</strong></div>";
                echo "<div class='price_table'>";
                echo "<b>₱300.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Green</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<div class='btn2'>";
                echo "<input type='hidden' name='uniform' value='uniform_men_pants'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo"</div>";
                echo "</form>";
            }



            //-----------PANEL 2 COLLEGE WOMEN-----------
            if (in_array($_SESSION['academic_year'], $acad_year) && $_SESSION['gender']=='female') {
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>Uniform Women <strong>(Blouse)</strong></div>";
                echo "<div class='price_table'>";
                echo "<b>₱300.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Cream</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<div class='btn2'>";
                echo "<input type='hidden' name='uniform' value='uniform_women_blouse'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo"</div>";
                echo "</form>";
            }
            if (in_array($_SESSION['academic_year'], $acad_year) && $_SESSION['gender']=='female') {
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>Uniform Women <strong>(Skirt)</strong></div>";
                echo "<div class='price_table'>";
                echo "<b>₱300.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Green</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<div class='btn2'>";
                echo "<input type='hidden' name='uniform' value='uniform_women_skirt'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo"</div>";
                echo "</form>";
            }
        

            //-----------PANEL 3 SHS-COLLEGE P/E-----------
            $Acad_Year = explode(', ', '1, 2, 3, 4, 5');
            if (in_array($_SESSION['academic_year'], $Acad_Year) && $_SESSION['gender']=='male' || $_SESSION['gender']=='female') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>PE Attire <strong>(Polo ONLY)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱300.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Green</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='pe_attire'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            if (in_array($_SESSION['academic_year'], $Acad_Year) && $_SESSION['gender']=='male' || $_SESSION['gender']=='female') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>PE Attire <strong>(Pants ONLY)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱300.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Green</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='pe_attire'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }


            //-----------PANEL 4 SHS MEN-----------
            $acad_Year = explode(', ', '5');
            if (in_array($_SESSION['academic_year'], $acad_Year) && $_SESSION['gender']=='male') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>Uniform Men <strong>(Polo ONLY)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱310.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Gray</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='shs_uniform'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            if (in_array($_SESSION['academic_year'], $acad_Year) && $_SESSION['gender']=='male') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>Uniform Men <strong>(Pants ONLY)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱320.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Gray</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='shs_uniform'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }


            //-----------PANEL 5 SHS WOMEN-----------
            if (in_array($_SESSION['academic_year'], $acad_Year) && $_SESSION['gender']=='female') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>Uniform Women <strong>(Blouse)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱320.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: White</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='shs_uniform'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            if (in_array($_SESSION['academic_year'], $acad_Year) && $_SESSION['gender']=='female') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<div class='title_box'>Uniform Women <strong>(Skirt)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱320.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Gray</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='shs_uniform'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }
            ?>
        </div>
    </div>
</div>

<?php include_once 'layout_foot.php'; ?>
