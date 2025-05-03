
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

// Users who are not system administrators (sysadmins)
// are not allowed to access this page.
if ($is_admin != 2) {
    header('Location: ../../index.php');
}

// Set a the default timezone for date and time.
date_default_timezone_set('Asia/Singapore');

// Set the date and time format (YYYY-MM-DD HH-MM-SS Timezone).
$date = date('Y-m-d H:i:s P');

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

    <title>Quantum E-waste Management System - Admin - Screen user requests (Approve)</title>

    <!-- Cascading Style Sheets -->
    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/navigation-bar-buttons.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/e-waste-requests.css" rel="stylesheet">
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
            <a href="../../view-transactions/index.php" onclick="closeNav()">View transactions</a>
            <a href="../../payment/index.php" onclick="closeNav()">Proof of Payment</a>
            <a href="../../account/profile/index.php" onclick="closeNav()">Manage/Edit Profile</a>
            <a href="../../account/logout.php" onclick="closeNav()">Logout</a>
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
            <a href="../../admin/statistics/index.php" onclick="closeNav()">Statistics</a>
            <a href="../../admin/database-query.php" onclick="closeNav()">Database Query</a>
            <div class="margin-100px"></div>
            HTML;
            echo $html;
        }
        else if (@$is_admin == 2) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <a href="../../admin/index.php" onclick="closeNav()">Admin control panel</a>
            <a href="../../admin/e-waste-requests/index.php" onclick="closeNav()">Screen user requests (Approve/Reject)</a>
            <a href="../../admin/statistics/index.php" onclick="closeNav()">Statistics</a>
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
                                <a class="menu" href="../../dashboard.php">Dashboard</a>
                                <a class="menu" href="../../account/profile/index.php">Profile</a>
                                <a class="menu" href="../../account/logout.php">Logout</a>
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
                        <a class='black-hyperlink' href='../../dashboard.php#admin-navigation'>
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

        <div class="page-title-banner-3-container">
            <div class="page-title-banner-3-content">Screen user requests (Approve)</div>
        </div>

        <div class="margin-30px"></div>
        <!-- <br> -->

        <!-- Layout for the container 4. -->
        <div id="container-4-container">
            <div id="container-4-contents">
            <div class="margin-30px"></div>

                <?php
                // Include the PHP script for re-connecting to the database (DB).
                include '../../php/connection.php';

                // Check if the form has been submitted.
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get the form data from the previous webpage.
                    @$request_id = $_POST["request_id"];

                    // Get the request type.
                    // Declare a variable for the query.
                    $sql_query_1 = "SELECT * FROM `requests` WHERE
                                    request_id = '$request_id'";

                    // Attempt to connect to the database and execute the query.
                    $sql_query_1_result = $connection->query($sql_query_1);

                    // Get the result and insert into the variable.
                    while ($sql_query_1_row = $sql_query_1_result->fetch_assoc()) {
                        $request_type = $sql_query_1_row['request_type'];
                        $item_quantity = $sql_query_1_row['item_quantity'];
                        $request_status = $sql_query_1_row['request_status'];
                        $item_id = $sql_query_1_row['item_id'];
                    }

                    // Get the item price.
                    // Declare a variable for the query.
                    $sql_query_2 = "SELECT * FROM `items` WHERE
                                    item_id = '$item_id'";

                    // Attempt to connect to the database and execute the query.
                    $sql_query_2_result = $connection->query($sql_query_2);

                    // Get the result and inset into the variable.
                    while ($sql_query_2_row = $sql_query_2_result->fetch_assoc()) {
                        $item_price = $sql_query_2_row['item_price'];
                    }

                    // Price calculation for the sum of the item(s).
                    settype($item_price, "integer");
                    settype($item_quantity, "integer");
                    settype($total_cost, "integer");
                    $total_cost = $item_price * $item_quantity;

                    // For debugging only.
                    /*
                    echo "REQUEST_METHOD<br>";
                    echo "Request ID: " . $request_id . "<br>";
                    echo "Request type: " . $request_type . "<br>";
                    echo "Item quantity: " . $item_quantity . "<br>";
                    echo "Request status: " . $request_status . "<br>";
                    echo "Item ID: " . $item_id . "<br>";
                    echo "Item Price: " . $item_price . "<br>";
                    echo "Total cost: " . $total_cost . "<br><br>";
                    */

                    // Determine if the request type is a "Buy" or "Sell".
                    // Customer buy = Receivable
                    // Supplier sell = Payable
                    if ($request_type == "Buy") {
                        // Declare a variable for the query.
                        $sql_query_3 = "INSERT INTO `accounts_receivable` (amount_receivable,
                                        receivable_date, request_id)
                                        VALUES ('$total_cost', '$date', '$request_id')";

                        // Attempt to connect to the database and execute the query.
                        $sql_query_3_result = $connection->query($sql_query_3);

                        // Declare a variable for the query.
                        $sql_query_4 = "SELECT * FROM `accounts_receivable`";

                        // Attempt to connect to the database and execute the query.
                        $sql_query_4_result = $connection->query($sql_query_4);

                        // Get the row count.
                        $sql_query_4_row_count = $sql_query_4_result->num_rows;
                        // $sql_query_4_row_count++;

                        // Declare a variable for the query.
                        $sql_query_5 = "UPDATE `requests`
                                        SET request_status = 'Pending payment',
                                        accounts_receivable_id = '$sql_query_4_row_count'
                                        WHERE request_id = '$request_id'
                                        AND request_status = 'Pending'";

                        // Attempt to connect to the database and execute the query.
                        $sql_query_5_result = $connection->query($sql_query_5);

                        // For debugging only.
                        /*
                        echo "<br>Update tables when request type is 'Buy'<br>";
                        echo "Request ID: " . $request_id . "<br>";
                        echo "Request type: " . $request_type . "<br>";
                        echo "Item quantity: " . $item_quantity . "<br>";
                        echo "Request status: " . $request_status . "<br>";
                        echo "Item ID: " . $item_id . "<br>";
                        echo "Item Price: " . $item_price . "<br>";
                        echo "Total cost: " . $total_cost . "<br>";
                        */
                    }
                    else if ($request_type == "Sell") {
                        // Declare a variable for the query.
                        $sql_query_6 = "INSERT INTO `accounts_payable` (amount_payable,
                                        payable_date, request_id)
                                        VALUES ('$total_cost', '$date', '$request_id')";

                        // Attempt to connect to the database and execute the query.
                        $sql_query_6_result = $connection->query($sql_query_6);

                        // Declare a variable for the query.
                        $sql_query_7 = "SELECT * FROM `accounts_payable`";

                        // Attempt to connect to the database and execute the query.
                        $sql_query_7_result = $connection->query($sql_query_7);

                        // Get the row count
                        $sql_query_7_row_count = $sql_query_7_result->num_rows;
                        // $sql_query_7_row_count++;

                        // Declare a variable for the query.
                        $sql_query_8 = "UPDATE `requests`
                                        SET request_status = 'Approved',
                                        accounts_payable_id = '$sql_query_7_row_count'
                                        WHERE request_id = '$request_id'
                                        AND request_status = 'Pending'";

                        // Attempt to connect to the database and execute the query.
                        $sql_query_8_result = $connection->query($sql_query_8);

                        // For debugging only.
                        /*
                        echo "<br>Update tables when request type is 'Sell'<br>";
                        echo "Request ID: " . $request_id . "<br>";
                        echo "Request type: " . $request_type . "<br>";
                        echo "Item quantity: " . $item_quantity . "<br>";
                        echo "Request status: " . $request_status . "<br>";
                        echo "Item ID: " . $item_id . "<br>";
                        echo "Item Price: " . $item_price . "<br>";
                        echo "Total cost: " . $total_cost . "<br>";
                        */
                    }

                    // Declare a variable for the query.
                    $sql_query_9 = "SELECT * FROM requests
                                    WHERE request_id = '$request_id'";

                    // Attempt to connect to the database and execute the query.
                    $sql_query_9_result = $connection->query($sql_query_9);

                    while ($sql_query_9_row = $sql_query_9_result->fetch_assoc()) {
                        $request_status = $sql_query_9_row['request_status'];
                    }

                    if ($request_status == "Approved") {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <h2>User request has been successfully approved!</h2>
                        <div class="margin-30px"></div>
                        HTML;
                        echo $html;
                    }
                    else  {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <h2>User request approval is unsuccessful.</h2>
                        <div class="margin-30px"></div>
                        HTML;
                        echo $html;
                    }
                }

                // Ensure the connection to the DB is closed, with or without
                // any code or query execution for security reasons.
                $connection->close();
                ?>

                <p>Here are the details of the user's request.</p>
                <div class="margin-30px"></div>

                <!-- Requests table container -->
                <div>
                    <div class="requests-table">
                        <?php
                        // Attempt to make a new connection to the database.
                        include '../../php/connection.php';

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
                                <th>User ID</th>
                                <th>Item ID</th>
                        HTML;
                        echo $html;

                        if ($request_type == "Buy") {
                            echo "<th>Accounts Receivable ID</th>";
                        }
                        else if ($request_type == "Sell") {
                            echo "<th>Accounts Payable ID</th>";
                        }

                        echo "</tr>";

                        // Declare a variable for the query.
                        $sql_query_10 = "SELECT * FROM `requests`
                                        WHERE request_id = $request_id";

                        // Attempt to connect to the database and execute the query.
                        $sql_query_10_result = $connection->query($sql_query_10);
                        
                        // Insert the each of the results into the table.
                        while($sql_query_10_row = $sql_query_10_result->fetch_assoc()) {
                            // Use heredoc syntax to make the code readable and easier to maintain.
                            // Very useful for handling large blocks of of codes.
                            $html = <<<HTML
                            <tr>
                                <td>{$sql_query_10_row['request_id']}</td>
                                <td>{$sql_query_10_row['request_date']}</td>
                                <td>{$sql_query_10_row['request_type']}</td>
                                <td>{$sql_query_10_row['request_item_name']}</td>
                                <td>{$sql_query_10_row['item_quantity']}</td>
                                <td>{$sql_query_10_row['request_status']}</td>
                                <td>{$sql_query_10_row['user_id']}</td>
                                <td>{$sql_query_10_row['item_id']}</td>
                            HTML;
                            echo $html;
                        }

                        if ($request_type == "Buy") {
                            // Declare a variable for the query.
                            $sql_query_11 = "SELECT * FROM `requests`
                                            WHERE request_id = $request_id";

                            // Attempt to connect to the database and execute the query.
                            $sql_query_11_result = $connection->query($sql_query_11);
                            
                            // Insert the each of the results into the table.
                            while($sql_query_11_row = $sql_query_11_result->fetch_assoc()) {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <td>{$sql_query_11_row['accounts_receivable_id']}</td>
                                HTML;
                                echo $html;
                            }
                        }
                        else if ($request_type == "Sell") {
                            // Declare a variable for the query.
                            $sql_query_12 = "SELECT * FROM `requests`
                                            WHERE request_id = $request_id";

                            // Attempt to connect to the database and execute the query.
                            $sql_query_12_result = $connection->query($sql_query_12);
                            
                            // Insert the each of the results into the table.
                            while($sql_query_12_row = $sql_query_12_result->fetch_assoc()) {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <td>{$sql_query_12_row['accounts_payable_id']}</td>
                                HTML;
                                echo $html;
                            }
                        }
                        // Ensure the connection to the DB is closed, with or without
                        // any code or query execution for security reasons.
                        $connection->close();
                        ?>

                            </div>
                        </table>
                    </div>
                </div>
                <div class="margin-60px"></div>
                <div class="container-3-contents-3-container">
                    <a class="container-3-contents-3" href="../../admin/e-waste-requests/index.php">
                        <p>Return to screen user requests page</p>
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
        <br class="mobile-line-break">
        <br class="mobile-line-break"> -->

        <div id="footer-container" class="footer-text">
            <div id="footer-container-2">
                <p class="footer-text-2">Sitemap</p>
                <ul>
                    <a class="white-hyperlink" href="../../index.php" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="../../about-us.php" class="white">
                        <li class="padding-bottom">About us</li>
                    </a>
                    <a class="white-hyperlink" href="../../e-waste/we-buy.php" class="white">
                        <li class="padding-bottom">E-waste we buy</li>
                    </a>
                    <a class="white-hyperlink" href="../../e-waste/we-sell.php" class="white">
                        <li class="padding-bottom">E-waste we sell</li>
                    </a>
                    <a class="white-hyperlink" href="../../services.php" class="white">
                        <li class="padding-bottom">Services</li>
                    </a>
                    <a class="white-hyperlink" href="../../faq.php" class="white">
                        <li class="padding-bottom">FAQ</li>
                    </a>
                    <a class="white-hyperlink" href="../../contact-us.php" class="white">
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
