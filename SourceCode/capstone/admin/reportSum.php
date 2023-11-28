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

<?php 
  $defaultMonth = date("m");
  $defaultYear = date("Y");
?>

<button class="btn btn-primary btn-sm noPrint" data-toggle="collapse" data-target="#barFilter">Filter &#9776;</button>
            <div id="barFilter" class="collapse">
              <form method="get">
                <div class="row">

                  <input name="selectedYear" id="barFilterDate" class="form-control shortened mt-2" type="number" placeholder="Select Year" value="<?php echo $defaultYear; ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary mt-2">Apply Filter</button>
          </form>
        </div>
      <button class="btn btn-success btn-sm noPrint" onclick="printReport()">Print Report</button>

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