
<!-- 
Start of the lines/blocks of codes
Developed by M1
Student ID: Redacted
-->

<?php
// Start/Initialize the session.
session_start();

// Include the PHP script for connecting to the database (DB).
include 'php/connection.php';

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

    <title>Quantum E-waste Management System - Dashboard</title>

    <!-- Cascading Style Sheets -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/navigation-bar-buttons.css" rel="stylesheet">
    <link href="css/dropdown-menu.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/styles-cp-mobile.css" rel="stylesheet">
    <link href="css/side-navigation-menu.css" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="js/side-navigation-menu.js"></script>
</head>

<body>
    <!-- Reference: https://www.w3schools.com/howto/howto_js_sidenav.asp -->
    <div id="side-navigation-menu" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Close the side navigation menu.">&times;</a>
        <a href="index.php" onclick="closeNav()">Home</a>
        <a href="about-us.php" onclick="closeNav()">About us</a>
        <a href="e-waste/we-buy.php" onclick="closeNav()">E-waste we buy</a>
        <a href="e-waste/we-sell.php" onclick="closeNav()">E-waste we sell</a>
        <a href="services.php" onclick="closeNav()">Services</a>
        <a href="faq.php" onclick="closeNav()">FAQ</a>
        <a href="contact-us.php" onclick="closeNav()">Contact us</a>
        <?php
        // If the user is logged in.
        if (isset($_SESSION['email_address'])) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <div class="margin-50px"></div>
            <!-- <a href="javascript:void(0)" style="opacity: 0;">Blank space</a> -->
            <a href="javascript:void(0)">&#128994; User is logged in.</a>
            <a href="#" onclick="closeNav()">Dashboard</a>
            <a href="buy-sell-request/index.php" onclick="closeNav()">Buy/Sell Request</a>
            <a href="tracking/index.php" onclick="closeNav()">Tracking</a>
            <a href="view-transactions/index.php" onclick="closeNav()">View transactions</a>
            <a href="payment/index.php" onclick="closeNav()">Proof of Payment</a>
            <a href="account/profile/index.php" onclick="closeNav()">Manage/Edit Profile</a>
            <a href="account/logout.php" onclick="closeNav()">Logout</a>
            <div class="margin-50px"></div>
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
            <a href="account/login/index.php" onclick="closeNav()">Login</a>
            <a href="account/registration/index.php" onclick="closeNav()">Register</a>
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
            <a href="admin/index.php" onclick="closeNav()">Admin control panel</a>
            <a href="admin/manage-users/index.php" onclick="closeNav()">Manage users</a>
            <a href="admin/statistics/index.php" onclick="closeNav()">Statistics</a>
            <a href="admin/database-query.php" onclick="closeNav()">Database Query</a>
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
                    <img src="images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                </div>
            </a>
        </div>

        <div id="header" class="website-title">
            <div class="title-and-image-container">
                <div class="title-and-image-content">
                    <img class="header-image" src="images/logo-image.png" alt="Greening planet earth." title="Greening planet earth.">
                    <!-- <img class="header-image" src="images/desktop-computer-svgrepo-com.svg" alt="Computer." title="Computer."> -->
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
                        <img src="images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="index.php">
                    <div class="menu-button">
                        Home
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="about-us.php">
                    <div class="menu-button">
                        About us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="e-waste/we-buy.php">
                    <div class="menu-button-2">
                        E-waste<br>we buy
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="e-waste/we-sell.php">
                    <div class="menu-button-2">
                        E-waste<br>we sell
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="services.php">
                    <div class="menu-button">
                        Services
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="faq.php">
                    <div class="menu-button">
                        FAQ
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="contact-us.php">
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
                                <a class="menu" href="#">Dashboard</a>
                                <a class="menu" href="account/profile/index.php">Profile</a>
                                <a class="menu" href="account/logout.php">Logout</a>
                                HTML;
                                echo $html;
                            }
                            else {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <!-- Offline -->
                                &#128308; User is not logged in.
                                <a class="menu" href="account/login/index.php">Login</a>
                                <a class="menu" href="account/registration/index.php">Register</a>
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
                        <a class='black-hyperlink' href='#admin-navigation'>
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

        <div class="margin-20px-desktop"></div>
        <!-- <br class="desktop-line-break"> -->

        <div class="page-title-banner-container">
            <div class="page-title-banner-content">Dashboard</div>
        </div>

        <div class="margin-30px"></div>
        <!-- <br>
        <div class="hidden-block">
            <h1>Blank space.</h1>
        </div> -->

        <!-- Layout for the FAQ container. -->
        <div id="container-1-container">
            <div id="container-1-contents">

            <div class="margin-40px"></div>
                <h1>General</h1>

                <!-- Layout for the buttons container 1. -->
                <div id="buttons-container-1">
                    <a class="black-hyperlink-display" href="index.php">
                        <div class="button">
                            <p class="button-content">Home</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="about-us.php">
                        <div class="button">
                            <p class="button-content">About us</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="e-waste/we-buy.php">
                        <div class="button">
                            <p class="button-content">E-waste we buy</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="e-waste/we-sell.php">
                        <div class="button">
                            <p class="button-content">E-waste we sell</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="services.php">
                        <div class="button">
                            <p class="button-content">Services</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="faq.php">
                        <div class="button">
                            <p class="button-content">FAQ</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="contact-us.php">
                        <div class="button">
                            <p class="button-content">Contact us</p>
                        </div>
                    </a>
                </div>

                <div class="margin-50px"></div>

                <h1>User Functions</h1>

                <!-- Layout for the buttons container 2. -->
                <div id="buttons-container-2">
                    <a class="black-hyperlink-display" href="buy-sell-request/index.php">
                        <div class="button">
                            <p class="button-content">Buy/Sell Request</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="tracking/index.php">
                        <div class="button">
                            <p class="button-content">Tracking</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="view-transactions/index.php">
                        <div class="button">
                            <p class="button-content">View transactions</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="payment/index.php">
                        <div class="button">
                            <p class="button-content">Proof of Payment</p>
                        </div>
                    </a>

                    <div id="admin-navigation" class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="account/profile/index.php">
                        <div class="button">
                            <p class="button-content">Manage/Edit Profile</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="account/logout.php">
                        <div class="button">
                            <p class="button-content">Logout</p>
                        </div>
                    </a>
                </div>

                <div class="margin-50px"></div>

                <h1>Admin</h1>

                <!-- Layout for the buttons container 2. -->
                <div id="buttons-container-2">
                    <a class="black-hyperlink-display" href="admin/e-waste-requests/index.php">
                        <div class="button">
                            <p class="button-content">Screen user requests (Approve/Reject)</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="admin/statistics/index.php">
                        <div class="button">
                            <p class="button-content">Statistics</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="admin/manage-users/index.php">
                        <div class="button">
                            <p class="button-content">Manage users</p>
                        </div>
                    </a>

                    <div class="margin-20px"></div>

                    <a class="black-hyperlink-display" href="admin/database-query.php">
                        <div class="button">
                            <p class="button-content">Database query</p>
                        </div>
                    </a>
                </div>

                <div class="margin-100px"></div>
            </div>
        </div>

        <div class="margin-100px"></div>
        <!-- <br class="desktop-line-break">
        <br class="desktop-line-break">
        <br class="desktop-line-break">
        <br class="desktop-line-break">
        <br class="desktop-line-break"> -->

        <div id="footer-container-3-mobile">
            <p class="black-text">Subscribe to our mailing list to be notified of latest news.</p>
            <div class="margin-30px"></div>
            <div class="subscription-form">
                <form action="" method="post">
                    <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required>
                    <div class="margin-30px"></div>
                    <input type="submit" value="Subscribe" class="subscribe-button">
                </form>
            </div>
        </div>

        <div class="hidden-footer-container-3-mobile"></div>

        <div class="margin-60px-mobile"></div>
        <!-- <br class="mobile-line-break">
        <br class="mobile-line-break"> -->

        <div id="footer-container" class="footer-text">
            <div id="footer-container-2">
                <p class="footer-text-2">Sitemap</p>
                <ul>
                    <a class="white-hyperlink" href="index.php" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="about-us.php" class="white">
                        <li class="padding-bottom">About us</li>
                    </a>
                    <a class="white-hyperlink" href="e-waste/we-buy.php" class="white">
                        <li class="padding-bottom">E-waste we buy</li>
                    </a>
                    <a class="white-hyperlink" href="e-waste/we-sell.php" class="white">
                        <li class="padding-bottom">E-waste we sell</li>
                    </a>
                    <a class="white-hyperlink" href="services.php" class="white">
                        <li class="padding-bottom">Services</li>
                    </a>
                    <a class="white-hyperlink" href="faq.php" class="white">
                        <li class="padding-bottom">FAQ</li>
                    </a>
                    <a class="white-hyperlink" href="contact-us.php" class="white">
                        <li class="padding-bottom">Contact us</li>
                    </a>
                </ul>
            </div>
            <div id="footer-container-3">
                <p class="black-text">Subscribe to our mailing list<br>to be notified of latest news.</p>
                <div class="margin-24px"></div>
                <div class="subscription-form">
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required>
                        <div class="margin-30px"></div>
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
