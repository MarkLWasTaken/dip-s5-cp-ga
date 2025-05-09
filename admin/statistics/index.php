
<!--
Start of the lines/blocks of codes
Developed by M1
Student ID: Redacted
-->

<!--
Start of the lines/blocks of codes
Contributed by M3
Student ID: Redacted
-->

<?php

/*
Start of the lines/blocks of codes
Developed by M1
Student ID: Redacted
*/

// Start/Initialize the session.
session_start();

// Include the PHP script for connecting to the database (DB).
include '../../php/connection.php';

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

// Users who are not admins
// are not allowed to access this page.
if ($is_admin == 0 || $is_admin == null) {
  header('Location: ../../index.php');
}

/*
End of the lines/blocks of codes
Developed by M1
Student ID: Redacted
*/

$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'ewaste'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getStatsData($type) {
    global $conn;
    $query = "SELECT Material_Name, SUM(Unit) AS total_units
              FROM statistical_reports
              WHERE Report_Type = '$type'
              GROUP BY Material_Name";
    
    $result = $conn->query($query);
    
    $items = [];
    $amounts = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row['Material_Name'];
            $amounts[] = $row['total_units'];  
        }
    }

    return [
        'items' => $items,
        'amounts' => $amounts
    ];
}

function showStats($type) {
    $data = getStatsData($type);

    echo "<ul>";
    foreach ($data['items'] as $index => $item) {
        $amount = $data['amounts'][$index];
        echo "<li>$item - $amount</li>";
    }
    echo "</ul>";
}

$materialsData = getStatsData('Preprocessing');
$recycledData = getStatsData('Recycled');
$ewasteData = getStatsData('Collected');
$saleData = getStatsData('Sold');
$rewardData = getStatsData('Reward');
$cashData = getStatsData('Cash'); 

$materialsChartJSON = json_encode($materialsData);
$recycledChartJSON = json_encode($recycledData);
$ewasteChartJSON = json_encode($ewasteData);
$saleChartJSON = json_encode($saleData);
$rewardChartJSON = json_encode($rewardData);
$cashChartJSON = json_encode($cashData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>E-Waste Management System - Statistics</title>
  <link rel="stylesheet" href="../../css/admin-statistics.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<header>
  <h1>E-Waste Management System - Statistics</h1>
</header>

<nav>
  <a href="../../dashboard.php">Dashboard</a>
  <a href="#materials">Preprocessing Materials</a>
  <a href="#recycled">Recycled Products</a>
  <a href="#e-waste">Collected E-Waste</a>
  <a href="#sold">Sold Materials</a>
  <a href="#cash">Cash Consideration</a>
  <a href="#rewards">Cash Rewards</a>
</nav>

<section id="materials">
  <h2 class="section-title">Preprocessing Collected Materials</h2>
  <div class="history-container">
    <?php showStats('Preprocessing'); ?>
  </div>

  <div class="chart-container">
    <canvas id="materialsChart"></canvas>
  </div>
</section>

<section id="recycled">
  <h2 class="section-title">Recycled End-Products</h2>
  <div class="history-container">
    <?php showStats('Recycled'); ?>
  </div>

  <div class="chart-container">
    <canvas id="recycledChart"></canvas>
  </div>
</section>

<section id="e-waste">
  <h2 class="section-title">All Collected E-Waste</h2>
  <div class="history-container">
    <?php showStats('Collected'); ?>
  </div>

  <div class="chart-container">
    <canvas id="ewasteChart"></canvas>
  </div>
</section>

<section id="sold">
  <h2 class="section-title">Sold Recycled Materials</h2>
  <div class="history-container">
    <?php showStats('Sold'); ?>
  </div>

  <div class="chart-container">
    <canvas id="saleChart"></canvas>
  </div>
</section>

<section id="cash">
  <h2 class="section-title">Cash Considerations</h2>
  <div class="history-container">
    <?php showStats('Cash'); ?>
  </div>
  <div class="chart-container">
    <canvas id="cashChart"></canvas>
  </div>
</section>

<section id="rewards">
  <h2 class="section-title">Paid Cash Rewards</h2>
  <div class="history-container">
    <?php showStats('Reward'); ?>
  </div>

  <div class="chart-container">
    <canvas id="rewardChart"></canvas>
  </div>
</section>

<script>
  const materialsData = <?php echo $materialsChartJSON; ?>;
  const recycledData = <?php echo $recycledChartJSON; ?>;
  const ewasteData = <?php echo $ewasteChartJSON; ?>;
  const saleData = <?php echo $saleChartJSON; ?>;
  const rewardData = <?php echo $rewardChartJSON; ?>;
  const cashData = <?php echo $cashChartJSON; ?>; 

  const materialsCtx = document.getElementById('materialsChart').getContext('2d');
  new Chart(materialsCtx, {
    type: 'bar',
    data: {
      labels: materialsData.items,
      datasets: [{
        label: 'Amount (Units)',
        data: materialsData.amounts,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const recycledCtx = document.getElementById('recycledChart').getContext('2d');
  new Chart(recycledCtx, {
    type: 'bar',
    data: {
      labels: recycledData.items,
      datasets: [{
        label: 'Amount (Units)',
        data: recycledData.amounts,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const ewasteCtx = document.getElementById('ewasteChart').getContext('2d');
  new Chart(ewasteCtx, {
    type: 'bar',
    data: {
      labels: ewasteData.items,
      datasets: [{
        label: 'Amount (Units)',
        data: ewasteData.amounts,
        backgroundColor: 'rgba(153, 102, 255, 0.2)',
        borderColor: 'rgba(153, 102, 255, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const saleCtx = document.getElementById('saleChart').getContext('2d');
  new Chart(saleCtx, {
    type: 'bar',
    data: {
      labels: saleData.items,
      datasets: [{
        label: 'Amount Sold (Units)',
        data: saleData.amounts,
        backgroundColor: 'rgba(255, 159, 64, 0.2)',
        borderColor: 'rgba(255, 159, 64, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const cashCtx = document.getElementById('cashChart').getContext('2d');
  new Chart(cashCtx, {
    type: 'bar',
    data: {
      labels: cashData.items.slice(0, 10),
      datasets: [{
        label: 'Cash Consideration Amount (Currency)',
        data: cashData.amounts.slice(0, 10), 
        backgroundColor: 'rgba(255, 159, 64, 0.2)',
        borderColor: 'rgba(255, 159, 64, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const rewardCtx = document.getElementById('rewardChart').getContext('2d');
  new Chart(rewardCtx, {
    type: 'bar',
    data: {
      labels: rewardData.items,
      datasets: [{
        label: 'Reward Amount (Currency)',
        data: rewardData.amounts,
        backgroundColor: 'rgba(255, 159, 64, 0.2)',
        borderColor: 'rgba(255, 159, 64, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

</body>
</html>

<!--
End of the lines/blocks of codes
Contributed by M3
Student ID: Redacted
-->

<!--
End of the lines/blocks of codes
Developed by M1
Student ID: Redacted
-->
