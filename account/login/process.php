
<!-- 
Start of the lines/blocks of codes
Developed by M1
Student ID: Redacted
-->

<?php
// Start/Initialize the session.
session_start();

// Include the PHP script for connecting to the database (DB).
include '../../php/connection.php';

// Assigns the variables fetch values from the text fields.
// Suppress the warning messages.
@$email = $_POST['txtEmail'];
@$password = $_POST['txtPassword'];

// Query to execute (Fetch data from the DB).
$sql_query_1 = "SELECT * FROM users WHERE email_address='$email' AND password='$password'";

// Decalre variable to attempt to connect to the DB and execute the SQL query.
$sql_query_1_result = $connection->query($sql_query_1);

// Declare the variable to get the user ID and hide the warning message.
@$user_id = $_SESSION['user_id'];

// Check if the guest or user logged in is an admin or not.
if ($user_id != null) {
    // Execute the query to get the user's role status.
    $result = $connection->query("SELECT is_admin FROM users WHERE user_id = $user_id");
    while ($row = $result->fetch_assoc()) {
        $is_admin = (int) $row['is_admin']; // Cast to integer.
    }
}

// Users who are already logged are not allowed to access this page.
if (isset($_SESSION['email_address'])) {
    header('Location: ../../index.php');
}

// Ensure the connection to the DB is closed, with or without
// any code or query execution for security reasons.
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="E-waste management system for everyone.">
    <meta name="keywords" content="Quantum E-waste Management System, built with HTML, CSS, JS, PHP and SQL">
    <meta name="author" content="Quantum E-waste Management System Group">

    <title>Quantum E-waste Management System - Account Login Process</title>

    <!-- Cascading Style Sheets -->
    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/navigation-bar-buttons.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/account-login.css" rel="stylesheet">
    <link href="../../css/styles-cp-mobile.css" rel="stylesheet">
    <link href="../../css/side-navigation-menu.css" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="../../js/side-navigation-menu.js"></script>
</head>

<body>
    <!-- Reference: https://www.w3schools.com/howto/howto_js_sidenav.asp -->
    <div id="side-navigation-menu" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Close the side navigation menu.">&times;</a>
        <a href="../../index.php" onclick="closeNav()">Home</a>
        <a href="../../about-us.php" onclick="closeNav()">About us</a>
        <a href="../../e-waste/we-buy.php" onclick="closeNav()">E-waste we buy</a>
        <a href="../../e-waste/we-sell.php" onclick="closeNav()">E-waste we sell</a>
        <a href="../../services.php" onclick="closeNav()">Services</a>
        <a href="../../faq.php" onclick="closeNav()">FAQ</a>
        <a href="../../contact-us.php" onclick="closeNav()">Contact us</a>
        <?php
        // If the user is logged in.
        if (isset($_SESSION['email_address'])) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <div class="margin-50px"></div>
            <!-- <a href="javascript:void(0)" style="opacity: 0;">Blank space</a> -->
            <a href="javascript:void(0)">&#128994; User is logged in.</a>
            <a href="../../dashboard.php" onclick="closeNav()">Dashboard</a>
            <a href="../../buy-sell-request/index.php" onclick="closeNav()">Buy/Sell Request</a>
            <a href="../../tracking/index.php" onclick="closeNav()">Tracking</a>
            <a href="../../transactions-history/index.php" onclick="closeNav()">Transactions history</a>
            <a href="../../requests-history/index.php" onclick="closeNav()">Requests history</a>
            <a href="../../account/profile/index.php" onclick="closeNav()">Manage/Edit Profile</a>
            <a href="../../account/logout.php" onclick="closeNav()">Logout</a>
            HTML;
            echo $html;
        }
        // If the user is not logged in.
        else {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <div class="margin-50px"></div>
            <!-- <a href="javascript:void(0)" style="opacity: 0;">Blank space</a> -->
            <a href="javascript:void(0)">&#128308; User is not logged in.</a>
            <a href="../../account/login/index.php" onclick="closeNav()">Login</a>
            <a href="../../account/registration/index.php" onclick="closeNav()">Register</a>
            HTML;
            echo $html;
        }
        // If the user is logged in as an admin.
        // Check if the user is a System Admin or Office Admin.
        // 1 = System Admin
        // 2 = Office Admin
        if (@$is_admin == 1) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <a href="../../admin/index.php" onclick="closeNav()">Admin control panel</a>
            <a href="../../admin/manage-users/index.php" onclick="closeNav()">Manage users</a>
            <a href="../../admin/statistics/index.php" onclick="closeNav()">Statistics (Admin)</a>
            <a href="../../admin/database-query.php" onclick="closeNav()">Database Query</a>
            <div class="margin-100px"></div>
            HTML;
            echo $html;
        }
        else if (@$is_admin == 2) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <a href="admin/index.php" onclick="closeNav()">Admin control panel</a>
            <a href="admin/e-waste-requests/index.php" onclick="closeNav()">Screen user requests (Approve/Reject)</a>
            <a href="admin/statistics/index.php" onclick="closeNav()">Statistics</a>
            <div class="margin-100px"></div>
            HTML;
            echo $html;
        }
        ?>
    </div>
    <!-- Reference: https://www.w3schools.com/howto/howto_js_sidenav.asp -->

    <div id="basket">

        <div style="position: absolute, sticky;">
            <a class="black-hyperlink" href="javascript:void(0)" onclick="openNav()">
                <div class="side-navigation-menu-button-mobile">
                    <img src="../../images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                </div>
            </a>
        </div>

        <div id="header" class="website-title">
            <div class="title-and-image-container">
                <div class="title-and-image-content">
                    <img class="header-image" src="../../images/logo-image.png" alt="Greening planet earth." title="Greening planet earth.">
                    <!-- <img class="header-image" src="../../images/desktop-computer-svgrepo-com.svg" alt="Computer." title="Computer."> -->
                </div>
                <div class="title-and-image-content">
                    Quantum E-waste
                </div>
            </div>
        </div>

        <div class="hidden-header-mobile"></div>

        <div class="margin-20px"></div>
        <!-- <br> -->

        <div id="menu-buttons">
            <div>
                <a class="black-hyperlink" href="javascript:void(0)" onclick="openNav()">
                    <div class="menu-button">
                        <img src="../../images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../index.php">
                    <div class="menu-button">
                        Home
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../about-us.php">
                    <div class="menu-button">
                        About us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../e-waste/we-buy.php">
                    <div class="menu-button-2">
                        E-waste<br>we buy
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../e-waste/we-sell.php">
                    <div class="menu-button-2">
                        E-waste<br>we sell
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../services.php">
                    <div class="menu-button">
                        Services
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../faq.php">
                    <div class="menu-button">
                        FAQ
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../contact-us.php">
                    <div class="menu-button">
                        Contact us
                    </div>
                </a>
            </div>
            <!--
            ==================================================
            A large comment block by M1

            TODO: Need help to fix the dropdown menu.
            I intended to have a fade out effect for the menu, but it didn't work.
            If I try to move the menu down, the button will work as usual,
            but stops responding to to any hover movements at certain margins,
            and it will not show up.

            There is also another occurance where I changed the visibility
            of the dropdown menu. The fade out effect works, but the menu
            functions itself will still exist but invisible and will not disappear.
            Leaving a hidden trace of invisible interacble dropdown menu.
            I took so much time attempting to fix this issue, and still
            therefore unable to fix the dropdown menu. So I left it as it is.

            Instead, I took the opportunity to create a unique user session tracking.
            These two buttons are affected by certain conditions and change the
            The appearance of the buttons and the dropdown menu accordingly.
            The function is simple. It will check if the user is logged in or not,
            for the "Account" button. And if the user is and admin or not,
            for the "Admin" button.
            The button function of navigating to different pages will execute as usual.

            Any improvements made to fix the visual artifact is greatly appreciated.
            Please do credit your name here, if possible.
            Thanks in advance.
            ==================================================
            -->
            <div>
                <!-- Prevent the user from scrolling to the top of the page when -->
                <!-- clicking on the "Username" button that holds the dropdown menu. -->
                <a class="black-hyperlink" href="javascript:void(0)">
                    <div class="dropdown">
                        <div class="menu-button">
                            <?php
                            // Check if the user account is logged in or not and display
                            // the relevant contents.
                            if (isset($_SESSION['email_address'])) {
                                // Online.
                                echo "Account &#128994;";
                            }
                            else {
                                // Offline.
                                echo "Account &#128308;";
                            }
                            ?>
                        </div>
                        <div class="dropdown-content">
                            <?php
                            // Check if the user account is logged in or not and display
                            // the relevant contents.
                            if (isset($_SESSION['email_address'])) {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <!-- Online -->
                                &#128994; User is logged in.
                                <a class="menu" href="../../dashboard/index.php">Dashboard</a>
                                <a class="menu" href="../../account/profile/index.php">Profile</a>
                                <a class="menu" href="../../account/logout/index.php">Logout</a>
                                HTML;
                                echo $html;
                            }
                            else {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <!-- Offline -->
                                &#128308; User is not logged in.
                                <a class="menu" href="../../account/login/index.php">Login</a>
                                <a class="menu" href="../../account/registration/index.php">Register</a>
                                HTML;
                                echo $html;
                            }
                            ?>
		                </div>
                    </div>
                </a>
            </div>
            <?php
            // Check if the user is logged in as an admin or not.
            // 1 = System Admin
            // 2 = Office Admin
            if (@$is_admin == 1 || @$is_admin == 2) {
                // Use heredoc syntax to make the code readable and easier to maintain.
                // Very useful for handling large blocks of of codes.
                $html = <<<HTML
                    <div>
                        <a class='black-hyperlink' href='../../admin/index.php'>
                            <div class='menu-button'>
                                Admin
                            </div>
                        </a>
                    </div>
                HTML;
                echo $html;
            }
            ?>
        </div>

        <div style="margin:80px;"></div>
        <!-- <br><br><br> -->

        <!-- Layout for the account login process container. -->
        <div id="account-login-process-container">
            <div id="account-login-process-content">
                <br>

                <?php
                // Executes the code when the login button is pressed.
                if (isset($_POST['btnLogin'])) {
                    // Verify if the record exists in the DB.
                    if ($sql_query_1_result->num_rows > 0) {
                        while ($sql_query_1_result_row = $sql_query_1_result->fetch_assoc()) {
                            $_SESSION['user_id'] = $sql_query_1_result_row['user_id'];
                            $_SESSION['email_address'] = $sql_query_1_result_row['email_address'];
                            $_SESSION['password'] = $sql_query_1_result_row['password'];
                        }
                        loginSuccess();
                    }
                    // Check if the email address contains invalid characters or is empty.
                    else if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || $email == '') {
                        validateEmail();
                    }
                    // Check if the string length is less than 8 characters.
                    else if (strlen($password) < 8) {
                        passwordLessThan8();
                    } else {
                        otherErrors();
                    }
                }

                // Variety of PHP login messages to trigger when certain conditions are met.
                // Function for successful login.
                function loginSuccess() {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML

                    <h1 class='page-title'>Account login sucessful!</h1>
                    <br>
                    <p>The email address and password matches the database.</p>
                    <p>You are now logged in to the website.</p>
                    <p>You'll be redirected to the home page in 5 seconds.</p>
                    <meta http-equiv="refresh" content="5; url=../../index.php">
                    HTML;
                    echo $html;
                }

                // Function to check if the email address contains invalid characters or is empty.
                function validateEmail() {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML

                    <?php // Adjust the style according to the available content. ?>
                    <style>
                        #account-login-process-container {
                            height: 450px;
                        }
                        #account-login-process-content {
                            height: 400px;
                        }
                    </style>
                    <h1 class='page-title'>Account login failed!</h1>
                    <br>
                    <p>An error has occured while logging in to your account.</p>
                    <p>The account you're trying to login with the email address<br>contains invalid characters.</p>
                    <br>
                    <p>Please try again later.</p>
                    HTML;
                    echo $html;
                }

                // Function to check if the password length is less than 8.
                function passwordLessThan8() {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML

                    <?php // Adjust the style according to the available content. ?>
                    <style>
                        #account-login-process-container {
                            height: 450px;
                        }
                        #account-login-process-content {
                            height: 400px;
                        }
                    </style>
                    <h1 class='page-title'>Account login failed!</h1>
                    <br>
                    <p>An error has occured while logging in to your account.</p>
                    <p>The account you're trying to login with the password<br>is less than 8 characters.</p>
                    <br>
                    <p>Please try again later.</p>
                    HTML;
                    echo $html;
                }

                // Function for other errors encountered.
                function otherErrors() {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML

                    <?php // Adjust the style according to the available content. ?>
                    <style>
                        #account-login-process-container {
                            height: 600px;
                        }
                        #account-login-process-content {
                            height: 550px;
                        }
                    </style>
                    <h1 class='page-title'>Account login failed!</h1>
                    <br>
                    <p>An error has occured while logging in to your account.</p>
                    <p>There are a few resons why the login may have failed.</p>
                    <br>
                    <p>1. It does not match with the database records, or account does not exist.</p>
                    <p>2. Incomplete details or contains invalid characters.</p>
                    <p>3. The website and the database is currently overloaded.</p>
                    <p>4. Internal website error.</p>
                    <br>
                    <p>Please try again later.</p>
                    HTML;
                    echo $html;
                }
                ?>
                <br>
            </div>
        </div>

        <br>
        <br>
        <br class="desktop-line-break">
        <br class="desktop-line-break">
        <br class="desktop-line-break">

        <div id="footer-container-3-mobile">
            <p class="black-text">Subscribe to our mailing list to be notified of latest news.</p><br>
            <div class="subscription-form">
                <form action="" method="post">
                    <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required><br><br>
                    <input type="submit" value="Subscribe" class="subscribe-button">
                </form>
            </div>
        </div>

        <div class="hidden-footer-container-3-mobile"></div>

        <br class="mobile-line-break">
        <br class="mobile-line-break">
        <br class="mobile-line-break">

        <div id="footer-container" class="footer-text">
            <div id="footer-container-2">
                <p class="footer-text-2">Sitemap</p>
                <ul>
                    <a class="white-hyperlink" href="../../index.php" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="../../about/index.php" class="white">
                        <li class="padding-bottom">About us</li>
                    </a>
                    <a class="white-hyperlink" href="../../e-waste/index.php" class="white">
                        <li class="padding-bottom">E-waste we buy</li>
                    </a>
                    <a class="white-hyperlink" href="../../ecycled-items/index.php" class="white">
                        <li class="padding-bottom">Recycled items we sell</li>
                    </a>
                    <a class="white-hyperlink" href="../../services/index.php" class="white">
                        <li class="padding-bottom">Services</li>
                    </a>
                    <a class="white-hyperlink" href="../../faq/index.php" class="white">
                        <li class="padding-bottom">FAQ</li>
                    </a>
                    <a class="white-hyperlink" href="../../contact/index.php" class="white">
                        <li class="padding-bottom">Contact us</li>
                    </a>
                </ul>
            </div>
            <div id="footer-container-3">
                <p class="black-text">Subscribe to our mailing list<br>to be notified of latest news.</p><br>
                <div class="subscription-form">
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required><br><br>
                        <input type="submit" value="Subscribe" class="subscribe-button">
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<!-- 
End of the lines/blocks of codes
Developed by M1
Student ID: Redacted
-->
