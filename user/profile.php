<?php 
include_once '../config/core.php';
$require_login = true;
include_once '../login_checker.php';

$page_title = "profile";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; ?>

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
                <label>Firstname</label>
                <input type="text" placeholder="Firstname" disabled>
            </div>
        </div>
        <div class="account_edit">
            <div class="input_container">
                <label>Lastname</label>
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
                <input type="text" placeholder="Email" required>
            </div>
        </div>
        <div class="account_edit">
            <div class="input_container">
                <label>Contact no</label>
                <input type="text" placeholder="Contact no" required>
            </div>
        </div>
        <div class="account_edit">
            <div class="input_container">
                <label>Year Level</label>
                <input type="text" placeholder="Year Level" required>
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