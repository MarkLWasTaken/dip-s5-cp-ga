
<!-- 
Start of the lines/blocks of codes
Developed by M1
Student ID: Redacted
-->

<?php
// Start/Initialize the session.
session_start();

// Include the PHP script for connecting to the database (DB).
include '../../../php/connection.php';

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
    header('Location: ../../../index.php');
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

    <title>Quantum E-waste Solution - Admin - Manage users (Edit user)</title>

    <!-- Cascading Style Sheets -->
    <link href="../../../css/styles.css" rel="stylesheet">
    <link href="../../../css/navigation-bar-buttons.css" rel="stylesheet">
    <link href="../../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../../css/manage-users.css" rel="stylesheet">
    <link href="../../../css/styles-cp-mobile.css" rel="stylesheet">
    <link href="../../../css/side-navigation-menu.css" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="../../../js/side-navigation-menu.js"></script>
</head>

<body>
    <!-- Reference: https://www.w3schools.com/howto/howto_js_sidenav.asp -->
    <div id="side-navigation-menu" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Close the side navigation menu.">&times;</a>
        <a href="../../../index.php" onclick="closeNav()">Home</a>
        <a href="../../../about-us.php" onclick="closeNav()">About us</a>
        <a href="../../../e-waste/we-buy.php" onclick="closeNav()">E-waste we buy</a>
        <a href="../../../e-waste/we-sell.php" onclick="closeNav()">E-waste we sell</a>
        <a href="../../../services.php" onclick="closeNav()">Services</a>
        <a href="../../../faq.php" onclick="closeNav()">FAQ</a>
        <a href="../../../contact-us.php" onclick="closeNav()">Contact us</a>
        <?php
        // If the user is logged in.
        if (isset($_SESSION['email_address'])) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <div class="margin-50px"></div>
            <!-- <a href="javascript:void(0)" style="opacity: 0;">Blank space</a> -->
            <a href="javascript:void(0)">&#128994; User is logged in.</a>
            <a href="../../../dashboard.php" onclick="closeNav()">Dashboard</a>
            <a href="../../../buy-sell-request/index.php" onclick="closeNav()">Buy/Sell Request</a>
            <a href="../../../tracking/index.php" onclick="closeNav()">Tracking</a>
            <a href="../../../view-transactions/index.php" onclick="closeNav()">View transactions</a>
            <a href="../../../payment/index.php" onclick="closeNav()">Proof of Payment</a>
            <a href="../../../account/profile/index.php" onclick="closeNav()">Manage/Edit Profile</a>
            <a href="../../../account/logout.php" onclick="closeNav()">Logout</a>
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
            <a href="../../../account/login/index.php" onclick="closeNav()">Login</a>
            <a href="../../../account/registration/index.php" onclick="closeNav()">Register</a>
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
            <a href="../../../admin/manage-users/index.php" onclick="closeNav()">Manage users</a>
            <a href="../../../admin/database-query.php" onclick="closeNav()">Database Query</a>
            <a href="../../../admin/dashboard.php" onclick="closeNav()">Admin Dashboard</a>
            <a href="../../../admin/statistics/index.php" onclick="closeNav()">Statistics</a>
            <div class="margin-100px"></div>
            HTML;
            echo $html;
        }
        else if (@$is_admin == 2) {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <a href="../../../admin/e-waste-requests/index.php" onclick="closeNav()">Screen user requests (Approve/Reject)</a>
            <a href="../../../admin/dashboard.php" onclick="closeNav()">Admin Dashboard</a>
            <a href="../../../admin/statistics/index.php" onclick="closeNav()">Statistics</a>
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
                    <img src="../../../images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                </div>
            </a>
        </div>

        <div id="header" class="website-title">
            <div class="title-and-image-container">
                <div class="title-and-image-content">
                    <img class="header-image" src="../../../images/logo-image.png" alt="Greening planet earth." title="Greening planet earth.">
                    <!-- <img class="header-image" src="../../../images/desktop-computer-svgrepo-com.svg" alt="Computer." title="Computer."> -->
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
                        <img src="../../../images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../index.php">
                    <div class="menu-button">
                        Home
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../about-us.php">
                    <div class="menu-button">
                        About us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../e-waste/we-buy.php">
                    <div class="menu-button-2">
                        E-waste<br>we buy
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../e-waste/we-sell.php">
                    <div class="menu-button-2">
                        E-waste<br>we sell
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../services.php">
                    <div class="menu-button">
                        Services
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../faq.php">
                    <div class="menu-button">
                        FAQ
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../contact-us.php">
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
                                <a class="menu" href="../../../dashboard.php">Dashboard</a>
                                <a class="menu" href="../../../account/profile/index.php">Profile</a>
                                <a class="menu" href="../../../account/logout.php">Logout</a>
                                HTML;
                                echo $html;
                            }
                            else {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <!-- Offline -->
                                &#128308; User is not logged in.
                                <a class="menu" href="../../../account/login/index.php">Login</a>
                                <a class="menu" href="../../../account/registration/index.php">Register</a>
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
                        <a class='black-hyperlink' href='../../../dashboard.php#admin-navigation'>
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

        <div class="page-title-banner-container-2">
            <div class="page-title-banner-content-2">Manage Users (Edit User)</div>
        </div>

        <div class="margin-40px"></div>
        <!-- <br> -->

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <!-- Layout for the contents 2 container. -->
            <div class="container-2-container">
                <div class="container-2-content">
                    <h2>Edit user details here.</h2>
                </div>
            </div>
            HTML;
            echo $html;

            // Get the user ID from POST request.
            @$users_user_id = $_POST["user_id"];
        }
        else if ($_SERVER["REQUEST_METHOD"] != "POST") {
            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <style>
                .container-6-container {
                    display: none;
                    opacity: 0%;
                }

                .container-6-content {
                    display: none;
                    opacity: 0%;
                }
            </style>

            <!-- Layout for the contents 5 container. -->
            <div class="container-5-container">
                <div class="container-5-content">
                    <h2>Please select a user to edit in manage users page.</h2>
                    <div class="margin-60px"></div>
                    <div class="container-8-container">
                        <a class="container-8-contents" href="../../../admin/manage-users/index.php">
                            <p>Return to the manage users page</p>
                        </a>
                    </div>
                    <div class="margin-80px"></div>
                </div>
            </div>
            HTML;
            echo $html;
        }
        ?>

        <?php
        // Include the PHP script for connecting to the database (DB).
        include '../../../php/connection.php';

        // Declare a variable for the query.
        $sql_query_1 = "SELECT * FROM `users`
                        WHERE user_id = $users_user_id";

        // Attempt to connect to the database and execute the query.
        $sql_query_1_result = $connection->query($sql_query_1);

        // Determine the file name with request ID and user ID.
        while($sql_query_1_row = $sql_query_1_result->fetch_assoc()) {
            $users_first_name = $sql_query_1_row['first_name'];
            $users_last_name = $sql_query_1_row['last_name'];
            $users_email_address = $sql_query_1_row['email_address'];
            $users_gender = $sql_query_1_row['gender'];
            $users_country = $sql_query_1_row['country'];
            $users_is_admin = $sql_query_1_row['is_admin'];
        }

        // Ensure the connection to the DB is closed, with or without
        // any code or query execution for security reasons.
        $connection->close();
        ?>

        <!-- Edit user table form -->
        <div class="container-6-container">
            <div class="container-6-content">
                <div class="margin-60px"></div>
                <form class="edit-user-table" action="process.php" method="post">
                    <table>
                        <tr>
                            <th colspan="2" style="padding-left: 0; text-align: center;">

                            <?php
                            echo "Edit user table for User ID " . $users_user_id;
                            ?>

                            </th>
                        </tr>
                        <tr>
                            <th>First Name:</th>
                            <td><input class="name-field" type="text" name="txtFName" required value="<?php echo $users_first_name; ?>"></td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td><input class="name-field" type="text" name="txtLName" required value="<?php echo $users_last_name; ?>"></td>
                        </tr>
                        <tr>
                            <th>Email Address*:</th>
                            <td><input class="email-field" type="email" name="txtEmail" required value="<?php echo $users_email_address; ?>"></td>
                        </tr>
                        <tr>
                            <th>Password*:</th>
                            <td><input class="password-field" type="password" name="txtPassword" required></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>
                                <div class="radio-choice">
                                    <div class="radio-choices">
                                        <input type="radio" id="male" name="rdoGender" value="Male" required <?php echo ($users_gender == 'Male') ? 'checked' : ''; ?>>
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="radio-choices">
                                        <input type="radio" id="female" name="rdoGender" value="Female" <?php echo ($users_gender == 'Female') ? 'checked' : ''; ?>>
                                        <label for="female">Female</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Country:</th>
                            <td>
                                <!-- Reference: https://gist.github.com/danrovito/977bcb97c9c2dfd3398a -->
                                <select class="country-field" name="selCountry" required>

                                <?php
                                // Include the PHP script for connecting to the database (DB).
                                include '../../../php/list-of-countries.php';
                                ?>

                                </select>
                                <!-- Reference: https://gist.github.com/danrovito/977bcb97c9c2dfd3398a -->
                            </td>
                        </tr>
                        <tr>
                            <th>Is admin?</th>
                            <td>
                                <div class="radio-choice-2">
                                    <div class="radio-choices">
                                        <input type="radio" id="user" name="rdoAdmin" value="0" required <?php echo ($users_is_admin == '0') ? 'checked' : ''; ?>>
                                        <label for="user">User</label><br>
                                    </div>
                                    <div class="radio-choices">
                                        <input type="radio" id="systemadmin" name="rdoAdmin" value="1" <?php echo ($users_is_admin == '1') ? 'checked' : ''; ?>>
                                        <label for="systemadmin">System Admin</label><br>
                                    </div>
                                    <div class="radio-choices">
                                        <input type="radio" id="officead" name="rdoAdmin" value="2" <?php echo ($users_is_admin == '2') ? 'checked' : ''; ?>>
                                        <label for="officead">Office Admin</label><br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="margin-40px"></div>

                    <!--
                    Temporary workaround to get the button to display.
                    This set of code is set not to display on the webpage.
                    I only want a single set of code instead of duplicate codes.
                    But I can't seem to get it to display normally without another
                    set of code with the same style.
                    -->
                    <div style="display: none;" class="container-7">
                        <div id="" method="post" action="" class="container-7-content container-7-content-edit">
                            <input type="submit" name="" value="" class="container-7-content-edit no-decoration-button">
                        </div>
                    </div>

                    <div class="container-7">
                        <div class="container-7-content container-7-content-edit">
                            <input type="hidden" name="users_user_id" value="<?php echo $users_user_id; ?>">
                            <input type="submit" name="edit" value="Edit User" class="container-7-content-edit no-decoration-button">
                        </div>
                    </div>
                </form>
                <div class="margin-60px"></div>
                <div class="container-8-container">
                    <a class="container-8-contents" href="../../../admin/manage-users/index.php">
                        <p>Return to the manage users page</p>
                    </a>
                </div>
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
                    <a class="white-hyperlink" href="../../../index.php" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="../../../about-us.php" class="white">
                        <li class="padding-bottom">About us</li>
                    </a>
                    <a class="white-hyperlink" href="../../../e-waste/we-buy.php" class="white">
                        <li class="padding-bottom">E-waste we buy</li>
                    </a>
                    <a class="white-hyperlink" href="../../../e-waste/we-sell.php" class="white">
                        <li class="padding-bottom">E-waste we sell</li>
                    </a>
                    <a class="white-hyperlink" href="../../../services.php" class="white">
                        <li class="padding-bottom">Services</li>
                    </a>
                    <a class="white-hyperlink" href="../../../faq.php" class="white">
                        <li class="padding-bottom">FAQ</li>
                    </a>
                    <a class="white-hyperlink" href="../../../contact-us.php" class="white">
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
