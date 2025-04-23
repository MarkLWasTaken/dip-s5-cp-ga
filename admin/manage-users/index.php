
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
    if ($is_admin != 1) {
        header('Location: ../../index.php');
    }

    // Ensure the connection to the DB is closed, with or without
    // any code or query execution for security reasons.
    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="E-waste management system for everyone.">
    <meta name="keywords" content="Quantum E-waste Management System, built with HTML, CSS, JS, PHP and SQL">
    <meta name="author" content="Quantum E-waste Management System Group">

    <title>Quantum E-waste Management System - Admin - Manage Users</title>

    <!-- Cascading Style Sheets -->
    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/manage-users.css" rel="stylesheet">
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
        <a href="../../about-us/index.php" onclick="closeNav()">About us</a>
        <a href="../../e-waste-we-buy/index.php" onclick="closeNav()">E-waste we buy</a>
        <a href="../../e-waste-we-sell/index.php" onclick="closeNav()">E-waste we sell</a>
        <a href="../../services/index.php" onclick="closeNav()">Services</a>
        <a href="../../faq/index.php" onclick="closeNav()">FAQ</a>
        <a href="../../contact-us/index.php" onclick="closeNav()">Contact us</a>
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
                <a href="../../admin/manage-users/index.php" onclick="closeNav()">Manage users</a>
                <a href="../../admin/statistics/index.php" onclick="closeNav()">Statistics</a>
                <a href="../../admin/database-query/index.php" onclick="closeNav()">Database Query</a>
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
                <a class="black-hyperlink" href="../../contact-us/index.php">
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
            <div class="title-banner-content">Admin - Manage Users</div>
        </div>

        <div class="margin-30px"></div>
        <!-- <br> -->

        <!-- Layout for the contents 1 container. -->
        <div id="contents-1-container">
            <div id="contents-1-content">
                <h2>Manage, edit and delete users here.</h2>
            </div>
        </div>

        <?php
        // Unset the session variables to clear the form data.
        unset($_SESSION['txtID']);
        unset($_SESSION['txtFName']);
        unset($_SESSION['txtLName']);
        unset($_SESSION['txtEmail']);
        unset($_SESSION['rdoGender']);
        unset($_SESSION['txtCountry']);
        unset($_SESSION['rdoAdmin']);
        unset($_SESSION['txtDateCreated']);
        unset($_SESSION['txtDateModified']);

        // Check if the form has been submitted.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
             // Store the values in the session.
            $_SESSION['txtID'] = $_POST['txtID'];
            $_SESSION['txtFName'] = $_POST['txtFName'];
            $_SESSION['txtLName'] = $_POST['txtLName'];
            $_SESSION['txtEmail'] = $_POST['txtEmail'];
            @$_SESSION['rdoGender'] = $_POST['rdoGender'];
            $_SESSION['txtCountry'] = $_POST['txtCountry'];
            @$_SESSION['rdoAdmin'] = $_POST['rdoAdmin'];
            $_SESSION['txtDateCreated'] = $_POST['txtDateCreated'];
            $_SESSION['txtDateModified'] = $_POST['txtDateModified'];
            if (isset($_POST['clear'])) {
                // Unset the session variables to clear the form data.
                unset($_SESSION['txtID']);
                unset($_SESSION['txtFName']);
                unset($_SESSION['txtLName']);
                unset($_SESSION['txtEmail']);
                unset($_SESSION['rdoGender']);
                unset($_SESSION['txtCountry']);
                unset($_SESSION['rdoAdmin']);
                unset($_SESSION['txtDateCreated']);
                unset($_SESSION['txtDateModified']);
            }
        } else if (isset($_POST['clear'])) {
            // Unset the session variables to clear the form data.
            unset($_SESSION['txtID']);
            unset($_SESSION['txtFName']);
            unset($_SESSION['txtLName']);
            unset($_SESSION['txtEmail']);
            unset($_SESSION['rdoGender']);
            unset($_SESSION['txtCountry']);
            unset($_SESSION['rdoAdmin']);
            unset($_SESSION['txtDateCreated']);
            unset($_SESSION['txtDateModified']);
        }

        // Retrieve the values from the session.
        $user_id = isset($_SESSION['txtID']) ? $_SESSION['txtID'] : '';
        $first_name = isset($_SESSION['txtFName']) ? $_SESSION['txtFName'] : '';
        $last_name = isset($_SESSION['txtLName']) ? $_SESSION['txtLName'] : '';
        $email_address = isset($_SESSION['txtEmail']) ? $_SESSION['txtEmail'] : '';
        $gender = isset($_SESSION['rdoGender']) ? $_SESSION['rdoGender'] : '';
        $country = isset($_SESSION['txtCountry']) ? $_SESSION['txtCountry'] : '';
        $is_admin = isset($_SESSION['rdoAdmin']) ? $_SESSION['rdoAdmin'] : '';
        $date_created = isset($_SESSION['txtDateCreated']) ? $_SESSION['txtDateCreated'] : '';
        $date_modified = isset($_SESSION['txtDateModified']) ? $_SESSION['txtDateModified'] : '';
        ?>

        <!-- Table query container -->
        <div>
            <form action="index.php" method="post">
                <div class="query-table-content">
                    <table id="table-query">
                        <tr>
                            <th colspan="2" style="padding-left: 0; text-align: center;">
                                "users" Table Query
                            </th>
                        </tr>
                        <!-- "users" table query options. -->
                        <tr>
                            <th>ID:</th>
                            <td><input type="text" name="txtID" value="<?php echo $user_id ?>"></td>
                        </tr>
                        <tr>
                            <th>First Name:</th>
                            <td><input type="text" name="txtFName" value="<?php echo $first_name ?>"></td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td><input type="text" name="txtLName" value="<?php echo $last_name ?>"></td>
                        </tr>
                        <tr>
                            <th>Email Address:</th>
                            <td><input type="email" name="txtEmail" value="<?php echo $email_address ?>" class="query-table-email-field"></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>
                                <div class="radio-choice">
                                    <div class="radio-choices">
                                        <input type="radio" id="male" name="rdoGender" value="Male" <?php echo ($gender == 'Male') ? 'checked' : ''; ?>>
                                        <label for="male">Male</label><br>
                                    </div>
                                    <div class="radio-choices">
                                        <input type="radio" id="female" name="rdoGender" value="Female" <?php echo ($gender == 'Female') ? 'checked' : ''; ?>>
                                        <label for="female">Female</label><br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Country:</th>
                            <td><input type="text" name="txtCountry" value="<?php $country ?>"></td>
                        </tr>
                        <tr>
                            <th>Is admin?</th>
                            <td>
                                <div class="radio-choice-2">
                                    <div class="radio-choices">
                                        <input type="radio" id="user" name="rdoAdmin" value="0" <?php echo ($gender == '0') ? 'checked' : ''; ?>>
                                        <label for="no">User</label><br>
                                    </div>
                                    <div class="radio-choices">
                                        <input type="radio" id="systemadmin" name="rdoAdmin" value="1" <?php echo ($gender == '1') ? 'checked' : ''; ?>>
                                        <label for="yes">System Admin</label><br>
                                    </div>
                                    <div class="radio-choices">
                                        <input type="radio" id="officeadmin" name="rdoAdmin" value="2" <?php echo ($gender == '2') ? 'checked' : ''; ?>>
                                        <label for="yes">Office Admin</label><br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Date Created:</th>
                            <td><input type="text" name="txtDateCreated" value="<?php $date_created ?>"></td>
                        </tr>
                        <tr>
                            <th>Date Modified:</th>
                            <td><input type="text" name="txtDateModified" value="<?php $date_modified ?>"></td>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" name="submit" value="Search from the table"></td>
                        </tr>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" name="clear" value="Clear the query"></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

        <div class="margin-50px"></div>

        <!-- Users table container -->
        <div>
            <div class="manage-user-table">
                <?php
                    // Attempt to make a new connection to the database.
                    include '../../php/connection.php';

                    // Use heredoc syntax to make the code readable and easier to maintain.
                    // Very useful for handling large blocks of of codes.
                    $html = <<<HTML
                    <table class="manage-rows-table" border=1>
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

                    // Declare a variable for the query.
                    // $query_table_rows = "SELECT user_id, first_name, last_name, email_address, gender, country, is_admin
                    //                     FROM `users`
                    //                     ORDER BY user_id ASC";

                    // Declare a variable for the query.
                    $query_table_rows = "SELECT * FROM `users` WHERE
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
                            <td><a href="edit/index.php?id={$row['user_id']}">Edit</a></td>
                            <td><a href="delete/index.php?id={$row['user_id']}">Delete</a></td>
                        </tr>
                        HTML;
                        echo $html;
                    }
                    echo '</table>';

                    // Ensure the connection to the DB is closed, with or without
                    // any code or query execution for security reasons.
                    mysqli_close($connection);
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
                    <a class="white-hyperlink" href="../../about-us/index.php" class="white">
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
                    <a class="white-hyperlink" href="../../contact-us/index.php" class="white">
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
