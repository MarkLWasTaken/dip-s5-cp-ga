<?php
include 'db.php';

$buyQuery = "SELECT COUNT(*) as total FROM requests WHERE request_type='Buy'";
$sellQuery = "SELECT COUNT(*) as total FROM requests WHERE request_type='Sell'";
$buyCount = $conn->query($buyQuery)->fetch_assoc()['total'];
$sellCount = $conn->query($sellQuery)->fetch_assoc()['total'];

$statusQuery = "SELECT request_status, COUNT(*) as count FROM requests GROUP BY request_status";
$statusResult = $conn->query($statusQuery);
$statusData = [];
while ($row = $statusResult->fetch_assoc()) {
    $statusData[$row['request_status']] = $row['count'];
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
            /* background-color: #f4f4f4; */
            /* background: linear-gradient(rgb(50, 70, 70, 1), rgba(27, 47, 48, 0.7)); */
            background: linear-gradient(rgba(24, 26, 27, 1), rgba(0, 0, 0, 0.7));
        }

        .card {
            /* background: white; */
            background: linear-gradient(rgb(50, 70, 70, 1), rgba(27, 47, 48, 0.7));
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        h2 {
            /* color: #333; */
            color: white;
        }

        canvas {
            max-width: 400px;
            margin-top: 30px;
            max-height: 400px;
        }

        .page-title {
            color: white;
        }
    </style>
</head>
<body>

    <h1 class="page-title">Admin Dashboard</h1>

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
                labels: ['Pending',
                        'Pending payment (Buy)',
                        'Approved (Sell)',
                        'Approve delivery (Buy)',
                        'Rejected'
                        ],
                datasets: [{
                    label: 'Request Status',
                    data: [
                        <?php echo $statusData['Pending'] ?? 0; ?>,
                        <?php echo $statusData['Pending payment'] ?? 0; ?>,
                        <?php echo $statusData['Approved'] ?? 0; ?>,
                        <?php echo $statusData['Approve delivery'] ?? 0; ?>,
                        <?php echo $statusData['Rejected'] ?? 0; ?>
                    ],
                    backgroundColor: ['#f1c40f', // Yellow
                                        '#DA70D6', // Orchid (Purple)
                                        '#2ecc71', // Green
                                        '#00DEFF', // Blue (Munsell)
                                        '#e74c3c' // Red
                                    ]
                }]
            },
            options: {
                responsive: true,
                // Do not set this value to false.
                // maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>