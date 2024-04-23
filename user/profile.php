<?php 
include_once '../config/database.php';
include_once '../object/course.php';
include_once '../object/academic_year.php';

$database = new Database();
$db = $database->getConnection();

$course = new Course($db);
$academic_year = new Academic_year($db);

$page_title = "profile";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 




?>

      <!-- MAIN CONTENT||BODY -->
      <div class="main_content">
        <div class="header_wrapper">
            <div class="header_title">
                <span>Primary</span>
                <h2>User</h2>
            </div>
            <div class="user_info">
            <button onclick="changePicture()" class="profile_btn">Edit</button>
                <img id="userImage" src="../IMG/User.jpg" alt=""> <!-- user-image -->
            </div>
        </div>

        <div class="panel_container">
            <div class="panel_wrapper">
                <form class="account">
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
                <input type="text" placeholder="Firstname" disabled>
            </div>
        </div>
        <div class="account_edit">
            <div class="input_container">
                <label>Last Name</label>
                <input type="text" placeholder="Lastname" disabled>
            </div>
        </div>
        <!-- <div class="account_edit">
            <div class="input_container">
                <label>Gender</label>
                <select name="gender">
                    <optgroup label="Gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="others">Others</option>
                    </select>
            </div>
        </div> -->
        <div class="account_edit">
            <div class="input_container">
                <label>Email</label>
                <input type="text" placeholder="Email" required disabled>
            </div>
        </div>
        <div class="account_edit">
            <div class="input_container">
                <label>Contact Number</label>
                <input type="text" placeholder="+639" required>
            </div>
        </div>
        <div class="account_edit">
            <div class="input_container">
                <label>Year Level</label>
                <?php
                    $stmt = $academic_year->read();

                    echo "<select name='academic_id'>";
                        echo "<option disabled>Select Course</option>";
                        while ($row_course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row_course);
                            echo "<option value='{$id}'>{$academic_year}</option>";
                        }
                    echo "</select>";
                ?>
            </div>
            <div class="input_container">
                <label>Course</label>
                <?php
                    $stmt = $course->read();

                    echo "<select name='course_id'>";
                        echo "<option disabled>Select Course</option>";
                        while ($row_course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row_course);
                            echo "<option value='{$id}'>{$name}</option>";
                        }
                    echo "</select>";
                ?>
            </div>
        </div>
        <div class="account_edit">
            <div class="input_container">
                <label>Address</label>
                <input type="text" placeholder="Address" required>
            </div>
        </div>
    </form>

            </div>
        </div>

<?php include_once 'layout_foot.php'; ?>