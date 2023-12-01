<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" type="text/css" href="css/report.css">

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

<button class="btn btn-primary btn-sm noPrint" data-toggle="collapse" data-target="#barFilter">Filter &#9776;</button>
            <div id="barFilter" class="collapse">
              <form method="get">
                  <input name="selectedYear" id="barFilterDate" class="form-control shortened mt-2" type="number" placeholder="Select Year" value="<?php echo $currentYear; ?>">
            	  <button type="submit" class="btn btn-sm btn-primary mt-2">Apply Filter</button>
          </form>
        </div>
      <button class="btn btn-success btn-sm noPrint" onclick="printReport()">Print Report</button>

<div class="col-md-12 mt-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-bold" style="font-family: 'Poppins', sans-serif;">Donation Summary</h5>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Months</th>
                    <th>Donation</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
// Replace the sample data below with your actual data retrieval logic
$sampleData = [
    ['January', $formattedSumJan],
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
        // Format numeric values with two decimal points
        if (is_numeric($cell)) {
            echo '<td>' . number_format($cell, 2) . '</td>';
        } else {
            echo '<td>' . $cell . '</td>';
        }
    }
    echo '</tr>';
}
?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

<script type="text/javascript">
  function printReport() {
    window.print();
  }
</script>