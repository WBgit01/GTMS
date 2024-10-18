<nav>
        <div class="logo">
            <img src="IMG/GTMS_logo4.png">
            <a href="index.php">GTMS PORTAL</a>
        </div>

        <?php

        if ($page_title == "Register" || $page_title == "Login") {
            //do show the navigations

        }else{
            echo "<ul>";
            echo "<li><a href='index.php#main'>Home</a></li>";
            echo "<li><a href='index.php#services'>Services</a></li>";
            echo "<li><a href='index.php#contact'>Contact Us</a></li>";
            echo "<li><a href='index.php#about'>About Us</a></li>";
            echo "<li><a href='login.php' class='land_btn'>Login</a></li>";
        echo "</ul>";
        }
        
        ?>

    </nav>