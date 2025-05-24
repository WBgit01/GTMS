    <?php 
    include_once '../config/core.php';
    include_once '../config/database.php';
    include_once '../object/transaction.php';
    include_once '../object/order.php';
    include_once '../object/user.php';

    $database = new Database();
    $db = $database->getConnection();

    $order = new Order($db);
    $user = new User($db);
    $transaction = new Transaction($db);

    $page_title = "Help/Guide";
    $require_login = true;
    include_once '../login_checker.php';

    include_once 'sidebar.php'; 
    include_once 'layout_head.php';
    ?>


    <div class="table_wrapper">
        <link rel="stylesheet" href="../libs/css/help_content.css" />

          <div class="faq-item">
            <button class="faq-question">Why is the admin dashboard not loading or running slowly?</button>
            <div class="faq-answer">
                <p>This usually happens due to server overload, poor internet connection, or outdated software; try restarting the server, checking your internet, clearing cache, and updating the dashboard software.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">What should I do if sales data is not syncing across multiple Piso WiFi units?</button>
            <div class="faq-answer">
                <p>Check the internet connection on all units, review synchronization logs for errors, and restart the syncing services or devices to restore proper data flow.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Why can’t the admin log in to the centralized system?</button>
            <div class="faq-answer">
                <p>Incorrect credentials, account lockout, or server authentication issues may cause this; reset your password, verify account status, and ensure the server authentication service is operational.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">What causes devices to show offline on the dashboard?</button>
            <div class="faq-answer">
                <p>Devices may be offline due to power outages, network issues, or hardware problems; check power supply, reboot the device, inspect connections, and update firmware if necessary.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Why are some coin transactions not recorded in the system?</button>
            <div class="faq-answer">
                <p>Database errors, payment gateway issues, or software bugs can cause this; check payment integrations, review transaction logs, restart services, and apply software patches.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">How come alerts and notifications are not received?</button>
            <div class="faq-answer">
                <p>This can happen if email/SMS settings are incorrect or if the notification server is down; verify notification settings, test sending manually, and restart notification services.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">What if firmware or software updates keep failing?</button>
            <div class="faq-answer">
                <p>Updates may fail due to unstable internet or corrupted files; ensure a stable connection, retry the update, try manual installation, and backup configurations before updating.</p>
            </div>
        </div>
    </div>

        <script>
              document.querySelectorAll('.faq-question').forEach(question => {
                question.addEventListener('click', () => {
                  const currentActive = document.querySelector('.faq-answer.show');
                  const answer = question.nextElementSibling;

                  if (currentActive && currentActive !== answer) {
                    currentActive.classList.remove('show');
                  }

                  answer.classList.toggle('show');
                });
              });
            </script>

    <?php include_once 'layout_foot.php'; ?>
