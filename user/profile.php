<?php 
include_once '../config/core.php';

$require_login = true;
include_once '../login_checker.php';
include_once '../config/database.php';
include_once '../object/course.php';
include_once '../object/academic_year.php';
include_once '../object/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$course = new Course($db);
$academic_year = new Academic_year($db);


$page_title = "Profile";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 

$user_id = $_SESSION['user_id'];
$user->id = $user_id;

$user->readOne();



if ($_POST) {
    $image=!empty($_FILES["image"]["name"])
            ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
    $user->image_profile = $image;

    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->gender = $_POST['gender'];
    $user->academic_year = $_POST['academic_year'];
    $user->contact_no = $_POST['contact_no'];
    $user->course = $_POST['course'];
    $user->address = $_POST['address'];

    if ($user->updateProfile()) {
        echo $user->uploadPhoto();
        echo "<div class='message-box-success'>";
            echo "Profile Updated";
        echo "</div>";
    }else{
        echo "<div class='message-box-failed'>";
            echo "Please try again later.";
        echo "</div>";
    }
}



?>



<div class="panel_container" id="profile-container">
    <div class="panel_wrapper">
        <form class="account" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="account_header">
                <h1 class="account_title">Account Setting</h1>
                <div class="btn_container">
                    <button class="btn_cancel">Cancel</button>
                    <button class="btn_save">Save</button>
                </div>
            </div>
            <div class="account_edit">
                <div class="input_container">
                    <label>First Name</label>
                    <input type="text" placeholder="Firstname" name="firstname" value="<?php echo $user->firstname;?>">
                </div>
                <div class="input_container">
                    <label>Last Name</label>
                    <input type="text" name="lastname" placeholder="Lastname" value="<?php echo $user->lastname;?>">
                </div>
            </div>
            <div class="account_edit">
                <div class="input_container">
                    <label disabled name="gender">Gender</label>
                    <select name="gender">
                        <optgroup label="Gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </optgroup>
                    </select>
                </div>

                <div class="input_container">
                    <label>Email</label>
                    <input type="text" name="email_address" placeholder="Email" value="<?php echo $user->email_address;?>" required disabled>
                </div>
            </div>
            <div class="account_edit">

            </div>
            <div class="account_edit">
                <div class="input_container">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address" value="<?php echo $user->address;?>" required>
                </div>
                <div class="input_container">
                    <label>Contact Number</label>
                    <input type="text" name="contact_no" placeholder="+639" value="<?php echo $user->contact_no;?>" required>
                </div>
            </div>
            <div class="account_edit">
                <div class="input_container">
                    <label>Year Level</label>
                    <?php
                        $stmt = $academic_year->read();
                        echo "<select name='academic_year'>";
                        echo "<option disabled selected>Select Academic Year</option>";
                        while ($row_academic = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $academic_id = $row_academic['id'];
                            $academic_year_name = $row_academic['academic_year'];

                            if ($user->academic_year==$academic_id) {
                                echo "<option value='$academic_id' selected>";
                            }else{
                                echo "<option value='$academic_id'>";
                            }
                            echo "$academic_year_name</option>";
                        }
                        echo "</select>";
                    ?>
                </div>
                <div class="input_container">
                    <label>Course</label>
                    <?php
                    $stmt = $course->read();
                    echo "<select name='course'>";
                    echo "<option disabled>Select Course</option>";
                    while ($row_course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $course_id = $row_course['id'];
                        $course_name = $row_course['name'];

                        if ($user->course==$course_id) {
                            echo "<option value='$course_id' selected>";
                        }else{
                            echo "<option value='$course_id'>";
                        }
                        echo "$course_name</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
            </div>
            <div class="account_edit">
            <div class="input_container">
                    <label>Profile Image</label>
                    <input type="file" name="image" placeholder="+639" required>
                </div>
            </div>
        </form>
    </div>
</div>



<?php include_once 'layout_foot.php'; ?>