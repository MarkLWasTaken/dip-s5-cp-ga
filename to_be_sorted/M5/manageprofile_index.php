<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e4f6e7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background:linear-gradient( #6acb7a, #5eb797);
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #fafcff;
            -webkit-text-stroke: 1px grey;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .gender-options {
            margin-top: 5px;
        }
        .gender-options label {
            font-weight: normal;
            margin-right: 15px;
        }
        .submit-btn {
            margin-top: 25px;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }
        .error {
            background-color: #f8d7da;
            color: #842029;
        }
        .success {
            background-color: #d1e7dd;
            color: #0f5132;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Profile</h1>

        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="message error">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="message success">' . htmlspecialchars($_SESSION['success']) . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        <form action="process/update_profile.php" method="post" novalidate>
            <label for="txtFName">First Name:</label>
            <input type="text" id="txtFName" name="txtFName" value="" required />

            <label for="txtLName">Last Name:</label>
            <input type="text" id="txtLName" name="txtLName" value="" required />

            <label for="txtUsername">Username:</label>
            <input type="text" id="txtUsername" name="txtUsername" value="" required />

            <label for="txtEmail">Email Address:</label>
            <input type="email" id="txtEmail" name="txtEmail" value="" required />

            <label for="txtPhone">Phone Number:</label>
            <input type="text" id="txtPhone" name="txtPhone" value="" />

            <label>Gender:</label>
            <div class="gender-options">
                <label><input type="radio" name="rdoGender" value="male" checked /> Male</label>
                <label><input type="radio" name="rdoGender" value="female" /> Female</label>
            </div>

            <label for="selCountry">Country:</label>
            <select id="selCountry" name="selCountry" required>
                <option value="Malaysia" selected>Malaysia</option>
                <option value="United States">United States</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Australia">Australia</option>
                <option value="Canada">Canada</option>
                <!-- Add more countries as needed -->
            </select>

            <button type="submit" name="btnUpdate" class="submit-btn">Confirm</button>
        </form>
    </div>
</body>
</html>
