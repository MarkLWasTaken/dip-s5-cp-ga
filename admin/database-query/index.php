
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

    // Users who are not website administrators (admins) are not allowed to access this page.
    if ($is_admin != 1) {
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

    <title>Quantum E-waste Management System - Admin - Database/Table Query</title>

    <!-- Cascading Style Sheets -->
    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/database-query.css" rel="stylesheet">
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
        <a href="../../e-waste-we-buy/index.php" onclick="closeNav()">E-waste we buy</a>
        <a href="../../e-waste-we-sell/index.php" onclick="closeNav()">E-waste we sell</a>
        <a href="../../services/index.php" onclick="closeNav()">Services</a>
        <a href="../../faq/index.php" onclick="closeNav()">FAQ</a>
        <a href="../../contact/index.php" onclick="closeNav()">Contact us</a>
        <?php
            // If the user is logged in.
            if (isset($_SESSION['email_address'])) {
                // Use heredoc syntax to make the code readable and easier to maintain.
                // Very useful for handling large blocks of of codes.
                $html = <<<HTML
                <div class="margin-50px"></div>
                <!-- <a href="javascript:void(0)" style="opacity: 0;">Blank space</a> -->
                <a href="javascript:void(0)">&#128994; User is logged in.</a>
                <a href="../../dashboard/index.php" onclick="closeNav()">Dashboard</a>
                <a href="../../buy-sell-request/index.php" onclick="closeNav()">Buy/Sell Request</a>
                <a href="../../tracking/index.php" onclick="closeNav()">Tracking</a>
                <a href="../../transactions-history/index.php" onclick="closeNav()">Transactions history</a>
                <a href="../../requests-history/index.php" onclick="closeNav()">Requests history</a>
                <a href="../../profile/index.php" onclick="closeNav()">Manage/Edit Profile</a>
                <a href="../../account/logout/index.php" onclick="closeNav()">Logout</a>
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
                <a href="#" onclick="closeNav()">Manage users</a>
                <a href="../../admin/statistics/index.php" onclick="closeNav()">Statistics</a>
                <a href="admin/database-query/index.php" onclick="closeNav()">Database Query</a>
                <div class="margin-100px"></div>
                HTML;
                echo $html;
            }
            else if (@$is_admin == 2) {
                // Use heredoc syntax to make the code readable and easier to maintain.
                // Very useful for handling large blocks of of codes.
                $html = <<<HTML
                <a href="../../admin/index.php" onclick="closeNav()">Admin control panel</a>
                <a href="../../admin/e-waste-requests/index.php" onclick="closeNav()">E-waste request screening/acceptance</a>
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
                    <img class="header-image" src="../../images/desktop-computer-svgrepo-com.svg" alt="Computer." title="Computer.">
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
                <a class="black-hyperlink" href="../../about_us/index.php">
                    <div class="menu-button">
                        About us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../e-waste-we-buy/index.php">
                    <div class="menu-button">
                        E-waste<br>we buy
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../e-waste-we-sell/index.php">
                    <div class="menu-button">
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
                <a class="black-hyperlink" href="../../contact_us/index.php">
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

        <div class="margin-20px-desktop"></div>
        <!-- <br class="desktop-line-break"> -->

        <div class="title-banner-container">
            <div class="title-banner-content">Admin - Database/Table Query</div>
        </div>

        <div class="margin-30px"></div>
        <!-- <br> -->

        <div class="query-table-container">
            <form action="index.php" method="post">
                <div class="query-table-content-1">
                    <table>
                        <tr>
                            <th colspan="2" style="padding-left: 0; text-align: center;">Database Query</th>
                        </tr>
                        <tr>
                            <th>Table Name:</th>
                            <td>
                                <!-- Combo box for list of tables found in the database. -->
                                <?php
                                    // Declare a variable for the query.
                                    $query_show_tables = "SHOW TABLES";

                                    // Attempt to conenct to the DB, execute the query and get results.
                                    $result_show_tables = mysqli_query($connection, $query_show_tables);

                                    // Suppress the warning message when the variables are null or empty.
                                    // Get the selected value from the combo box.
                                    @$selected_table = $_POST['cbTableName'];

                                    // Store the variable in session.
                                    $_SESSION['selected_table'] = $selected_table;

                                    // Display the combo box.
                                    echo '<select class="table-names-cb" name="cbTableName">';
                                    echo '<option value=""></option>';

                                    // Check if 'selected_table' is not set.
                                    if (!isset($_SESSION['selected_table'])) {
                                        // Insert the each of the results into combo box.
                                        while ($table_name = $result_show_tables->fetch_assoc()) {
                                            // Check if the current table name is the selected one
                                            if ($table_name['Tables_in_' . $database] == $selected_table) {
                                                echo '<option selected="selected" value="' . $selected_table . '">' . $selected_table . '</option>';
                                            } else {
                                                echo '<option value="' . $table_name['Tables_in_' . $database] . '">' . $table_name['Tables_in_' . $database] . '</option>';
                                            }
                                        }

                                        // Store the variable in session.
                                        $_SESSION['selected_table'] = $selected_table;

                                    }
                                    // Check if 'selected_table' is set.
                                    else if (isset($_SESSION['selected_table'])) {
                                        // Insert the each of the results into combo box.
                                        while ($table_name = $result_show_tables->fetch_assoc()) {
                                            // Check if the current table name is the selected one
                                            if ($table_name['Tables_in_' . $database] == $selected_table) {
                                                echo '<option selected="selected" value="' . $selected_table . '">' . $selected_table . '</option>';
                                            } else {
                                                echo '<option value="' . $table_name['Tables_in_' . $database] . '">' . $table_name['Tables_in_' . $database] . '</option>';
                                            }
                                        }

                                        // Store the variable in session.
                                        $_SESSION['selected_table'] = $selected_table;

                                    }
                                    echo '</select>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" value="Search from the database"></td>
                        </tr>
                    </table>
                </div>

                <div class="hidden-div"></div>

                <?php
                    // Prevent the display of the two tables while no tables were selected.
                    if ($_SESSION['selected_table'] == '') {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <style>
                            .query-table-content-2 {
                                opacity: 0;
                            }
                        </style>
                        HTML;
                        echo $html;
                    }
                ?>
                <div class="query-table-content-2">
                    <table id="table-query">
                        <tr>
                            <th colspan="2" style="padding-left: 0; text-align: center;">
                                <?php // Dynamically change the table name based on what's selected.?>
                                "<?php echo $_SESSION['selected_table'];?>" Table Query
                            </th>
                        </tr>
                        <?php
                            // "accounts_payable" table query options.
                            if ($_SESSION['selected_table'] == 'accounts_payable') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Amount Payable:</th>
                                    <td><input type="text" name="txtAmountPayable" id=""></td>
                                </tr>
                                <tr>
                                    <th>Request ID:</th>
                                    <td><input type="text" name="txtRequestID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtAmountPayable'] = $_POST['txtAmountPayable'];
                                @$_SESSION['txtRequestID'] = $_POST['txtRequestID'];
                            }
                            // "accounts_receivable" table query options.
                            else if ($_SESSION['selected_table'] == 'accounts_receivable') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Amount Receivable:</th>
                                    <td><input type="text" name="txtAmountReceivable" id=""></td>
                                </tr>
                                <tr>
                                    <th>Request ID:</th>
                                    <td><input type="text" name="txtRequestID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtAmountReceivable'] = $_POST['txtAmountReceivable'];
                                @$_SESSION['txtRequestID'] = $_POST['txtRequestID'];
                            }
                            // "contact_us" table query options.
                            else if ($_SESSION['selected_table'] == 'contact_us') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td><input type="text" name="txtName" id=""></td>
                                </tr>
                                <tr>
                                    <th>Email Address:</th>
                                    <td><input type="email" name="txtEmail" id="" class="query-table-email-field"></td>
                                </tr>
                                <tr>
                                    <th>Message:</th>
                                    <td><input type="text" name="txtMessage" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Submitted:</th>
                                    <td><input type="text" name="txtDateSubmitted" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtName'] = $_POST['txtName'];
                                @$_SESSION['txtEmail'] = $_POST['txtEmail'];
                                @$_SESSION['txtMessage'] = $_POST['txtMessage'];
                                @$_SESSION['txtDateSubmitted'] = $_POST['txtDateSubmitted'];
                            }
                            // "faq" table query options.
                            else if ($_SESSION['selected_table'] == 'faq') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>FAQ Question:</th>
                                    <td><input type="text" name="txtFAQQuestion" id=""></td>
                                </tr>
                                <tr>
                                    <th>FAQ Answer:</th>
                                    <td><input type="text" name="txtFAQAnswer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtFAQQuestion'] = $_POST['txtFAQQuestion'];
                                @$_SESSION['txtFAQAnswer'] = $_POST['txtFAQAnswer'];
                            }
                            // "feedbacks" table query options.
                            else if ($_SESSION['selected_table'] == 'feedbacks') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Submitted:</th>
                                    <td><input type="text" name="txtDateSubmitted" id=""></td>
                                </tr>
                                <tr>
                                    <th>Content:</th>
                                    <td><input type="text" name="txtFAQContent" id=""></td>
                                </tr>
                                <tr>
                                    <th>User ID:</th>
                                    <td><input type="text" name="txtUserID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtDateSubmitted'] = $_POST['txtDateSubmitted'];
                                @$_SESSION['txtFAQContent'] = $_POST['txtFAQContent'];
                                @$_SESSION['txtUserID'] = $_POST['txtUserID'];
                            }
                            // "items" table query options.
                            else if ($_SESSION['selected_table'] == 'items') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Item Name:</th>
                                    <td><input type="text" name="txtItemName" id=""></td>
                                </tr>
                                <tr>
                                    <th>Item Price:</th>
                                    <td><input type="text" name="txtItemPrice" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtItemName'] = $_POST['txtItemName'];
                                @$_SESSION['txtItemPrice'] = $_POST['txtItemPrice'];
                            }
                            // "mailing_list" table query options.
                            else if ($_SESSION['selected_table'] == 'mailing_list') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Email Address:</th>
                                    <td><input type="email" name="txtEmail" id="" class="query-table-email-field"></td>
                                </tr>
                                <tr>
                                    <th>Is subscribed?</th>
                                    <td>
                                        <div class="radio-choice">
                                            <div class="radio-choices">
                                                <input type="radio" id="yes" name="rdoSubscribed" value="1">
                                                <label for="yes">Yes</label><br>
                                            </div>
                                            <div class="radio-choices">
                                                <input type="radio" id="no" name="rdoSubscribed" value="0">
                                                <label for="no">No</label><br>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date First Subscribed:</th>
                                    <td><input type="text" name="txtDateFirstSubscribed" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Modified:</th>
                                    <td><input type="text" name="txtDateModified" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtEmail'] = $_POST['txtEmail'];
                                @$_SESSION['rdoSubscribed'] = $_POST['rdoSubscribed'];
                                @$_SESSION['txtDateFirstSubscribed'] = $_POST['txtDateFirstSubscribed'];
                                @$_SESSION['txtDateModified'] = $_POST['txtDateModified'];
                            }
                            // "requests" table query options.
                            else if ($_SESSION['selected_table'] == 'requests') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Request Date:</th>
                                    <td><input type="text" name="txtRequestDate" id=""></td>
                                </tr>
                                <tr>
                                    <th>Request Type:</th>
                                    <td><input type="text" name="txtRequestType" id=""></td>
                                </tr>
                                <tr>
                                    <th>Item Quantity:</th>
                                    <td><input type="text" name="txtItemQuantity" id=""></td>
                                </tr>
                                <tr>
                                    <th>Request Status:</th>
                                    <td><input type="text" name="txtRequestStatus" id=""></td>
                                </tr>
                                <tr>
                                    <th>User ID:</th>
                                    <td><input type="text" name="txtUserID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Item ID:</th>
                                    <td><input type="text" name="txtItemID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Accounts Payable ID:</th>
                                    <td><input type="text" name="txtAccountsPayableID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Accoutns Receivable ID:</th>
                                    <td><input type="text" name="txtAccountsReceivableID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtRequestDate'] = $_POST['txtRequestDate'];
                                @$_SESSION['txtRequestType'] = $_POST['txtRequestType'];
                                @$_SESSION['txtItemQuantity'] = $_POST['txtItemQuantity'];
                                @$_SESSION['txtRequestStatus'] = $_POST['txtRequestStatus'];
                                @$_SESSION['txtUserID'] = $_POST['txtUserID'];
                                @$_SESSION['txtItemID'] = $_POST['txtItemID'];
                                @$_SESSION['txtAccountsPayableID'] = $_POST['txtAccountsPayableID'];
                                @$_SESSION['txtAccountsReceivableID'] = $_POST['txtAccountsReceivableID'];
                            }
                            // "sales_request_tracking" table query options.
                            else if ($_SESSION['selected_table'] == 'sales_request_tracking') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Packing Date:</th>
                                    <td><input type="text" name="txtPackingDate" id=""></td>
                                </tr>
                                <tr>
                                    <th>Delivery Date:</th>
                                    <td><input type="text" name="txtDeliveryDate" id=""></td>
                                </tr>
                                <tr>
                                    <th>Delivery Status:</th>
                                    <td><input type="text" name="txtDeliveryStatus" id=""></td>
                                </tr>
                                <tr>
                                    <th>Request ID:</th>
                                    <td><input type="text" name="txtRequestID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtPackingDate'] = $_POST['txtPackingDate'];
                                @$_SESSION['txtDeliveryDate'] = $_POST['txtDeliveryDate'];
                                @$_SESSION['txtDeliveryStatus'] = $_POST['txtDeliveryStatus'];
                                @$_SESSION['ttxtRequestIDxt'] = $_POST['txtRequestID'];
                            }
                            // "users" table query options.
                            else if ($_SESSION['selected_table'] == 'users') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>First Name:</th>
                                    <td><input type="text" name="txtFName" id=""></td>
                                </tr>
                                <tr>
                                    <th>Last Name:</th>
                                    <td><input type="text" name="txtLName" id=""></td>
                                </tr>
                                <tr>
                                    <th>Email Address:</th>
                                    <td><input type="email" name="txtEmail" id="" class="query-table-email-field"></td>
                                </tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td>
                                        <div class="radio-choice">
                                            <div class="radio-choices">
                                            <input type="radio" id="male" name="rdoGender" value="Male">
                                            <label for="male">Male</label><br>
                                        </div>
                                        <div class="radio-choices">
                                            <input type="radio" id="female" name="rdoGender" value="Female">
                                            <label for="female">Female</label><br>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td><input type="text" name="txtCountry" id=""></td>
                                </tr>
                                <tr>
                                    <th>Is admin?</th>
                                    <td>
                                        <div class="radio-choice">
                                            <div class="radio-choices">
                                                <input type="radio" id="user" name="rdoAdmin" value="0">
                                                <label for="no">User</label><br>
                                            </div>
                                            <div class="radio-choices">
                                                <input type="radio" id="systemadmin" name="rdoAdmin" value="1">
                                                <label for="yes">System Admin</label><br>
                                            </div>
                                            <div class="radio-choices">
                                                <input type="radio" id="officeadmin" name="rdoAdmin" value="2">
                                                <label for="yes">Office Admin</label><br>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date Created:</th>
                                    <td><input type="text" name="txtDateCreated" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Modified:</th>
                                    <td><input type="text" name="txtDateModified" id=""></td>
                                </tr>
                                <tr>
                                    <th>Action:</th>
                                    <td><input type="submit" value="Search from the table"></td>
                                </tr>
                                HTML;
                                echo $html;

                                // Declare the variables and store it in the session.
                                // Suppress the warning message when the variables are null or empty.
                                @$_SESSION['txtID'] = $_POST['txtID'];
                                @$_SESSION['txtFName'] = $_POST['txtFName'];
                                @$_SESSION['txtLName'] = $_POST['txtLName'];
                                @$_SESSION['txtEmail'] = $_POST['txtEmail'];
                                @$_SESSION['rdoGender'] = $_POST['rdoGender'];
                                @$_SESSION['txtCountry'] = $_POST['txtCountry'];
                                @$_SESSION['rdoAdmin'] = $_POST['rdoAdmin'];
                                @$_SESSION['txtDateCreated'] = $_POST['txtDateCreated'];
                                @$_SESSION['txtDateModified'] = $_POST['txtDateModified'];
                            }
                        ?>
                    </table>
                </div>
            </form>

            <div class="hidden-div"></div>

            <div class="query-table-content-3">
                <?php
                    if (isset($_SESSION['selected_table'])) {
                        echo '<table class="manage-rows-table" border=1>';
                            // "accounts_payable" table query.
                            if ($_SESSION['selected_table'] == 'accounts_payable') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Amount Payable</th>
                                        <th>Request ID</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $accounts_payable_id  = $_SESSION['txtID'];
                                $amount_payable = $_SESSION['txtAmountPayable'];
                                $request_id = $_SESSION['txtRequestID'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    accounts_payable_id LIKE '%$accounts_payable_id%' AND
                                                    amount_payable LIKE '%$amount_payable%' AND
                                                    request_id LIKE '%$request_id%'
                                                    ORDER BY accounts_payable_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                    // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['accounts_payable_id']}</td>
                                        <td>{$row['amount_payable']}</td>
                                        <td>{$row['request_id']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // "accounts_receivable" table query.
                            else if ($_SESSION['selected_table'] == 'accounts_receivable') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Amount Receivable</th>
                                        <th>Request ID</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $accounts_receivable_id  = $_SESSION['txtID'];
                                $amount_receivable = $_SESSION['txtAmountReceivable'];
                                $request_id = $_SESSION['txtRequestID'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    accounts_receivable_id LIKE '%$accounts_receivable_id%' AND
                                                    amount_receivable LIKE '%$amount_receivable%' AND
                                                    request_id LIKE '%$request_id%'
                                                    ORDER BY accounts_receivable_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                    // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['accounts_receivable_id']}</td>
                                        <td>{$row['amount_receivable']}</td>
                                        <td>{$row['request_id']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // "contact_us" table query.
                            else if ($_SESSION['selected_table'] == 'contact_us') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>Message</th>
                                        <th>Date Submitted</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $contact_us_id  = $_SESSION['txtID'];
                                $name = $_SESSION['txtName'];
                                $email_address = $_SESSION['txtEmail'];
                                $message = $_SESSION['txtMessage'];
                                $date_submitted = $_SESSION['txtDateSubmitted'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    contact_us_id LIKE '%$contact_us_id%' AND
                                                    name LIKE '%$name%' AND
                                                    email_address LIKE '%$email_address%' AND
                                                    message LIKE '%$message%' AND
                                                    date_submitted LIKE '%$date_submitted%'
                                                    ORDER BY contact_us_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                    // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['contact_us_id']}</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['email_address']}</td>
                                        <td>{$row['message']}</td>
                                        <td>{$row['date_submitted']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // "faq" table query.
                            else if ($_SESSION['selected_table'] == 'faq') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>FAQ Question</th>
                                        <th>FAQ Answer</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $faq_id  = $_SESSION['txtID'];
                                $faq_question = $_SESSION['txtFAQQuestion'];
                                $faq_answer = $_SESSION['txtFAQAnswer'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    faq_id LIKE '%$faq_id%' AND
                                                    faq_question LIKE '%$faq_question%' AND
                                                    faq_answer LIKE '%$faq_answer%'
                                                    ORDER BY faq_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                    // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['faq_id']}</td>
                                        <td>{$row['faq_question']}</td>
                                        <td>{$row['faq_answer']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // "feedbacks" table query
                            else if ($_SESSION['selected_table'] == 'feedbacks') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Date Submitted</th>
                                        <th>Content</th>
                                        <th>User ID</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $feedbacks_id  = $_SESSION['txtID'];
                                $feedback_date = $_SESSION['txtDateSubmitted'];
                                $content = $_SESSION['txtFAQContent'];
                                $user_id = $_SESSION['txtUserID'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    feedbacks_id LIKE '%$feedbacks_id%' AND
                                                    feedback_date LIKE '%$feedback_date%' AND
                                                    content LIKE '%$content%' AND
                                                    user_id LIKE '%$user_id%'
                                                    ORDER BY feedbacks_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {                                // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['feedbacks_id']}</td>
                                        <td>{$row['feedback_date']}</td>
                                        <td>{$row['content']}</td>
                                        <td>{$row['user_id']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // "items" table query
                            else if ($_SESSION['selected_table'] == 'items') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Item Name</th>
                                        <th>Item Price</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $item_id  = $_SESSION['txtID'];
                                $item_name = $_SESSION['txtItemName'];
                                $item_price = $_SESSION['txtItemPrice'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    item_id LIKE '%$item_id%' AND
                                                    item_name LIKE '%$item_name%' AND
                                                    item_price LIKE '%$item_price%'
                                                    ORDER BY item_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {                                // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['item_id']}</td>
                                        <td>{$row['item_name']}</td>
                                        <td>{$row['item_price']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // "mailing_list" table query
                            else if ($_SESSION['selected_table'] == 'mailing_list') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Email Address</th>
                                        <th>Is Subscribed</th>
                                        <th>Date First Subscribed</th>
                                        <th>Date Modified</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $mailing_list_id = $_SESSION['txtID'];
                                $email_address = $_SESSION['txtEmail'];
                                $is_subscribed = $_SESSION['rdoSubscribed'];
                                $date_first_subscribed = $_SESSION['txtDateFirstSubscribed'];
                                $date_modified = $_SESSION['txtDateModified'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    mailing_list_id LIKE '%$mailing_list_id%' AND
                                                    email_address LIKE '%$email_address%' AND
                                                    is_subscribed LIKE '%$is_subscribed%' AND
                                                    date_first_subscribed LIKE '%$date_first_subscribed%' AND
                                                    date_modified LIKE '%$date_modified%'
                                                    ORDER BY mailing_list_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {                                // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['mailing_list_id']}</td>
                                        <td>{$row['email_address']}</td>
                                        <td>{$row['is_subscribed']}</td>
                                        <td>{$row['date_first_subscribed']}</td>
                                        <td>{$row['date_modified']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // "requests" table query
                            else if ($_SESSION['selected_table'] == 'requests') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Request Date</th>
                                        <th>Request Type</th>
                                        <th>Item Quantity</th>
                                        <th>Request Status</th>
                                        <th>User ID</th>
                                        <th>Item ID</th>
                                        <th>Accounts Payable ID</th>
                                        <th>Accounts Receivable ID</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $request_id = $_SESSION['txtID'];
                                $request_date = $_SESSION['txtRequestDate'];
                                $request_type = $_SESSION['txtRequestType'];
                                $item_quantity = $_SESSION['txtItemQuantity'];
                                $request_status = $_SESSION['txtRequestStatus'];
                                $user_id = $_SESSION['txtUserID'];
                                $item_id = $_SESSION['txtItemID'];
                                $accounts_payable_id = $_SESSION['txtAccountsPayableID'];
                                $accounts_receivable_id = $_SESSION['txtAccountsReceivableID'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    request_id LIKE '%$request_id%' AND
                                                    request_date LIKE '%$request_date%' AND
                                                    request_type LIKE '%$request_type%' AND
                                                    item_quantity LIKE '%$item_quantity%' AND
                                                    request_status LIKE '%$request_status%' AND
                                                    user_id LIKE '%$user_id%' AND
                                                    item_id LIKE '%$item_id%' AND
                                                    accounts_payable_id LIKE '%$accounts_payable_id%' AND
                                                    accounts_receivable_id LIKE '%$accounts_receivable_id%'
                                                    ORDER BY request_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {                                // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['request_id']}</td>
                                        <td>{$row['request_date']}</td>
                                        <td>{$row['request_type']}</td>
                                        <td>{$row['item_quantity']}</td>
                                        <td>{$row['request_status']}</td>
                                        <td>{$row['user_id']}</td>
                                        <td>{$row['item_id']}</td>
                                        <td>{$row['accounts_payable_id']}</td>
                                        <td>{$row['accounts_receivable_id']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // "sales_request_tracking" table query
                            else if ($_SESSION['selected_table'] == 'sales_request_tracking') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Packing Date</th>
                                        <th>Delivery Date</th>
                                        <th>Delivery Status</th>
                                        <th>Request ID</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $sales_request_tracking_id = $_SESSION['txtID'];
                                $packing_date = $_SESSION['txtPackingDate'];
                                $delivery_date = $_SESSION['txtDeliveryDate'];
                                $delivery_status = $_SESSION['txtDeliveryStatus'];
                                $request_id = $_SESSION['txtRequestID'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    sales_request_tracking_id LIKE '%$sales_request_tracking_id%' AND
                                                    packing_date LIKE '%$packing_date%' AND
                                                    delivery_date LIKE '%$delivery_date%' AND
                                                    delivery_status LIKE '%$delivery_status%' AND
                                                    request_id LIKE '%$request_id%'
                                                    ORDER BY sales_request_tracking_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {                                // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                    <tr>
                                        <td>{$row['sales_request_tracking_id']}</td>
                                        <td>{$row['packing_date']}</td>
                                        <td>{$row['delivery_date']}</td>
                                        <td>{$row['delivery_status']}</td>
                                        <td>{$row['request_id']}</td>
                                    </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
// 54rhhtebtbrrnybtrgvcefwdxxgyt
                            // "users" table query.
                            else if ($_SESSION['selected_table'] == 'users') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email Address</th>
                                        <th>Gender</th>
                                        <th>Country</th>
                                        <th>Is Admin</th>
                                        <th colspan="2" style="text-align: center;">Actions</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $user_id = $_SESSION['txtID'];
                                $first_name = $_SESSION['txtFName'];
                                $last_name = $_SESSION['txtLName'];
                                $email_address = $_SESSION['txtEmail'];
                                $gender = $_SESSION['rdoGender'];
                                $country = $_SESSION['txtCountry'];
                                $is_admin = $_SESSION['rdoAdmin'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    user_id LIKE '%$user_id%' AND
                                                    first_name LIKE '%$first_name%' AND
                                                    last_name LIKE '%$last_name%' AND
                                                    email_address LIKE '%$email_address%' AND
                                                    gender LIKE '%$gender%' AND
                                                    country LIKE '%$country%' AND
                                                    is_admin LIKE '%$is_admin%'
                                                    ORDER BY user_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                    // Use heredoc syntax to make the code readable and easier to maintain.
                                    // Very useful for handling large blocks of of codes.
                                    $html = <<<HTML
                                        <tr>
                                        <td>{$row['user_id']}</td>
                                        <td>{$row['first_name']}</td>
                                        <td>{$row['last_name']}</td>
                                        <td>{$row['email_address']}</td>
                                        <td>{$row['gender']}</td>
                                        <td>{$row['country']}</td>
                                        <td>{$row['is_admin']}</td>
                                        <td><a href="javascript:void(0)">Edit</a></td>
                                        <td><a href="javascript:void(0)">Delete</a></td>
                                        <!-- 
                                        <td><a href="edit_user.php?id={$row['user_id']}\">Edit</a></td>
                                        <td><a href="delete_user.php?id={$row['user_id']}\">Delete</a></td>
                                         -->
                                        </tr>
                                    HTML;
                                    echo $html;
                                }
                            }
                            // Ensure the connection to the DB is closed, with or without any code execution for security reasons.
                            mysqli_close($connection);
                        echo '</table>';
                    }
                ?>
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
                    <a class="white-hyperlink" href="../../about/index.php" class="white">
                        <li class="padding-bottom">About us</li>
                    </a>
                    <a class="white-hyperlink" href="../../e-waste-we-buy/index.php" class="white">
                        <li class="padding-bottom">E-waste we buy</li>
                    </a>
                    <a class="white-hyperlink" href="../../e-waste-we-sell/index.php" class="white">
                        <li class="padding-bottom">E-waste we sell</li>
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
