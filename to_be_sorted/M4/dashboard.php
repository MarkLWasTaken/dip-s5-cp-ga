<?php
include 'db.php';

$buyQuery = "SELECT COUNT(*) as total FROM requests WHERE type='Buy'";
$sellQuery = "SELECT COUNT(*) as total FROM requests WHERE type='Sell'";
$buyCount = $conn->query($buyQuery)->fetch_assoc()['total'];
$sellCount = $conn->query($sellQuery)->fetch_assoc()['total'];

$statusQuery = "SELECT status, COUNT(*) as count FROM requests GROUP BY status";
$statusResult = $conn->query($statusQuery);
$statusData = [];
while ($row = $statusResult->fetch_assoc()) {
    $statusData[$row['status']] = $row['count'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial;
            margin: 30px;
            background-color: #f4f4f4;
        }
        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        canvas {
            max-width: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Admin Dashboard</h1>

    <div class="card">
        <h2>Total Buy Requests: <?php echo $buyCount; ?></h2>
        <h2>Total Sell Requests: <?php echo $sellCount; ?></h2>
    </div>

    <div class="card">
        <h2>Request Status Overview</h2>
        <canvas id="statusChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Accepted', 'Rejected'],
                datasets: [{
                    label: 'Request Status',
                    data: [
                        <?php echo $statusData['Pending'] ?? 0; ?>,
                        <?php echo $statusData['Accepted'] ?? 0; ?>,
                        <?php echo $statusData['Rejected'] ?? 0; ?>
                    ],
                    backgroundColor: ['#f1c40f', '#2ecc71', '#e74c3c']
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

</body>
</html>