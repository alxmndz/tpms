
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style type="text/css">
  .shortened {
    width: 47%;
  }

  .shorteneds {
    width: 50%;
    margin-right: 10px;
  }

  @media print {
    /* Hide non-essential elements */
    .noPrint {
      display: none;
    }

    /* Adjust styles for the printed page */
    body {
      font-family: 'Poppins', sans-serif;
      padding: 10px;
    }

    .container {
      width: 100%;
      margin: 0;
    }

    .card {
      border: 1px solid #ddd;
      margin-bottom: 10px;
    }

    .card-body {
      padding: 10px;
    }

    .form-select,
    .form-control {
      width: 100%;
    }

    .pieChart {
      margin-top: 50px; /* Adjust the margin-top value to ensure the pie chart is not cut in portrait mode */
    }

    .row {
      margin: 0 -5px;
    }

    .col-md-6 {
      width: 50%;
      float: center;
      box-sizing: border-box;
      padding: 0 5px;
    }
    /* Responsive styles for the charts */
    canvas {
      max-width: 100%; /* Make charts responsive */
      height: auto; /* Prevent charts from being stretched */
    }

    /* Additional styles as needed for your layout */
  }

</style>


<?php include "charts/walkInReserve.php"; ?>

<?php include "charts/onlineReserve.php"; ?>

<?php include "charts/requestCert.php"; ?>

<?php include "charts/donationChart.php"; ?>

<?php include "charts/eventList.php"; ?>

<div class="container-fluid">
  <div>
    <div class="card-body">
      <h5 style="font-family: 'Poppins', sans-serif;" class="fw-bold">Summary Report</h5>

        <button class="btn btn-primary btn-sm mt-3 noPrint" data-toggle="collapse" data-target="#barFilter">Filter &#9776;</button>
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
            <button class="btn btn-success btn-sm mt-3 noPrint" onclick="printReport()">Print Report</button>

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

          <div class="col-md-6 mt-3 pieChart">
            <div class="card">
              <div class="card-body">
                <canvas id="pieChart" width="100%" height="400"></canvas>
              </div>
            </div>
          </div>

         <div class="col-md-6 mt-3 row" id="summaryEvnts">

          <div class="card summary card-sm mt-3">
            <div class="card-body text-center">
              <h1 class="card-text"><?= $formattedSum ?></h1>
              <h5 class="card-title text-center fw-bold" style="font-family: 'Poppins', sans-serif;">Total Donation Amount:</h5>
            </div>
          </div>

          <div class="card summary card-sm mt-3 mb-2">
            <div class="card-body text-center">
              <h1 class="card-text"><?= $totalEvents ?></h1>
              <h5 class="card-title text-center fw-bold" style="font-family: 'Poppins', sans-serif;">Total events for <?= date("F Y", strtotime("$selectedYear-$selectedMonth-01")) ?></h5>
            </div>
          </div>

      </div>

    </div>
  </div>
</div>



<script type="text/javascript">
  const labelsOnline = ['Baptismal', 'Blessing', 'Communion', 'Confirmation', 'Funeral', 'Wedding'];
  const dataOnline = <?php echo json_encode($onlineCounts); ?>;
  const backgroundColorOnline = ['#36A2EB', '#FFCE56', '#16A085', '#E74C3C', '#E67E22', '#2E86C1'];
  const borderColorOnline = ['#36A2EB', '#FFCE56', '#138D75', '#C0392B', '#EB984E', '#2874A6'];

  const configOnline = {
    type: 'bar',
    data: {
      labels: labelsOnline,
      datasets: [{
        label: 'Online Reservation',
        data: dataOnline,
        backgroundColor: backgroundColorOnline,
        borderColor: borderColorOnline,
      }],
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Online Data Counts from Multiple Tables',
      },
    },
  };

  const chartOnline = new Chart(
    document.getElementById('barChart'),
    configOnline
  );




  const labels = ['Baptismal', 'Blessing', 'Communion', 'Confirmation' ,'Funeral', 'Wedding'];
  const datasets = [{
    label: 'Walk-In Reservation',
    data: <?php echo json_encode($counts); ?>,
    backgroundColor: ['#36A2EB', '#FFCE56','#16A085', '#E74C3C','#E67E22', '#2E86C1'],
    borderColor: ['#36A2EB', '#FFCE56','#138D75', '#C0392B','#EB984E', '#2874A6'],
  }];

  const config = {
    type: 'bar',
    data: {
      labels: labels,
      datasets: datasets
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Data Counts from Multiple Tables'    
      },
      legend: {
        display: false, // Turn off the legend
      }
    }
  };

  const chart = new Chart(
    document.getElementById('barGraph'),
    config
  );
</script>

<script type="text/javascript">
  $(function () {
      // Pie Chart Data
      var pieChartData = {
        datasets: [
          {
            data: <?php echo json_encode($reqCounts); ?>,
            backgroundColor: ['#16A085', '#3498DB', '#8E44AD', '#C0392B', '#DC7633'],
          },
        ],
        labels: ['Baptismal Certificate', 'Communion Certificate', 'Confirmation Certificate', 'Death Certificate', 'Marriage Certificate'],
      };

      var pieChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          position: 'bottom',
          labels: {
            boxWidth: 12,
          },
        },
      };

      var ctx_2 = document.getElementById('pieChart').getContext('2d');
      new Chart(ctx_2, {
        type: 'doughnut',
        data: pieChartData,
        options: pieChartOptions,
      });

    });
</script>


<script type="text/javascript">
  function printReport() {
    window.print();
  }
</script>
