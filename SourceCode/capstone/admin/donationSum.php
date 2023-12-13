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

<style>
  @media print {
    @page {
      margin: 0;
    }

    /* Hide unnecessary elements for printing */
    body {
      margin: 1.6cm;
    }

    #filterSection,
    .noPrint {
      display: none;
    }

    /* Adjust the table styles for printing */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    /* Hide page details in print mode */
    @page {
      margin: 0;
    }

    /* Add more print styles as needed */
  }
</style>

<div class="col-md-12 mt-3">
  <h5 class="card-title fw-bold" style="font-family: 'Poppins', sans-serif;">Donation Summary</h5>
              <div class="ms-auto mb-2">
               <form method="get">
                  <div class="row">
                    <div class="col-md-6">
                      <input name="selectedYear" id="barFilterDate" class="form-control mt-1 noPrint" type="number" placeholder="Select Year" value="<?php echo $defaultYear; ?>">
                    </div>
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-sm btn-primary mt-2 noPrint">Apply</button>
                      <button class="btn btn-success btn-sm noPrint mt-2" onclick="printReport()">Print</button>
                    </div>
                  </div>
                </form>
             </div>
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

<script type="text/javascript">
  function printReport() {
    window.print();
  }
</script>