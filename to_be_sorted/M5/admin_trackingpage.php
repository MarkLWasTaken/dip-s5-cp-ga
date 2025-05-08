<?php
include_once '../../php/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['flag_issue_id'])) {
        $flag_issue_id = $_POST['flag_issue_id'];
        $update_stmt = $connection->prepare("UPDATE sales_request_tracking SET delivery_status = 'Reschedule' WHERE sales_request_tracking_id = ?");
        $update_stmt->bind_param("s", $flag_issue_id);
        $update_stmt->execute();
        $update_stmt->close();
    } elseif (isset($_POST['edit_status_id'], $_POST['new_status'])) {
        $edit_status_id = $_POST['edit_status_id'];
        $new_status = $_POST['new_status'];
        $update_stmt = $connection->prepare("UPDATE sales_request_tracking SET delivery_status = ? WHERE sales_request_tracking_id = ?");
        $update_stmt->bind_param("ss", $new_status, $edit_status_id);
        $update_stmt->execute();
        $update_stmt->close();
    }
    // Redirect to avoid form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch all tracking delivery records
$query = "SELECT sales_request_tracking_id, packing_date, delivery_date, delivery_status, request_id FROM sales_request_tracking ORDER BY delivery_date DESC";
$result = $connection->query($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Tracker Page - E-Waste</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f7f8;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #4CAF50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .status {
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 4px;
            color: white;
            display: inline-block;
        }
        .status.processing {
            background-color: #f0ad4e;
        }
        .status.in-transit {
            background-color: #5bc0de;
        }
        .status.delivered {
            background-color: #5cb85c;
        }
        .status.delayed {
            background-color: #d9534f;
        }
        .status.reschedule {
            background-color:rgb(86, 79, 217);
        }
    </style>
</head>
<body>
    <h1>Admin Tracker Page - E-Waste</h1>
    <table>
        <thead>
            <tr>
                <th>Tracking ID</th>
                <th>Request ID</th>
                <th>Packing Date</th>
                <th>Delivery Date</th>
                <th>Delivery Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): 
                            $status_class = 'status ' . strtolower(str_replace(' ', '-', $row['delivery_status']));

                    ?>
                    
                    <tr>
                        <td><?php echo htmlspecialchars($row['sales_request_tracking_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['request_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['packing_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['delivery_date']) ? htmlspecialchars($row['delivery_date']) : 'N/A'; ?></td>
                        <td><span class="status <?php echo htmlspecialchars($status_class); ?>">
                            <?php echo htmlspecialchars($row['delivery_status']); ?>
                        </span></td>
                        <td>
                            <form method="POST" action="" style="display:inline-block; margin-right: 10px;">
                                <input type="hidden" name="flag_issue_id" value="<?php echo htmlspecialchars($row['sales_request_tracking_id']); ?>" />
                                <button type="submit" onclick="return confirm('Are you sure you want to flag this issue?');">Flag Issue</button>
                            </form>
                            <form method="POST" action="" style="display:inline-block;">
                                <input type="hidden" name="edit_status_id" value="<?php echo htmlspecialchars($row['sales_request_tracking_id']); ?>" />
                                <select name="new_status" required>
                                    <option value="" disabled selected>Change Status</option>
                                    <option value="Processing">Processing</option>
                                    <option value="In Transit">In Transit</option>
                                    <option value="Delayed">Delayed</option>

                                </select>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align:center;">No tracking records found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$connection->close();
?>
