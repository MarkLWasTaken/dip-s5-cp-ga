
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

// MySQLi statement.
$mysqli = new mysqli($hostname, $username, $password, $database);

// Set a the default timezone for date and time.
date_default_timezone_set('Asia/Singapore');

// Set the date and time format.
$dateCreated = date('Y/m/d h:i:s a', time());

// Retrieve the values from the account registration page.
// Hide warning messages when the input fields are null or empty.
@$fname = $_POST['txtFName'];
@$lname = $_POST['txtLName'];
@$email = $_POST['txtEmail'];
@$password = $_POST['txtPassword'];
@$gender = $_POST['rdoGender'];
@$country = $_POST['selCountry'];

// Query to execute for registering the account.
$queryRegister = "INSERT INTO `users`(`first_name`, `last_name`, `email_address`, `password`, `gender`, `country`, `is_admin`, `date_created`) 
            VALUES ('$fname', '$lname', '$email', '$password', '$gender', '$country', 0, '$dateCreated')";

// Query to execute and check if the email address exists in the DB
// by counting the number of rows containing the email address.
$queryEmailCheck = ("SELECT `email_address` FROM `users` WHERE `email_address` = '$email'");

// Query to execute and check if the user credentials exists in the DB.
// $queryUserCheck = "SELECT * FROM users WHERE email='$email' AND password='$password'";

// Decalre variable to attempt to connect to the DB and execute the SQL query (Registration).
// $resultRegister = mysqli_query($connection, $queryRegister);

// Decalre variable to attempt to connect to the DB and execute the SQL query (Check email).
$resultEmailCheck = mysqli_query($connection, $queryEmailCheck);

// Decalre variable to attempt to connect to the DB and execute the SQL query.
// $resultUserCheck = mysqli_query($connection, $queryUserCheck);

// For security reasons, prepared statements will be used to prevent SQL injections.
// To check if the email address already exists in the database.
// $getEmail = $mysqli->prepare("SELECT * FROM `users` WHERE email='$email'");
// $getEmail->bind_param("s", $email);
// $getEmail->execute();
// $resultEmailCheck = $getEmail->get_result();

// Declare the variable to get the user ID and hide the warning message.
@$user_id = $_SESSION['user_id'];

// If user ID is not null,
// check if the guest or user logged in is an admin or not.
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="E-waste management system for everyone.">
    <meta name="keywords" content="Quantum E-waste Management System, built with HTML, CSS, JS, PHP and SQL">
    <meta name="author" content="Quantum E-waste Management System Group">

    <title>Quantum E-waste Management System - Account Registration Process</title>

    <!-- Cascading Style Sheets -->
    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/navigation-bar-buttons.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/account-registration.css" rel="stylesheet">
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
        <a href="../../about/index.php" onclick="closeNav()">About us</a>
        <a href="../../e-waste/index.php" onclick="closeNav()">E-waste we buy</a>
        <a href="../../recycled-items/index.php" onclick="closeNav()">Recycled items we sell</a>
        <a href="../../services/index.php" onclick="closeNav()">Services</a>
        <a href="../../faq/index.php" onclick="closeNav()">FAQ</a>
        <a href="../../contact/index.php" onclick="closeNav()">Contact us</a>
        <?php
        // If the user is logged in.
        if (isset($_SESSION['email_address'])) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <a href="javascript:void(0)" style="opacity: 0;">Blank space</a>
            <a href="javascript:void(0)">User is logged in.</a>
            <a href="../../dashboard/index.php" onclick="closeNav()">Dashboard</a>
            <a href="../../buy-sell-request/index.php" onclick="closeNav()">Buy/Sell Request</a>
            <a href="../../tracking/index.php" onclick="closeNav()">Tracking</a>
            <a href="../../e-waste-request-screening/index.php" onclick="closeNav()">E-waste request screening</a>
            <a href="../../transactions-history/index.php" onclick="closeNav()">Transactions history</a>
            <a href="../../requests-history/index.php" onclick="closeNav()">Requests history</a>
            <a href="../../profile/index.php" onclick="closeNav()">Manage/Edit Profile</a>
            <a href="../../account/logout/index.php" onclick="closeNav()">Logout</a>
            HTML;
            echo $html;
        }
        // If the user is not logged in.
        else {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <a href="javascript:void(0)" style="opacity: 0;">Blank space</a>
            <a href="javascript:void(0)">User is not logged in.</a>
            <a href="../../account/login/index.php" onclick="closeNav()">Login</a>
            <a href="../../account/registration/index.php" onclick="closeNav()">Register</a>
            HTML;
            echo $html;
        }
        // If the user is logged in as an admin.
        if (@$is_admin == 1) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <a href="../../admin/index.php" onclick="closeNav()">Admin control panel</a>
            <a href="../../admin/manage-users/index.php" onclick="closeNav()">Manage users (Admin)</a>
            <a href="../../admin/e-waste-request-screening/index.php" onclick="closeNav()">E-waste request acceptance (Admin)</a>
            <a href="../../admin/statistics/index.php" onclick="closeNav()">Statistics (Admin)</a>
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
                    <img class="header-image" src="../../images/desktop-computer-svgrepo-com.svg" alt="Computer." title="Computer.">
                </div>
                <div class="title-and-image-content">
                    Quantum E-waste
                </div>
            </div>
        </div>

        <div class="hidden-header-mobile"></div>

        <br>

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
                <a class="black-hyperlink" href="../../about-us/index.php">
                    <div class="menu-button">
                        About us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../e-waste-we-buy/index.php">
                    <div class="menu-button-2">
                        E-waste<br>we buy
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../e-waste-we-sell/index.php">
                    <div class="menu-button-2">
                        E-waste<br>we sell
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../services/index.php">
                    <div class="menu-button">
                        Services
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../faq/index.php">
                    <div class="menu-button">
                        FAQ
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../contact/index.php">
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
                                User is logged in.
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
                                User is not logged in.
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
            if (@$is_admin == 1) {
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

        <br><br><br>

        <!-- Layout for the account registration process container. -->
        <div id="account-registration-process-container">
            <div id="account-registration-process-content">
                <br>
                <?php
                // Variety of PHP messages to trigger when certain conditions are met.
                // Check if the email address contains invalid characters or is empty.
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || $email == '') {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML
                    
                    <!-- Adjust the style according to the available content. -->
                    <style>
                                #account-registration-success-container {
                                    height: 400px;
                                }
                                #account-registration-success-content {
                                    height: 350px;
                                }
                            </style>
                    <h1 class='page-title'>Account registration failed!</h1>
                    <br>
                    <p>An error has occured while registering your account.</p>
                    <p>The account you're trying to register with the email address<br>contains invalid characters.</p>
                    <br>
                    <p>Please try again later.</p>
                    HTML;
                    echo $html;

                    // Ensure the connection to the DB is closed, with or without any code execution for security reasons.
                    mysqli_close($connection);
                }
                // Check if the string length is less than 8 characters.
                else if (strlen($password) < 8) {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML
                    
                    <!-- Adjust the style according to the available content. -->
                    <style>
                                #account-registration-success-container {
                                    height: 400px;
                                }
                                #account-registration-success-content {
                                    height: 350px;
                                }
                            </style>
                    <h1 class='page-title'>Account registration failed!</h1>
                    <br>
                    <p>An error has occured while registering your account.</p>
                    <p>The account you're trying to register with the password<br>is less than 8 characters.</p>
                    <br>
                    <p>Please try again later.</p>
                    HTML;
                    echo $html;

                    // Ensure the connection to the DB is closed, with or without any code execution for security reasons.
                    mysqli_close($connection);
                }
                // Check if the email address already exists in the database.
                else if (mysqli_num_rows($resultEmailCheck)) {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML

                    <!-- Adjust the style according to the available content. -->
                    <style>
                                #account-registration-success-container {
                                    height: 400px;
                                }
                                #account-registration-success-content {
                                    height: 350px;
                                }
                            </style>
                    <h1 class='page-title'>Account registration failed!</h1>
                    <br>
                    <p>An error has occured while registering your account.</p>
                    <p>The account you're trying to register already exists in the database.</p>
                    <br>
                    <p>Please register using a new email address and try again later.</p>
                    HTML;
                    echo $html;

                    // Ensure the connection to the DB is closed, with or without any code execution for security reasons.
                    mysqli_close($connection);
                }
                // Register the account details into the database.
                else if (mysqli_query($connection, $queryRegister)) {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML
                    <h1>Account registration sucessful!</h1>
                    <br>
                    <p>The account details you have input has been succesfully registered!</p>
                    <p>You'll be redirected to the login page in 5 seconds.</p>
                    <meta http-equiv="refresh" content="5; url=../../account/login/index.php">
                    HTML;
                    echo $html;

                    // Ensure the connection to the DB is closed, with or without any code execution for security reasons.
                    mysqli_close($connection);
                }
                // If other errors were encountered.
                else {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML

                    <!-- Adjust the style according to the available content. -->
                    <style>
                                #account-registration-success-container {
                                    height: 550px;
                                }
                                #account-registration-success-content {
                                    height: 500px;
                                }
                            </style>
                    <h1 class='page-title'>Account registration failed!</h1>
                    <br>
                    <p>An error has occured while registering your account.</p>
                    <p>There are a few resons why the registration may have failed.</p>
                    <br>
                    <p>1. The account you're trying to register is incomplete or contains invalid characters.</p>
                    <p>2. The account you're trying to register already exists in the database.</p>
                    <p>3. The server and the database is currently overloaded.</p>
                    <p>4. Internal website error.</p>
                    <br>
                    <p>Please try again later.</p>
                    HTML;
                    echo $html;

                    // Ensure the connection to the DB is closed, with or without any code execution for security reasons.
                    mysqli_close($connection);
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
