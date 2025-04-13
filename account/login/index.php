
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

    // Check if the guest or user logged in is an admin or not.
    if ($user_id != null) {
        // Execute the query to get the user's role status.
        $result = $connection->query("SELECT is_admin FROM users WHERE user_id = $user_id");
        while ($row = $result->fetch_assoc()) {
            $is_admin = (int) $row['is_admin']; // Cast to integer.
        }
    }

    // Users who are already logged are now allowed to access this page.
    if (isset($_SESSION['email_address'])) {
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
    <meta name="description" content="Free web tutorials for everyone">
    <meta name="keywords" content="HTML and CSS">
    <meta name="author" content="CodingAssessment Group">

    <title>CodingAssessment - Account Login</title>

    <!-- Cascading Style Sheets -->
    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/account-login-page.css" rel="stylesheet">
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
        <a href="../../quizzes/index.php" onclick="closeNav()">Quizzes</a>
        <!-- <a href="../../tips/index.php" onclick="closeNav()">Tips</a> -->
        <a href="../../donations/index.php" onclick="closeNav()">Donations</a>
        <a href="../../contact/index.php" onclick="closeNav()">Contact us</a>
        <a href="../../about/index.php" onclick="closeNav()">About us</a>
        <?php
            if (isset($_SESSION['email_address'])) {
                echo "<a href='javascript:void(0)' style='opacity: 0;'>Blank space</a>";
                echo "<a href='javascript:void(0)'>User is logged in.</a>";
                echo "<a href='../../account/profile/index.php' onclick='closeNav()'>Profile</a>";
                // echo "<a href='../../account/results/index.php' onclick='closeNav()'>Results</a>";
                echo "<a href='../../account/logout/index.php' onclick='closeNav()'>Logout</a>";
            }
            else {
                echo "<a href='javascript:void(0)' style='opacity: 0;'>Blank space</a>";
                echo "<a href='javascript:void(0)'>User is not logged in.</a>";
                echo "<a href='#' onclick='closeNav()'>Login</a>";
                echo "<a href='../../account/registration/index.php' onclick='closeNav()'>Register</a>";
            }

            if (@$is_admin == 1) {
                echo "<a href='../../admin/index.php' onclick='closeNav()'>Admin</a>";
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
                    CodingAssessment
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
                <a class="black-hyperlink" href="../../quizzes/index.php">
                    <div class="menu-button">
                        Quizzes
                    </div>
                </a>
            </div>
            <!-- <div>
                <a class="black-hyperlink" href="../../tips/index.php">
                    <div class="menu-button">
                        Tips
                    </div>
                </a>
            </div> -->
            <div>
                <a class="black-hyperlink" href="../../donations/index.php">
                    <div class="menu-button">
                        Donations
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
            <div>
                <a class="black-hyperlink" href="../../about/index.php">
                    <div class="menu-button">
                        About us
                    </div>
                </a>
            </div>
            <!-- ================================================== -->
            <!-- A large comment block by M1 -->

            <!-- TODO: Need help to fix the dropdown menu. -->
            <!-- I intended to have a fade out effect for the menu, but it didn't work. -->
            <!-- If I try to move the menu down, the button will work as usual, -->
            <!-- but stops responding to to any hover movements at certain margins, -->
            <!-- and it will not show up. -->

            <!-- There is also another occurance where I changed the visibility -->
            <!-- of the dropdown menu. The fade out effect works, but the menu -->
            <!-- functions itself will still exist but invisible and will not disappear. -->
            <!-- Leaving a hidden trace of invisible interacble dropdown menu.-->
            <!-- I took so much time attempting to fix this issue, and still -->
            <!-- therefore unable to fix the dropdown menu. So I left it as it is. -->

            <!-- Instead, I took the opportunity to create a unique user session tracking. -->
            <!-- These two buttons are affected by certain conditions and change the -->
            <!-- The appearance of the buttons and the dropdown menu accordingly. -->
            <!-- The function is simple. It will check if the user is logged in or not, -->
            <!-- for the "Account" button. And if the user is and admin or not, -->
            <!-- for the "Admin" button. -->
            <!-- The button function of navigating to different pages will execute as usual. -->

            <!-- Any improvements made to fix the visual artifact is greatly appreciated. -->
            <!-- Please do credit your name here, if possible. -->
            <!-- Thanks in advance. -->
            <!-- ================================================== -->
            <div>
                <!-- Prevent the user from scrolling to the top of the page when -->
                <!-- clicking on the "Username" button that holds the dropdown menu. -->
                <a class="black-hyperlink" href="javascript:void(0)">
                    <div class="dropdown">
                        <div class="menu-button">
                            <?php
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
                                if (isset($_SESSION['email_address'])) {
                                    echo "User is logged in.";
                                    echo "<a class='menu' href='../../account/profile/index.php'>Profile</a>";
                                    // echo "<a class='menu' href='../../account/results/index.php'>Results</a>";
                                    echo "<a class='menu' href='../../account/logout/index.php'>Logout</a>";
                                }
                                else {
                                    echo "User is not logged in.";
                                    echo "<a class='menu' href='#'>Login</a>";
                                    echo "<a class='menu' href='../../account/registration/index.php'>Register</a>";
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

        <!-- Layout for the login form. -->
        <div id="login-container">
            <div id="login-content">
                <br>
                <h1 class="page-title">Account login</h1>
                <br>
                <p>Login to an account through the forms here.</p>
                <br>

                <!-- Login table form. -->
                <form action="process/index.php" method="post">
                    <table id="login-form">
                        <tr>
                            <th>Email Address:</th>
                            <td><input type="email" name="txtEmail" required></td>
                        </tr>
                        <tr>
                            <th>Password:</th>
                            <td><input type="password" name="txtPassword" required></td>
                        </tr>
                    </table>
                    <br><br>
                    <input class="login-button" type="submit" name="btnLogin" value="Login">
                </form>
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
                    <a class="white-hyperlink" href="../../quizzes/index.php" class="white">
                        <li class="padding-bottom">Quizzes</li>
                    </a>
                    <!-- <a class="white-hyperlink" href="../../tips/index.php" class="white">
                        <li class="padding-bottom">Tips</li>
                    </a> -->
                    <a class="white-hyperlink" href="../../donations/index.php" class="white">
                        <li class="padding-bottom">Donations</li>
                    </a>
                    <a class="white-hyperlink" href="../../contact/index.php" class="white">
                        <li class="padding-bottom">Contact us</li>
                    </a>
                    <a class="white-hyperlink" href="../../about/index.php" class="white">
                        <li class="padding-bottom">About us</li>
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
