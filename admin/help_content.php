<?php
include_once '../config/core.php';
include_once '../config/database.php';


$database = new Database();
$db = $database->getConnection();


$page_title = "Troubleshoot Guide";
$require_login = true;
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';

?>

<div class='table_container'>
        <table>
        <thead>
            <th>Why is the admin dashboard not loading or running slowly?</th>
        </thead>
        <tbody>
            <th>This usually happens due to server overload, poor internet connection, or outdated software; try restarting the server, checking your internet, clearing cache, and updating the dashboard software.</th>
        </tbody>
        <thead>
            <th>What should I do if sales data is not syncing across multiple Piso WiFi units?</th>
        </thead>
        <tbody>
            <th>Check the internet connection on all units, review synchronization logs for errors, and restart the syncing services or devices to restore proper data flow.</th>
        </tbody>
        <thead>
            <th>Why can’t the admin log in to the centralized system?</th>
        </thead>
        <tbody>
            <th>Incorrect credentials, account lockout, or server authentication issues may cause this; reset your password, verify account status, and ensure the server authentication service is operational.</th>
        </tbody>
        <thead>
            <th>What causes devices to show offline on the dashboard?</th>
        </thead>
        <tbody>
            <th>Devices may be offline due to power outages, network issues, or hardware problems; check power supply, reboot the device, inspect connections, and update firmware if necessary.</th>
        </tbody>
        <thead>
            <th>Why are some coin transactions not recorded in the system?</th>
        </thead>
        <tbody>
            <th>Database errors, payment gateway issues, or software bugs can cause this; check payment integrations, review transaction logs, restart services, and apply software patches.</th>
        </tbody>
        <thead>
            <th>How come alerts and notifications are not received?</th>
        </thead>
        <tbody>
            <th>This can happen if email/SMS settings are incorrect or if the notification server is down; verify notification settings, test sending manually, and restart notification services</th>
        </tbody>
        <thead>
            <th>What if firmware or software updates keep failing?</th>
        </thead>
        <tbody>
            <th>Updates may fail due to unstable internet or corrupted files; ensure a stable connection, retry the update, try manual installation, and backup configurations before updating.</th>
        </tbody>
    	</table>
</div>

<?php include_once 'layout_head.php'; ?>
