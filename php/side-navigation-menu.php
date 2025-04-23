
<?php

/*
Start of the lines/blocks of codes
Developed by M1
Student ID: Redacted
*/

/*
For better and easier maintenance of the codes,
it has been split from all web pages into this file.
It is important to keep the redundancy in check.
*/

// Reference: https://www.w3schools.com/howto/howto_js_sidenav.asp

// Use heredoc syntax to make the code readable and easier to maintain.
// Very useful for handling large blocks of of codes.
$html = <<<HTML
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Close the side navigation menu.">&times;</a>
<a href="#" onclick="closeNav()">Home</a>
<a href="about/index.php" onclick="closeNav()">About us</a>
<a href="e-waste-we-buy/index.php" onclick="closeNav()">E-waste we buy</a>
<a href="e-waste-we-sell/index.php" onclick="closeNav()">E-waste we sell</a>
<a href="services/index.php" onclick="closeNav()">Services</a>
<a href="faq/index.php" onclick="closeNav()">FAQ</a>
<a href="contact/index.php" onclick="closeNav()">Contact us</a>
HTML;
echo $html;

// If the user is logged in.
if (isset($_SESSION['email_address'])) {
    // Use heredoc syntax to make the code readable and easier to maintain.
    // Very useful for handling large blocks of of codes.
    $html = <<<HTML
    <div class="margin-50px"></div>
    <!-- <a href="javascript:void(0)" style="opacity: 0;">Blank space</a> -->
    <a href="javascript:void(0)">&#128994; User is logged in.</a>
    <a href="dashboard/index.php" onclick="closeNav()">Dashboard</a>
    <a href="buy-sell-request/index.php" onclick="closeNav()">Buy/Sell Request</a>
    <a href="tracking/index.php" onclick="closeNav()">Tracking</a>
    <a href="e-waste-request-screening/index.php" onclick="closeNav()">E-waste request screening</a>
    <a href="transactions-history/index.php" onclick="closeNav()">Transactions history</a>
    <a href="requests-history/index.php" onclick="closeNav()">Requests history</a>
    <a href="profile/index.php" onclick="closeNav()">Manage/Edit Profile</a>
    <a href="account/logout/index.php" onclick="closeNav()">Logout</a>
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
if (@$is_admin == 1) {
    // Use heredoc syntax to make the code readable and easier to maintain.
    // Very useful for handling large blocks of of codes.
    $html = <<<HTML
    <a href="admin/index.php" onclick="closeNav()">Admin control panel</a>
    <a href="admin/manage-users/index.php" onclick="closeNav()">Manage users (Admin)</a>
    <a href="admin/e-waste-request-screening/index.php" onclick="closeNav()">E-waste request acceptance (Admin)</a>
    <a href="admin/statistics/index.php" onclick="closeNav()">Statistics (Admin)</a>
    <div class="margin-100px"></div>
    HTML;
    echo $html;
}

// Reference: https://www.w3schools.com/howto/howto_js_sidenav.asp

/*
End of the lines/blocks of codes
Developed by M1
Student ID: Redacted
*/

?>
