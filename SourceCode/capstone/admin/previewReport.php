<?php
// Include any necessary configurations or connections here
include "php/dbconn";
// Retrieve the selected month and year from the query parameters
$selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : date('n');
$selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : date('Y');
?>

<?php include "charts/walkInReserve.php"; ?>

<?php include "charts/onlineReserve.php"; ?>

<?php include "charts/requestCert.php"; ?>

<?php include "charts/donationChart.php"; ?>

<?php include "charts/eventList.php"; ?>

<?php include "charts/donationLine.php"; ?>

<?php include "charts/reservationList.php"; ?>

<?php include "charts/JanDonationSummary.php"; ?>

<?php include "charts/FebDonationSummary.php"; ?>

<?php include "charts/MarDonationSummary.php"; ?>

<?php include "charts/AprDonationSummary.php"; ?>

<?php include "charts/MayDonationSummary.php"; ?>

<?php include "charts/JunDonationSummary.php"; ?>

<?php include "charts/JulDonationSummary.php"; ?>

<?php include "charts/AugDonationSummary.php"; ?>

<?php include "charts/SepDonationSummary.php"; ?>

<?php include "charts/OctDonationSummary.php"; ?>

<?php include "charts/NovDonationSummary.php"; ?>

<?php include "charts/DecDonationSummary.php"; ?>

<?php include "charts/TotalDonationSummary.php"; ?>

<?php include "reserveData/janReservedList.php"; ?>

<?php include "reserveData/febReservedList.php"; ?>

<?php include "reserveData/marReservedList.php"; ?>

<?php include "reserveData/aprReservedList.php"; ?>

<?php include "reserveData/mayReservedList.php"; ?>

<?php include "reserveData/junReservedList.php"; ?>

<?php include "reserveData/julReservedList.php"; ?>

<?php include "reserveData/augReservedList.php"; ?>

<?php include "reserveData/sepReservedList.php"; ?>

<?php include "reserveData/octReservedList.php"; ?>

<?php include "reserveData/novReservedList.php"; ?>

<?php include "reserveData/decReservedList.php"; ?>

<?php include "reserveData/totalReservedList.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    @media print {
      /* Add styles for printing */
      .noPrint {
        display: none;
      }

      body {
        font-size: 12px;
      }

      .container {
        width: 100%;
      }

      .card {
        border: none;
        box-shadow: none;
        margin: 0;
      }

      .card-body {
        padding: 1rem;
      }

      .table {
        font-size: 12px;
      }

      .summary {
        border: none;
        box-shadow: none;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h5 style="font-family: 'Poppins', sans-serif;" class="fw-bold">Summary Report</h5>

        <button class="btn btn-primary btn-sm noPrint" data-toggle="collapse" data-target="#barFilter">Filter &#9776;</button>
        <div id="barFilter" class="collapse">
          <form method="get">
            <div class="row">
              <select name="selectedMonth" class="form-select shorteneds mt-2">
                <?php
                for ($month = 1; $month <= 12; $month++) {
                  $selected = ($selectedMonth == $month) ? 'selected' : '';
                  echo "<option value=\"$month\" $selected>" . date("F", mktime(0, 0, 0, $month, 1)) . "</option>";
                }
                ?>
              </select>
              <input name="selectedYear" id="barFilterDate" class="form-control shortened mt-2" type="number" placeholder="Select Year" value="<?php echo $selectedYear; ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary mt-2">Apply Filter</button>
          </form>
        </div>
        <button class="btn btn-success btn-sm noPrint" onclick="printReport()">Print Report</button>

        <div class="row mt-3">

          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <canvas id="barGraph"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <canvas id="barChart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="card">
              <div class="card-body">
                <canvas id="barCert" width="100%" height="400px"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6 mt-2">
            <div class="card">
              <div class="card-header">
                <h5>Total Reserved per Month</h5>
              </div>
              <div class="card-body">
                <canvas id="reservedChart" width="100%"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6 mt-2">
            <div class="card">
              <div class="card-header">
                <h5>Total Donation per Month</h5>
              </div>
              <div class="card-body">
                <canvas id="lineChart" width="100%"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6 mt-3 row" id="summaryEvnts">

            <div class="card summary card-sm mt-3">
              <div class="card-body text-center">
                <h3 class="card-title text-center fw-bold" style="font-family: 'Poppins', sans-serif;">Total Donation Amount:</h3>
                <h3 class="card-text"><?= $formattedSum ?></h3>
              </div>
            </div>

            <div class="card summary card-sm mt-3 mb-2">
              <div class="card-body text-center">
                <h3 class="card-title text-center fw-bold" style="font-family: 'Poppins', sans-serif;">Total events for <?= date("M Y", strtotime("$selectedYear-$selectedMonth")) ?></h3>
                <h2 class="card-text">
                  <?php
                  include "php/dbconn.php";

                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

                  // Get the current month and year
                  $defaultMonth = date("m");
                  $defaultYear = date("Y");

                  $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
                  $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;

                  // Construct the SQL query with the WHERE clause
                  $sql = "SELECT COUNT(*) as eventCount FROM eventlist WHERE MONTH(eventDate) = $selectedMonth AND YEAR(eventDate) = $selectedYear";

                  $result = $conn->query($sql);

                  if ($result === false) {
                    // Handle the query error
                    echo "Error: " . $conn->error;
                  } else {
                    // Fetch the result
                    $row = $result->fetch_assoc();

                    // Display the count
                    echo $row['eventCount'];
                  }
                  ?>

                </h2>
              </div>
            </div>

          </div>

        </div>

        <div class="col-md-12 mt-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-bold" style="font-family: 'Poppins', sans-serif;">Donation Summary</h5>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Months</th>
                    <th>Donation Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Replace the sample data below with your actual data retrieval logic
                  $sampleData = [
                    ['Jannuary', $formattedSumJan],
                    ['February', $formattedSumFeb],
                    ['March', $formattedSumMar],
                    ['April', $formattedSumApr],
                    ['May', $formattedSumMay],
                    ['June', $formattedSumJun],
                    ['July', $formattedSumJul],
                    ['August', $formattedSumAug],
                    ['September', $formattedSumSep],
                    ['October', $formattedSumOct],
                    ['November', $formattedSumNov],
                    ['December', $formattedSumDec],
                    ['Total Amount', $formattedSumTotal],
                  ];

                  foreach ($sampleData as $row) {
                    echo '<tr>';
                    foreach ($row as $cell) {
                      echo '<td>' . $cell . '</td>';
                    }
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-bold" style="font-family: 'Poppins', sans-serif;">Report Summary</h5>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Baptismal</th>
                    <th>Blessing</th>
                    <th>Communion</th>
                    <th>Confirmation</th>
                    <th>Funeral</th>
                    <th>Wedding</th>
                    <!-- Add more columns as needed -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Replace the sample data below with your actual data retrieval logic
                  $sampleData = [
                    ['January', $baptismCount, $blessingCount, $communionCount, $confirmationCount, $funeralMassCount, $weddingCount],
                    ['February', $baptismCountFeb, $blessingCountFeb, $communionCountFeb, $confirmationCountFeb, $funeralMassCountFeb, $weddingCountFeb],
                    ['March', $baptismCountMar, $blessingCountMar, $communionCountMar, $confirmationCountMar, $funeralMassCountMar, $weddingCountMar],
                    ['April', $baptismCountApr, $blessingCountApr, $communionCountApr, $confirmationCountApr, $funeralMassCountApr, $weddingCountApr],
                    ['May', $baptismCountMay, $blessingCountMay, $communionCountMay, $confirmationCountMay, $funeralMassCountMay, $weddingCountMay],
                    ['June', $baptismCountJun, $blessingCountJun, $communionCountJun, $confirmationCountJun, $funeralMassCountJun, $weddingCountJun],
                    ['July', $baptismCountJul, $blessingCountJul, $communionCountJul, $confirmationCountJul, $funeralMassCountJul, $weddingCountJul],
                    ['August', $baptismCountAug, $blessingCountAug, $communionCountAug, $confirmationCountAug, $funeralMassCountAug, $weddingCountAug],
                    ['September', $baptismCountSep, $blessingCountSep, $communionCountSep, $confirmationCountSep, $funeralMassCountSep, $weddingCountSep],
                    ['October', $baptismCountOct, $blessingCountOct, $communionCountOct, $confirmationCountOct, $funeralMassCountOct, $weddingCountOct],
                    ['November', $baptismCountNov, $blessingCountNov, $communionCountNov, $confirmationCountNov, $funeralMassCountNov, $weddingCountNov],
                    ['December', $baptismCountDec, $blessingCountDec, $communionCountDec, $confirmationCountDec, $funeralMassCountDec, $weddingCountDec],
                    ['Total', $baptismCountSum, $blessingCountSum, $communionCountSum, $confirmationCountSum, $funeralMassCountSum, $weddingCountSum],
                    // Add more rows as needed
                  ];

                  foreach ($sampleData as $row) {
                    echo '<tr>';
                    foreach ($row as $cell) {
                      echo '<td>' . $cell . '</td>';
                    }
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>
