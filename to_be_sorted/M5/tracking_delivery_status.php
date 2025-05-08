<?php
include_once '../../php/connection.php';

// Initialize variables
$status_message = '';
$tracking_id = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tracking_id = trim($_POST['tracking_id'] ?? '');
    if ($tracking_id === '') {
        $status_message = 'Please enter a tracking ID.';
    } else {
        // Prepare and execute query
        $stmt = $connection->prepare("SELECT delivery_status FROM sales_request_tracking WHERE sales_request_tracking_id = ?");
        $stmt->bind_param("s", $tracking_id);
        $stmt->execute();
        $stmt->bind_result($delivery_status);
        if ($stmt->fetch()) {
            $status_message = 'Status for tracking ID ' . htmlspecialchars($tracking_id) . ': ' . htmlspecialchars($delivery_status);
        } else {
            $status_message = 'Tracking ID not found. Please check and try again.';
        }
        $stmt->close();
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Tracking Status</title>
    <style>
        * {
    box-sizing: border-box;
}

        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #e4f6e7;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: linear-gradient(to bottom, #6acb7a, #5eb797);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #e4f6e7;
            color: #6acb7a ;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #000000 ;
        }
        .status-message {
            font-weight: bold;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Your Package Status</h2>
        <form method="POST" action="">
            <div>
            <label for="tracking_id">Enter Tracking ID:</label>
            <input type="text" id="tracking_id" name="tracking_id" value="<?php echo htmlspecialchars($tracking_id); ?>" required>
            <input type="submit" value="Check Status">
            </div>
        </form>
        <div class="status-message"><?php echo $status_message; ?></div>
    </div>
</body>
</html>
