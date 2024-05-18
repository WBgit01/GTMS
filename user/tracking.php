<?php 
$page_title = "Track Order";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; ?>

<form action="">
	<div class="search-container">
    <div class="searchform-container">
        <div class="header2">
            <img src="../IMG/GTMS_logo1.png" class="logo-searchbar">
            <p1><span class="instruction-text">Instructions:</span> To find your transaction details,
             type your Order ID number into the search bar. This will show you the transactions already
              saved in the system. If you can't see your transaction, you can reach out to <a href="mailto:example-admin@gmail.com">
                example-admin@gmail.com</a> for help. we'll assist you in finding what you need.</p1>

                
        </div>
        <div class="searchform-content">
            <input type="text" name='email' placeholder="Order ID" required><br>
            <input type="submit" value='SEARCH'><br>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php'; ?>


