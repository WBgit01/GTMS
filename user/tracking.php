<?php 
$page_title = "order";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; ?>


<?php include_once 'layout_foot.php'; ?>

<form action="">
	<div class="search-container">
    <div class="searchform-container">
        <div class="header2">
            <img src="IMG/GTMS_logo1.png" class="logo-searchbar">
            <p1><span class="instruction-text">Instructions:</span> Enter your student ID number in the search bar to view your existing transaction that is encoded in the system. If your transaction is not visible, please contact <a href="mailto:example-admin@gmail.com">example-admin@gmail.com</a> for support. </p1>
        </div>
        <div class="searchform-content">
            <input type="text" name='email' placeholder="School ID" required><br>
            <input type="submit" value='SEARCH'><br>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php'; ?>


