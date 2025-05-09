
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

// Set a the default timezone for date and time.
date_default_timezone_set('Asia/Singapore');

// Set the date and time format (YYYY-MM-DD HH-MM-SS Timezone).
$date = date('Y-m-d H:i:s P');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="E-waste management system for everyone.">
    <meta name="keywords" content="Quantum E-waste Solution (Management System), built with HTML, CSS, JS, PHP and SQL">
    <meta name="author" content="Quantum E-waste Solution Group">

    <title>Quantum E-waste Solution - Sell Request Form</title>

    <!-- Cascading Style Sheets -->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/navigation-bar-buttons.css" rel="stylesheet">
    <link href="../css/dropdown-menu.css" rel="stylesheet">
    <link href="../css/buy-sell-request.css" rel="stylesheet">
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
            <a href="../payment/index.php" onclick="closeNav()">Proof of Payment</a>
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
            <div class="page-title-banner-content">Sell Request Form</div>
        </div>

        <div class="margin-30px"></div>
        <!-- <br> -->

        <!-- Layout for the contents 1 container. -->
        <div id="contents-2-container">
            <div id="contents-2-content">
                <h2>Create a form for sell request.</h2>
            </div>
        </div>

        <?php
        // PHP for Customer Sell Request Form.

        // File upload module.
        // Reference: https://www.w3schools.com/php/php_file_upload.asp

        $target_dir = "../uploads/requests/";
        $target_file = $target_dir . basename(@$_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Declare a variable for "request_id".
        $request_id = "";

        // Declare a variable for the query.
        $sql_query_1 = "SELECT * FROM requests";

        // Attempt to connect to the database and execute the query.
        $sql_query_1_result = $connection->query($sql_query_1);

        // Get the row count
        $requests_row_count = $sql_query_1_result->num_rows;
        $requests_row_count++;

        // Rename picture.
        $newFileName = "request_id_" . $requests_row_count . "_" . "user_id_" . $user_id . "." . $imageFileType;
        $newTargetFile = $target_dir . $newFileName;

        // Declare the variables as empty.
        $file_is_image = "";
        $file_not_image = "";
        $file_already_exists = "";
        $file_file_size = "";
        $file_image_type = "";
        $file_upload_success = "";
        $file_upload_failed = "";
        $file_not_uploaded = "";

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $file_is_image =  "&#x2705; The file is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $file_not_image = "&#x274C The file is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($newTargetFile)) {
            $file_already_exists = "&#x274C Sorry, file already exists.";
            $uploadOk = 0;
        }
        else {
            $file_already_exists = "&#x2705; The file does not exist.";
        }

        // Check file size (limit to 20 MB)
        if (@$_FILES["fileToUpload"]["size"] > 20000000) {
            $file_file_size = "&#x274C Sorry, your file is too large.";
            $uploadOk = 0;
        }
        else {
            $file_file_size = "&#x2705; The file is within the upload size limit.";
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $file_image_type = "&#x274C Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        else if ($imageFileType == "jpg") {
            $file_image_type = "&#x2705; The file is a jpg.";
        }
        else if ($imageFileType == "png") {
            $file_image_type = "&#x2705; The file is a png.";
        }
        else if ($imageFileType == "jpeg") {
            $file_image_type = "&#x2705; The file is a jpeg.";
        }
        else if ($imageFileType == "gif") {
            $file_image_type = "&#x2705; The file is a gif.";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $file_not_uploaded = "&#x274C Sorry, your file was not uploaded.";
            $form_status = "Sell request form has not been successfully submitted.";
        }
        // if everything is ok, try to upload file
        else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newTargetFile)) {
                $file_upload_success = "&#x2705; The file has been uploaded and renamed as " . $newFileName . ".";

                // Check if the form has been submitted.
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get the form data from the tables.
                    @$request_item_type = $_POST["txtRequestItemType"];
                    @$request_item_name = $_POST["txtRequestItemName"];
                    @$request_item_quantity = $_POST["txtRequestQuantity"];

                    // Declare a variable for the query.
                    // Insert the form data into the database
                    // Note: $date and $user_id variables are already declared.
                    $sql_query_2 = "INSERT INTO requests (request_date, request_type, request_item_name,
                                    item_quantity, request_status, picture_id, user_id, item_id)
                                    VALUES ('$date', 'Sell', '$request_item_name', '$request_item_quantity',
                                    'Pending', '$newFileName', '$user_id', '$request_item_type')";

                    /*
                    Added "picture_id" column in "requests" database table. There's a reason for it.
                    Each time a user submits and uploads a picture to the system,
                    the database keeps a record of the file name and extension type in the table.
                    So that I don't have to code another module for retrieving the picture file and
                    instead refer back to the database for the file name and extension type.
                    Because it's a hassle to go around to retrieve the requests ID and user ID again.
                    */

                    // Attempt to connect to the database and execute the query.
                    $sql_query_2_result = $connection->query($sql_query_2);
                }
                $form_status = "Sell request form has been successfully submitted!";
            }
            else {
                $file_upload_failed = "&#x274C Sorry, there was an error uploading your file.";
                $form_status = "Sell request form has not been successfully submitted.";
            }
        }

        // File upload module.
        // Reference: https://www.w3schools.com/php/php_file_upload.asp
        ?>

        <?php
        // Check if the form has been submitted.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form data from the tables.
            @$request_item_type = $_POST["txtRequestItemType"];
            @$request_item_name = $_POST["txtRequestItemName"];
            @$request_item_quantity = $_POST["txtRequestQuantity"];

            // Declare a variable for the query.
            $sql_query_3 = "SELECT * FROM items
                            WHERE item_id = $request_item_type";

            // Attempt to connect to the database and execute the query.
            $sql_query_3_result = $connection->query($sql_query_3);

            // Sort the data.
            while($sql_query_3_row = $sql_query_3_result->fetch_assoc()) {
                $items_item_name = $sql_query_3_row['item_type'];
            }

            // Use heredoc syntax to make the code readable and easier to maintain.
            // Very useful for handling large blocks of of codes.
            $html = <<<HTML
            <style>
                #contents-2-container {
                    display: none;
                }

                #customer-sell-request-form,
                .action-1-button,
                .action-2-button {
                    display: none;
                }

                #contents-3-container {
                    height: 300px;
                }

                #contents-3-content {
                    height: 100%;
                }

                #contents-4-container {
                    display: block;
                }
            </style>

            <script>
                // Disable the form actions after submitting the request.
                document.getElementById("customer-sell-request-form").disabled = true;
            </script>

            <!-- Layout for the contents 3 container. -->
            <div id="contents-3-container">
                <div id="contents-3-content">
                    <div class="margin-30px"></div>
                    <h2>$form_status</h2>
                    <div class="margin-30px"></div>
                    <p>Here is the form details:</p>
                    <p>Type of Request: Sell</p>
                    <p>Item Type: $items_item_name</p>
                    <p>Item Name: $request_item_name</p>
                    <p>Quantity: $request_item_quantity</p>
                    <div class="margin-50px"></div>
                </div>
            </div>

            <div class="margin-50px"></div>
            HTML;
            echo $html;
        }

        // Use heredoc syntax to make the code readable and easier to maintain.
        // Very useful for handling large blocks of of codes.
        $html = <<<HTML
            <!-- Layout for the contents 3 container. -->
            <div id="contents-4-container">
                <div id="contents-4-content">
                    <h2>Picture results</h2>
                    <div class="margin-30px"></div>
                    <div class="picture-table-contents">
                        <table>
                            <tr>
                                <th colspan="2" style="padding-left: 0; text-align: center;">Picture/Image Conditions</th>
                            </tr>
                            <tr>
                                <th>
                                    Is the file an image?
                                </th>
                                <td>
                                    $file_is_image$file_not_image
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Does the file already exists?
                                </th>
                                <td>
                                    $file_already_exists
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Is the file size over the limit?
                                </th>
                                <td>
                                    $file_file_size
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Is the file type an image?
                                </th>
                                <td>
                                    $file_image_type
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Is the file upload successful?
                                </th>
                                <td>
                                    $file_not_uploaded$file_upload_success$file_upload_failed
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="margin-50px"></div>
                    <img src="$newTargetFile" width="90%" height ="50%" alt="User's request picture." title="User's request picture.">
                    <div class="margin-50px"></div>
                    <div class="container-5-container">
                        <a class="container-5-contents" href="../buy-sell-request/index.php">
                            <p>Return to the buy/sell request page</p>
                        </a>
                    </div>
                    <div class="margin-80px"></div>
                </div>
            </div>

        <div class="margin-20px"></div>
        HTML;
        echo $html;
        ?>

        <!-- Customer Sell Request Form -->
        <div>
            <form id="customer-sell-request-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="sell-table-contents">
                    <table>
                        <tr>
                            <th colspan="2" style="padding-left: 0; text-align: center;">
                                Supplier Sell Request Form
                            </th>
                        </tr>
                        <tr>
                            <th>Transaction type:</th>
                            <td><input type="text" name="txtRequestType" value="Sell" disabled></td>
                        </tr>
                        <tr>
                            <th>Item Type:</th>
                            <td>
                                <select id="txtRequestItemType" name="txtRequestItemType">
            <?php
            // Declare a variable for the query.
            $sql_query_4 = "SELECT * FROM `items` WHERE
                            transaction_type = 'Sell'
                            ORDER BY item_id ASC";

            // Attempt to connect to the database and execute the query.
            $sql_query_4_result = $connection->query($sql_query_4);

            // Insert each of the results into the table.
            while($sql_query_4_row = $sql_query_4_result->fetch_assoc()) {
                // Use heredoc syntax to make the code readable and easier to maintain.
                // Very useful for handling large blocks of of codes.
                $html = <<<HTML
                                    <option value="{$sql_query_4_row['item_id']}">{$sql_query_4_row['item_type']}</option>
                HTML;
                echo $html;
            }

            // Ensure the connection to the DB is closed, with or without
            // any code or query execution for security reasons.
            $connection->close();
            ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Item Name:</th>
                            <td><input type="text" name="txtRequestItemName" required></td>
                        </tr>
                        <tr>
                            <th>Quantity:</th>
                            <td><input type="text" name="txtRequestQuantity" pattern="[0-9]*" placeholder="Enter only numbers." required></td>
                        </tr>
                        <tr>
                            <th>Picture:</th>
                            <td>
                                <input type="file" id="fileToUpload" name="fileToUpload">
                            </td>
                        </tr>
                        <tr class="action-1-button">
                            <th>Actions:</th>
                            <td><input type="submit" name="submit" value="Submit request form"></td>
                        </tr>
                    </table>
                </div>
            </form>
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
