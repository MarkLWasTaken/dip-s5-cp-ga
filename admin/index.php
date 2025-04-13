
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

    // Check if the guest or user logged in is an admin or not.
    if ($user_id != null) {
        // Execute the query to get the user's role status.
        $result = $connection->query("SELECT is_admin FROM users WHERE user_id = $user_id");
        while ($row = $result->fetch_assoc()) {
            $is_admin = (int) $row['is_admin']; // Cast to integer.
        }
    }

    // Users who are not website administrators (admins) are not allowed to access this page.
    if ($is_admin != 1) {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free web tutorials for everyone">
    <meta name="keywords" content="HTML and CSS">
    <meta name="author" content="CodingAssessment Group">

    <title>CodingAssessment - Admin</title>

    <!-- Cascading Style Sheets -->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/dropdown-menu.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
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
        <a href="../quizzes/index.php" onclick="closeNav()">Quizzes</a>
        <!-- <a href="../tips/index.php" onclick="closeNav()">Tips</a> -->
        <a href="../donations/index.php" onclick="closeNav()">Donations</a>
        <a href="../contact/index.php" onclick="closeNav()">Contact us</a>
        <a href="../../about/index.php" onclick="closeNav()">About us</a>
        <?php
            if (isset($_SESSION['email_address'])) {
                echo "User is logged in.";
                echo "<a href='../account/profile/index.php' onclick='closeNav()'>Profile</a>";
                // echo "<a href='../account/results/index.php' onclick='closeNav()'>Results</a>";
                echo "<a href='../account/logout/index.php' onclick='closeNav()'>Logout</a>";
            }
            else {
                echo "<a href='javascript:void(0)' style='opacity: 0;'>Blank space</a>";
                echo "<a href='javascript:void(0)'>User is not logged in.</a>";
                echo "<a href='../account/login/index.php' onclick='closeNav()'>Login</a>";
                echo "<a href='../account/registration/index.php' onclick='closeNav()'>Register</a>";
            }

            if (@$is_admin == 1) {
                echo "<a href='../admin/index.php' onclick='closeNav()'>Admin</a>";
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
                    <img class="header-image" src="../images/desktop-computer-svgrepo-com.svg" alt="Computer." title="Computer.">
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
                <a class="black-hyperlink" href="../quizzes/index.php">
                    <div class="menu-button">
                        Quizzes
                    </div>
                </a>
            </div>
            <!-- <div>
                <a class="black-hyperlink" href="../tips/index.php">
                    <div class="menu-button">
                        Tips
                    </div>
                </a>
            </div> -->
            <div>
                <a class="black-hyperlink" href="../donations/index.php">
                    <div class="menu-button">
                        Donations
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../contact/index.php">
                    <div class="menu-button">
                        Contact us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../about/index.php">
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
                        <!-- <br> -->
                        <div class="dropdown-content">
                            <?php
                                if (isset($_SESSION['email_address'])) {
                                    echo "User is logged in.";
                                    echo "<a class='menu' href='../account/profile/index.php'>Profile</a>";
                                    // echo "<a class='menu' href='../account/results/index.php'>Results</a>";
                                    echo "<a class='menu' href='../account/logout/index.php'>Logout</a>";
                                }
                                else {
                                    echo "User is not logged in.";
                                    echo "<a class='menu' href='../account/login/index.php'>Login</a>";
                                    echo "<a class='menu' href='../account/registration/index.php'>Register</a>";
                                }
                            ?>
		                </div>
                    </div>
                </a>
            </div>
            <?php
                if (@$is_admin == 1) {
                    echo "<div>";
                    echo "<a class='black-hyperlink' href='#'>";
                        echo "<div class='menu-button'>";
                            echo "Admin";
                        echo "</div>";
                    echo "</a>";
                echo "</div>";
                }
            ?>
        </div>

        <br class="desktop-line-break">

        <h1 class="page-title">Admin page (Manage table records)</h1>

        <br>

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

                <div class="query-table-content-2">
                    <table id="table-query">
                        <tr>
                            <th colspan="2" style="padding-left: 0; text-align: center;">"<?php echo $_SESSION['selected_table'];?>" Table Query</th>
                        </tr>
                        <?php
                            if ($_SESSION['selected_table'] == 'contact_us') {
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
                            } else if ($_SESSION['selected_table'] == 'css_quiz_answers') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>User ID:</th>
                                    <td><input type="text" name="txtUserID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Attempted:</th>
                                    <td><input type="text" name="txtDateAttempted" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Submitted:</th>
                                    <td><input type="text" name="txtDateSubmitted" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q1 Answer:</th>
                                    <td><input type="text" name="txtQ1Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q2 Answer:</th>
                                    <td><input type="text" name="txtQ2Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q3 Answer:</th>
                                    <td><input type="text" name="txtQ3Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q4 Answer:</th>
                                    <td><input type="text" name="txtQ4Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q5 Answer:</th>
                                    <td><input type="text" name="txtQ5Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q6 Answer:</th>
                                    <td><input type="text" name="txtQ6Answer" id=""></td>
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
                                @$_SESSION['txtUserID'] = $_POST['txtUserID'];
                                @$_SESSION['txtDateAttempted'] = $_POST['txtDateAttempted'];
                                @$_SESSION['txtDateSubmitted'] = $_POST['txtDateSubmitted'];
                                @$_SESSION['txtQ1Answer'] = $_POST['txtQ1Answer'];
                                @$_SESSION['txtQ2Answer'] = $_POST['txtQ2Answer'];
                                @$_SESSION['txtQ3Answer'] = $_POST['txtQ3Answer'];
                                @$_SESSION['txtQ4Answer'] = $_POST['txtQ4Answer'];
                                @$_SESSION['txtQ5Answer'] = $_POST['txtQ5Answer'];
                                @$_SESSION['txtQ6Answer'] = $_POST['txtQ6Answer'];
                            } else if ($_SESSION['selected_table'] == 'donations') {
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
                                    <th>Amount Donated:</th>
                                    <td><input type="text" name="txtAmountDonated" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Donated:</th>
                                    <td><input type="text" name="txtDateDonated" id=""></td>
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
                                @$_SESSION['txtAmountDonated'] = $_POST['txtAmountDonated'];
                                @$_SESSION['txtDateDonated'] = $_POST['txtDateDonated'];
                            } else if ($_SESSION['selected_table'] == 'html_quiz_answers') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="txtID" id=""></td>
                                </tr>
                                <tr>
                                    <th>User ID:</th>
                                    <td><input type="text" name="txtUserID" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Attempted:</th>
                                    <td><input type="text" name="txtDateAttempted" id=""></td>
                                </tr>
                                <tr>
                                    <th>Date Submitted:</th>
                                    <td><input type="text" name="txtDateSubmitted" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q1 Answer:</th>
                                    <td><input type="text" name="txtQ1Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q2 Answer:</th>
                                    <td><input type="text" name="txtQ2Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q3 Answer:</th>
                                    <td><input type="text" name="txtQ3Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q4 Answer:</th>
                                    <td><input type="text" name="txtQ4Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q5 Answer:</th>
                                    <td><input type="text" name="txtQ5Answer" id=""></td>
                                </tr>
                                <tr>
                                    <th>Q6 Answer:</th>
                                    <td><input type="text" name="txtQ6Answer" id=""></td>
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
                                @$_SESSION['txtUserID'] = $_POST['txtUserID'];
                                @$_SESSION['txtDateAttempted'] = $_POST['txtDateAttempted'];
                                @$_SESSION['txtDateSubmitted'] = $_POST['txtDateSubmitted'];
                                @$_SESSION['txtQ1Answer'] = $_POST['txtQ1Answer'];
                                @$_SESSION['txtQ2Answer'] = $_POST['txtQ2Answer'];
                                @$_SESSION['txtQ3Answer'] = $_POST['txtQ3Answer'];
                                @$_SESSION['txtQ4Answer'] = $_POST['txtQ4Answer'];
                                @$_SESSION['txtQ5Answer'] = $_POST['txtQ5Answer'];
                                @$_SESSION['txtQ6Answer'] = $_POST['txtQ6Answer'];
                            } else if ($_SESSION['selected_table'] == 'mailing_list') {
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
                            } else if ($_SESSION['selected_table'] == 'users') {
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
                                                <input type="radio" id="yes" name="rdoAdmin" value="1">
                                                <label for="yes">Yes</label><br>
                                            </div>
                                            <div class="radio-choices">
                                                <input type="radio" id="no" name="rdoAdmin" value="0">
                                                <label for="no">No</label><br>
                                            </div>
                                        </div>
                                    </td>
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
                <!-- TODO -->

                <?php
                    if (isset($_SESSION['selected_table'])) {
                        echo '<table class="manage-rows-table" border=1>';
                            if ($_SESSION['selected_table'] == 'contact_us') {
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
                                $contact_us_id = $_SESSION['txtID'];
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

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                        echo '<tr>';
                                            echo "<td>{$row['contact_us_id']}</td>";
                                            echo "<td>{$row['name']}</td>";
                                            echo "<td>{$row['email_address']}</td>";
                                            echo "<td>{$row['message']}</td>";
                                            echo "<td>{$row['date_submitted']}</td>";
                                        echo '</tr>';
                                }
                            } else if ($_SESSION['selected_table'] == 'css_quiz_answers') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Date Attempted</th>
                                        <th>Date Submitted</th>
                                        <th>Q1 Answer</th>
                                        <th>Q2 Answer</th>
                                        <th>Q3 Answer</th>
                                        <th>Q4 Answer</th>
                                        <th>Q5 Answer</th>
                                        <th>Q6 Answer</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $css_quiz_answers_id = $_SESSION['txtID'];
                                $user_id = $_SESSION['txtUserID'];
                                $date_attempted = $_SESSION['txtDateAttempted'];
                                $date_submitted = $_SESSION['txtDateSubmitted'];
                                $q1_answer = $_SESSION['txtQ1Answer'];
                                $q2_answer = $_SESSION['txtQ2Answer'];
                                $q3_answer = $_SESSION['txtQ3Answer'];
                                $q4_answer = $_SESSION['txtQ4Answer'];
                                $q5_answer = $_SESSION['txtQ5Answer'];
                                $q6_answer = $_SESSION['txtQ6Answer'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    css_quiz_answers_id LIKE '%$css_quiz_answers_id%' AND
                                                    user_id LIKE '%$user_id%' AND
                                                    date_attempted LIKE '%$date_attempted%' AND
                                                    date_submitted LIKE '%$date_submitted%' AND
                                                    q1_answer LIKE '%$q1_answer%' AND
                                                    q2_answer LIKE '%$q2_answer%' AND
                                                    q3_answer LIKE '%$q3_answer%' AND
                                                    q4_answer LIKE '%$q4_answer%' AND
                                                    q5_answer LIKE '%$q5_answer%' AND
                                                    q6_answer LIKE '%$q6_answer%'
                                                    ORDER BY css_quiz_answers_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                        echo '<tr>';
                                            echo "<td>{$row['css_quiz_answers_id']}</td>";
                                            echo "<td>{$row['user_id']}</td>";
                                            echo "<td>{$row['date_attempted']}</td>";
                                            echo "<td>{$row['date_submitted']}</td>";
                                            echo "<td>{$row['q1_answer']}</td>";
                                            echo "<td>{$row['q2_answer']}</td>";
                                            echo "<td>{$row['q3_answer']}</td>";
                                            echo "<td>{$row['q4_answer']}</td>";
                                            echo "<td>{$row['q5_answer']}</td>";
                                            echo "<td>{$row['q6_answer']}</td>";
                                        echo '</tr>';
                                }
                            } else if ($_SESSION['selected_table'] == 'donations') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Email Address</th>
                                        <th>Amount Donated</th>
                                        <th>Date Donated</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $donation_id = $_SESSION['txtID'];
                                $email_address = $_SESSION['txtEmail'];
                                $amount_donated = $_SESSION['txtAmountDonated'];
                                $date_donated = $_SESSION['txtDateDonated'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    donation_id LIKE '%$donation_id%' AND
                                                    email_address LIKE '%$email_address%' AND
                                                    amount_donated LIKE '%$amount_donated%' AND
                                                    date_donated LIKE '%$date_donated%'
                                                    ORDER BY donation_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                        echo '<tr>';
                                            echo "<td>{$row['donation_id']}</td>";
                                            echo "<td>{$row['email_address']}</td>";
                                            echo "<td>{$row['amount_donated']}</td>";
                                            echo "<td>{$row['date_donated']}</td>";
                                        echo '</tr>';
                                }
                            } else if ($_SESSION['selected_table'] == 'html_quiz_answers') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Date Attempted</th>
                                        <th>Date Submitted</th>
                                        <th>Q1 Answer</th>
                                        <th>Q2 Answer</th>
                                        <th>Q3 Answer</th>
                                        <th>Q4 Answer</th>
                                        <th>Q5 Answer</th>
                                        <th>Q6 Answer</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $html_quiz_answers_id = $_SESSION['txtID'];
                                $user_id = $_SESSION['txtUserID'];
                                $date_attempted = $_SESSION['txtDateAttempted'];
                                $date_submitted = $_SESSION['txtDateSubmitted'];
                                $q1_answer = $_SESSION['txtQ1Answer'];
                                $q2_answer = $_SESSION['txtQ2Answer'];
                                $q3_answer = $_SESSION['txtQ3Answer'];
                                $q4_answer = $_SESSION['txtQ4Answer'];
                                $q5_answer = $_SESSION['txtQ5Answer'];
                                $q6_answer = $_SESSION['txtQ6Answer'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    html_quiz_answers_id LIKE '%$html_quiz_answers_id%' AND
                                                    user_id LIKE '%$user_id%' AND
                                                    date_attempted LIKE '%$date_attempted%' AND
                                                    date_submitted LIKE '%$date_submitted%' AND
                                                    q1_answer LIKE '%$q1_answer%' AND
                                                    q2_answer LIKE '%$q2_answer%' AND
                                                    q3_answer LIKE '%$q3_answer%' AND
                                                    q4_answer LIKE '%$q4_answer%' AND
                                                    q5_answer LIKE '%$q5_answer%' AND
                                                    q6_answer LIKE '%$q6_answer%'
                                                    ORDER BY html_quiz_answers_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                        echo '<tr>';
                                            echo "<td>{$row['html_quiz_answers_id']}</td>";
                                            echo "<td>{$row['user_id']}</td>";
                                            echo "<td>{$row['date_attempted']}</td>";
                                            echo "<td>{$row['date_submitted']}</td>";
                                            echo "<td>{$row['q1_answer']}</td>";
                                            echo "<td>{$row['q2_answer']}</td>";
                                            echo "<td>{$row['q3_answer']}</td>";
                                            echo "<td>{$row['q4_answer']}</td>";
                                            echo "<td>{$row['q5_answer']}</td>";
                                            echo "<td>{$row['q6_answer']}</td>";
                                        echo '</tr>';
                                }
                            } else if ($_SESSION['selected_table'] == 'mailing_list') {
                                // Use heredoc syntax to make the code readable and easier to maintain.
                                // Very useful for handling large blocks of of codes.
                                $html = <<<HTML
                                    <tr>
                                        <th>ID</th>
                                        <th>Email Address</th>
                                        <th>Is subscribed</th>
                                    </tr>
                                HTML;
                                echo $html;

                                // Declare variables to get the data.
                                $mailing_list_id = $_SESSION['txtID'];
                                $email_address = $_SESSION['txtEmail'];
                                $is_subscribed = $_SESSION['rdoSubscribed'];

                                // Declare a variable for the query.
                                $query_table_rows = "SELECT * FROM `$selected_table` WHERE
                                                    mailing_list_id LIKE '%$mailing_list_id%' AND
                                                    email_address LIKE '%$email_address%' AND
                                                    is_subscribed LIKE '%$is_subscribed%'
                                                    ORDER BY mailing_list_id ASC";

                                // Attempt to connect to the database and execute the query.
                                $result_table_rows = mysqli_query($connection, $query_table_rows);

                                // Insert the each of the results into the table.
                                while($row = mysqli_fetch_assoc($result_table_rows)) {
                                        echo '<tr>';
                                            echo "<td>{$row['mailing_list_id']}</td>";
                                            echo "<td>{$row['email_address']}</td>";
                                            echo "<td>{$row['is_subscribed']}</td>";
                                        echo '</tr>';
                                }
                            } else if ($_SESSION['selected_table'] == 'users') {
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

        <br><br><br><br><br>

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
                    <a class="white-hyperlink" href="../index.php" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="../quizzes/index.php" class="white">
                        <li class="padding-bottom">Quizzes</li>
                    </a>
                    <!-- <a class="white-hyperlink" href="../tips/index.php" class="white">
                        <li class="padding-bottom">Tips</li>
                    </a> -->
                    <a class="white-hyperlink" href="../donations/index.php" class="white">
                        <li class="padding-bottom">Donations</li>
                    </a>
                    <a class="white-hyperlink" href="../contact/index.php" class="white">
                        <li class="padding-bottom">Contact us</li>
                    </a>
                    <a class="white-hyperlink" href="../about/index.php" class="white">
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
