
<!-- 
Start of the lines/blocks of codes
Developed by M1
Student ID: Redacted
-->

<?php
// Start/Initialize the session.
session_start();

// Include the PHP script for connecting to the database (DB).
include '../php/connection.php';

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

// Only users who are already logged in are allowed to view and use the webpage.
if ($user_id == null) {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="E-waste management system for everyone.">
    <meta name="keywords" content="Quantum E-waste Solution (Management System), built with HTML, CSS, JS, PHP and SQL">
    <meta name="author" content="Quantum E-waste Solution Group">

    <title>Quantum E-waste Solution - Proof of Payment</title>

    <!-- Cascading Style Sheets -->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/navigation-bar-buttons.css" rel="stylesheet">
    <link href="../css/dropdown-menu.css" rel="stylesheet">
    <link href="../css/payment.css" rel="stylesheet">
    <link href="../css/styles-cp-mobile.css" rel="stylesheet">
    <link href="../css/side-navigation-menu.css" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="../js/side-navigation-menu.js"></script>
</head>

<body>
    <!-- Reference: https://www.w3schools.com/howto/howto_js_sidenav.asp -->
    <div id="side-navigation-menu" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Close the side navigation menu.">&times;</a>
        <a href="../index.php" onclick="closeNav()">Home</a>
        <a href="../about-us.php" onclick="closeNav()">About us</a>
        <a href="../e-waste/we-buy.php" onclick="closeNav()">E-waste we buy</a>
        <a href="../e-waste/we-sell.php" onclick="closeNav()">E-waste we sell</a>
        <a href="../services.php" onclick="closeNav()">Services</a>
        <a href="../faq.php" onclick="closeNav()">FAQ</a>
        <a href="../contact-us.php" onclick="closeNav()">Contact us</a>
        <?php
        // If the user is logged in.
        if (isset($_SESSION['email_address'])) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <div class="margin-50px"></div>
            <!-- <a href="javascript:void(0)" style="opacity: 0;">Blank space</a> -->
            <a href="javascript:void(0)">&#128994; User is logged in.</a>
            <a href="../dashboard.php" onclick="closeNav()">Dashboard</a>
            <a href="../buy-sell-request/index.php" onclick="closeNav()">Buy/Sell Request</a>
            <a href="../tracking/index.php" onclick="closeNav()">Tracking</a>
            <a href="../view-transactions/index.php" onclick="closeNav()">View transactions</a>
            <a href="#" onclick="closeNav()">Proof of Payment</a>
            <a href="../account/profile/index.php" onclick="closeNav()">Manage/Edit Profile</a>
            <a href="../account/logout.php" onclick="closeNav()">Logout</a>
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
            <a href="../account/login/index.php" onclick="closeNav()">Login</a>
            <a href="../account/registration/index.php" onclick="closeNav()">Register</a>
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
            <a href="../admin/manage-users/index.php" onclick="closeNav()">Manage users</a>
            <a href="../admin/database-query.php" onclick="closeNav()">Database Query</a>
            <a href="../admin/dashboard.php" onclick="closeNav()">Admin Dashboard</a>
            <a href="../admin/statistics/index.php" onclick="closeNav()">Statistics</a>
            <div class="margin-100px"></div>
            HTML;
            echo $html;
        }
        else if (@$is_admin == 2) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <a href="../admin/e-waste-requests/index.php" onclick="closeNav()">Screen user requests (Approve/Reject)</a>
            <a href="../admin/dashboard.php" onclick="closeNav()">Admin Dashboard</a>
            <a href="../admin/statistics/index.php" onclick="closeNav()">Statistics</a>
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
                    <img src="../images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                </div>
            </a>
        </div>

        <div id="header" class="website-title">
            <div class="title-and-image-container">
                <div class="title-and-image-content">
                    <img class="header-image" src="../images/logo-image.png" alt="Greening planet earth." title="Greening planet earth.">
                    <!-- <img class="header-image" src="../images/desktop-computer-svgrepo-com.svg" alt="Computer." title="Computer."> -->
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
                        <img src="../images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../index.php">
                    <div class="menu-button">
                        Home
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../about-us.php">
                    <div class="menu-button">
                        About us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../e-waste/we-buy.php">
                    <div class="menu-button-2">
                        E-waste<br>we buy
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../e-waste/we-sell.php">
                    <div class="menu-button-2">
                        E-waste<br>we sell
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../services.php">
                    <div class="menu-button">
                        Services
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../faq.php">
                    <div class="menu-button">
                        FAQ
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../contact-us.php">
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
                                <a class="menu" href="../dashboard.php">Dashboard</a>
                                <a class="menu" href="../account/profile/index.php">Profile</a>
                                <a class="menu" href="../account/logout.php">Logout</a>
                                HTML;
                                echo $html;
                            }
                            else {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <!-- Offline -->
                                &#128308; User is not logged in.
                                <a class="menu" href="../account/login/index.php">Login</a>
                                <a class="menu" href="../account/registration/index.php">Register</a>
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
                        <a class='black-hyperlink' href='../dashboard.php#admin-navigation'>
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
            <div class="page-title-banner-content">Proof of Payment</div>
        </div>

        <div class="margin-30px"></div>
        <!-- <br>
        <div class="hidden-block">
            <h1>Blank space.</h1>
        </div> -->

        <!-- Layout for the contents 1 container. -->
        <div class="container-1-container">
            <div class="container-1-contents">
                <h2>To begin, select a request here.</h2>
            </div>
        </div>

        <div class="margin-40px"></div>

        <?php
        // Unset the session variables to clear the form data.
        unset($_SESSION['txtID']);
        unset($_SESSION['txtRequestDate']);
        unset($_SESSION['txtRequestType']);
        unset($_SESSION['txtRequestItemName']);
        unset($_SESSION['txtItemQuantity']);
        unset($_SESSION['txtItemID']);

        // Check if the form has been submitted.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
             // Store the values in the session.
            $_SESSION['txtID'] = $_POST['txtID'];
            $_SESSION['txtRequestDate'] = $_POST['txtRequestDate'];
            $_SESSION['txtRequestType'] = $_POST['txtRequestType'];
            $_SESSION['txtRequestItemName'] = $_POST['txtRequestItemName'];
            $_SESSION['txtItemQuantity'] = $_POST['txtItemQuantity'];
            @$_SESSION['txtItemID'] = $_POST['txtItemID'];
            if (isset($_POST['clear'])) {
                // Unset the session variables to clear the form data.
                unset($_SESSION['txtID']);
                unset($_SESSION['txtRequestDate']);
                unset($_SESSION['txtRequestType']);
                unset($_SESSION['txtRequestItemName']);
                unset($_SESSION['txtItemQuantity']);
                unset($_SESSION['txtItemID']);
            }
        } else if (isset($_POST['clear'])) {
            // Unset the session variables to clear the form data.
            unset($_SESSION['txtID']);
            unset($_SESSION['txtRequestDate']);
            unset($_SESSION['txtRequestType']);
            unset($_SESSION['txtRequestItemName']);
            unset($_SESSION['txtItemQuantity']);
            unset($_SESSION['txtItemID']);
        }

        // Retrieve the values from the session.
        $request_id = isset($_SESSION['txtID']) ? $_SESSION['txtID'] : '';
        $request_date = isset($_SESSION['txtRequestDate']) ? $_SESSION['txtRequestDate'] : '';
        $request_type = isset($_SESSION['txtRequestType']) ? $_SESSION['txtRequestType'] : '';
        $request_item_name = isset($_SESSION['txtRequestItemName']) ? $_SESSION['txtRequestItemName'] : '';
        $item_quantity = isset($_SESSION['txtItemQuantity']) ? $_SESSION['txtItemQuantity'] : '';
        $item_id = isset($_SESSION['txtItemID']) ? $_SESSION['txtItemID'] : '';
        ?>

        <!-- Table query container -->
        <div>
            <form action="" method="post">
                <div class="table-query-content">
                    <table>
                        <tr>
                            <th colspan="2" style="padding-left: 0; text-align: center;">
                                "requests" Table Query
                            </th>
                        </tr>
                        <?php // "requests" table query options. ?>
                        <tr>
                            <th>ID:</th>
                            <td><input type="text" name="txtID" value="<?php echo $request_id ?>"></td>
                        </tr>
                        <tr>
                            <th>Request Date:</th>
                            <td><input type="text" name="txtRequestDate" value="<?php echo $request_date ?>"></td>
                        </tr>
                        <tr>
                            <th>Request Type:</th>
                            <td><input type="text" name="txtRequestType" value="<?php echo $request_type ?>"></td>
                        </tr>
                        <tr>
                            <th>Request Item Name:</th>
                            <td><input type="text" name="txtRequestItemName" value="<?php echo $request_item_name ?>"></td>
                        </tr>
                        <tr>
                            <th>Item Quantity:</th>
                            <td><input type="text" name="txtItemQuantity" value="<?php echo $item_quantity ?>"></td>
                        </tr>
                        <tr>
                            <th>Item ID:</th>
                            <td><input type="text" name="txtItemID" value="<?php $item_id ?>"></td>
                        </tr>
                        <tr>
                            <th>Actions:</th>
                            <td>
                                <input class="submit-button" type="submit" name="submit" value="Search from the table">
                                <div class="margin-20px"></div>
                                <input class="submit-button" type="submit" name="clear" value="Clear the query">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

        <div class="margin-50px"></div>

        <!-- E-waste requests table container -->
        <div>
            <div class="requests-table">
                <?php
                // Use heredoc syntax to make the code readable and easier to maintain.
                // Very useful for handling large blocks of of codes.
                $html = <<<HTML
                <table border=1>
                    <tr>
                        <th>ID</th>
                        <th>Request Date</th>
                        <th>Request Type</th>
                        <th>Request Item Name</th>
                        <th>Item Quantity</th>
                        <th>Request Status</th>
                        <th>Item ID</th>
                        <th colspan="2" style="text-align: center;">Actions</th>
                    </tr>
                HTML;
                echo $html;

                // Declare a variable for the query.
                $sql_query_1 = "SELECT * FROM `requests` WHERE
                                request_id LIKE '%$request_id%' AND
                                request_date LIKE '%$request_date%' AND
                                request_type = 'Buy' AND
                                request_item_name LIKE '%$request_item_name%' AND
                                item_quantity LIKE '%$item_quantity%' AND
                                request_status = 'Pending payment' AND
                                item_id LIKE '%$item_id%'
                                ORDER BY request_id ASC";
                // "picture_id", "user_id", "accounts_payable" and "accounts_receivable" is excluded.

                // Attempt to connect to the database and execute the query.
                $sql_query_1_result = $connection->query($sql_query_1);

                // Insert the each of the results into the table.
                while($sql_query_1_row = $sql_query_1_result->fetch_assoc()) {
                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML
                    <tr>
                        <td>{$sql_query_1_row['request_id']}</td>
                        <td>{$sql_query_1_row['request_date']}</td>
                        <td>{$sql_query_1_row['request_type']}</td>
                        <td>{$sql_query_1_row['request_item_name']}</td>
                        <td>{$sql_query_1_row['item_quantity']}</td>
                        <td>{$sql_query_1_row['request_status']}</td>
                        <td>{$sql_query_1_row['item_id']}</td>
                        <td>
                            <form id="post_request_id_{$sql_query_1_row['request_id']}" method="post" action="../payment/upload.php">
                                <input type="hidden" name="request_id" value="{$sql_query_1_row['request_id']}">
                                <input type="submit" name="submit" value="Upload picture">
                            </form>
                        </td>
                    </tr>
                    HTML;
                    echo $html;
                }
                echo '</table>';
                ?>
            </div>
        </div>

        <div class="margin-100px"></div>
        <!-- <br class="desktop-line-break">
        <br class="desktop-line-break">
        <br class="desktop-line-break">
        <br class="desktop-line-break">
        <br class="desktop-line-break"> -->

        <?php
        if (@$_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the value of the button.
            @$mail_email_address = $_POST['email'];

            if (@$mail_email_address != "") {
                // Insert data into the "mailing_list" table.
                // Declare a variable for the query.
                // Attempt to connect to the database and execute the query.
                @$sql_query_mail_1_result = $connection->query(
                    "SELECT * FROM `mailing_list`
                    WHERE email_address = '$mail_email_address'");

                // Check if the email address exists in the mailing list.
                if (@$sql_query_mail_1_result->num_rows > 0) {
                    // Email address already exists in the database.

                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML
                    <style>
                        /* Subscribe to our mailing list to be notified of latest news. */
                        #mail-text-1 {
                            display: none;
                            opacity: 0%;
                        }

                        /* Thank you for subscribing! */
                        #mail-text-2 {
                            display: none;
                            opacity: 0%;
                        }

                        /* Email address already exists in the database. */
                        #mail-text-3 {
                            display: block;
                            opacity: 100%;
                        }

                        /* Subscription form */
                        #subscription-form {
                            display: none;
                            opacity: 0%;
                        }
                    </style>
                    HTML;
                    echo $html;
                }
                else {
                    // Thank you for subscribing!

                    // Insert data into the "mailing_list" table.
                    // Declare a variable for the query.
                    $sql_query_mail_2 = "INSERT INTO `mailing_list` (email_address, is_subscribed,
                    date_first_subscribed)
                    VALUES ('$mail_email_address', '1', '$date')";

                    // Attempt to connect to the database and execute the query.
                    $sql_query_mail_2_result = $connection->query($sql_query_mail_2);

                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML
                    <style>
                        /* Subscribe to our mailing list to be notified of latest news. */
                        #mail-text-1 {
                            display: none;
                            opacity: 0%;
                        }

                        /* Thank you for subscribing! */
                        #mail-text-2 {
                            display: block;
                            opacity: 100%;
                        }

                        /* Email address already exists in the database. */
                        #mail-text-3 {
                            display: none;
                            opacity: 0%;
                        }

                        /* Subscription form */
                        #subscription-form {
                            display: none;
                            opacity: 0%;
                        }
                    </style>
                    HTML;
                    echo $html;
                }
            }
        }
        ?>

        <?php
        // Ensure the connection to the DB is closed, with or without
        // any code or query execution for security reasons.
        $connection->close();
        ?>

        <div id="footer-container-3-mobile">
        <div id="mailing-list"></div>
            <p id="mail-text-1" class="black-text">Subscribe to our mailing list<br>to be notified of latest news.</p>
            <p id="mail-text-2" class="black-text font-size-20px">Thank you for subscribing!</p>
            <p id="mail-text-3" class="black-text font-size-20px">The email address you have<br>specified is already subscribed<br>to the mailling list.</p>
            <div class="margin-24px"></div>
            <div id="subscription-form" class="subscription-form">
                <form action="#mailing-list" method="post">
                    <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required>
                    <div class="margin-30px"></div>
                    <input type="submit" name="subscribe" value="Subscribe" class="subscribe-button">
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
                    <a class="white-hyperlink" href="../index.php" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="../about-us.php" class="white">
                        <li class="padding-bottom">About us</li>
                    </a>
                    <a class="white-hyperlink" href="../e-waste/we-buy.php" class="white">
                        <li class="padding-bottom">E-waste we buy</li>
                    </a>
                    <a class="white-hyperlink" href="../e-waste/we-sell.php" class="white">
                        <li class="padding-bottom">E-waste we sell</li>
                    </a>
                    <a class="white-hyperlink" href="../services.php" class="white">
                        <li class="padding-bottom">Services</li>
                    </a>
                    <a class="white-hyperlink" href="../faq.php" class="white">
                        <li class="padding-bottom">FAQ</li>
                    </a>
                    <a class="white-hyperlink" href="../contact-us.php" class="white">
                        <li class="padding-bottom">Contact us</li>
                    </a>
                </ul>
            </div>
            <div id="footer-container-3">
            <div id="mailing-list"></div>
                <p id="mail-text-1" class="black-text">Subscribe to our mailing list<br>to be notified of latest news.</p>
                <p id="mail-text-2" class="black-text font-size-20px">Thank you for subscribing!</p>
                <p id="mail-text-3" class="black-text font-size-20px">The email address you have<br>specified is already subscribed<br>to the mailling list.</p>
                <div class="margin-24px"></div>
                <div id="subscription-form" class="subscription-form">
                    <form action="#mailing-list" method="post">
                        <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required>
                        <div class="margin-30px"></div>
                        <input type="submit" name="subscribe" value="Subscribe" class="subscribe-button">
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
