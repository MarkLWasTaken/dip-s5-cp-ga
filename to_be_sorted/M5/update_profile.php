<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnUpdate'])) {
    $user_id = $_SESSION['user_id'];

    // Sanitize and validate inputs
    
    $first_name = trim($_POST['txtFName']);
    $last_name = trim($_POST['txtLName']);
    $username = trim($_POST['txtUsername']);
    $email = trim($_POST['txtEmail']);
    $phone = trim($_POST['txtPhone']);
    $gender = isset($_POST['rdoGender']) ? $_POST['rdoGender'] : '';
    $country = isset($_POST['selCountry']) ? $_POST['selCountry'] : '';

   
    // Basic validation
    if (empty($first_name) || empty($last_name) || empty($username) || empty($email)) {
        $_SESSION['error'] = "Please fill in all required fields.";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        exit();
    }

    // Optional: Validate phone number format (basic)
    if (!empty($phone) && !preg_match('/^\+?[0-9\s\-]{7,15}$/', $phone)) {
        $_SESSION['error'] = "Invalid phone number format.";
        exit();
    }

    // Prepare and bind to prevent SQL injection
    $stmt = $connection->prepare("UPDATE users SET first_name=?, last_name=?, email_address=?, phone_number=?, gender=?, country=? WHERE user_id=?");
    if ($stmt === false) {
        $_SESSION['error'] = "Database error: " . $connection->error;
        exit();
    }

    $stmt->bind_param("sssssssi",$first_name, $last_name, $email, $phone, $gender, $country, $user_id);

    if ($stmt->execute()) {
        // Update session variables
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email_address'] = $email;
        $_SESSION['phone_number'] = $phone;
        $_SESSION['gender'] = $gender;
        $_SESSION['country'] = $country;

        $_SESSION['success'] = "Profile updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update profile: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();

    exit();
} else {
    exit();
}
?>
