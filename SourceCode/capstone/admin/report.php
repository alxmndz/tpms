
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style type="text/css">
  .shortened {
  width: 45%;
}

.shorteneds {
  width: 50%;
  margin-right: 10px;
}
</style>

<?php include "charts/walkInReserve.php"; ?>

<?php include "charts/onlineReserve.php"; ?>

<?php include "charts/requestCert.php"; ?>

<?php include "charts/donationChart.php"; ?>

<?php include "charts/eventList.php"; ?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <h5 style="font-family: 'Poppins', sans-serif;" class="fw-bold">Generate Report</h5>

        <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#barFilter">Filter &#9776;</button>
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
            <button class="btn btn-success btn-sm" onclick="printReport()">Print Report</button>

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
                <canvas id="pieChart" width="100%" height="400"></canvas>
              </div>
            </div>
          </div>

         <div class="col-md-6 mt-3 row">
            <div class="card card-sm">
                <div class="card-body">
                  <h5 class="card-title text-center fw-bold" style="font-family: 'Poppins', sans-serif;">Total Donation Amount</h5>
                  <p class="card-text">For <?= date("F Y", strtotime("$selectedYear-$selectedMonth-01")) ?>: <?= $formattedSum ?></p>
                  <hr>
                  <h5 class="card-title">Total Events</h5>
                  <p class="card-text">Total events for <?= date("F Y", strtotime("$selectedYear-$selectedMonth-01")) ?>: <?= $totalEvents ?></p>
                </div>
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
    var selectedMonth = document.querySelector('select[name="selectedMonth"]').value;
    var selectedYear = document.getElementById('barFilterDate').value;

    var canvas = document.getElementById('barGraph');
    var canvas1 = document.getElementById('barChart');
    var canvas2 = document.getElementById('pieChart');
    var win = window.open('', '_blank');

    // Construct the title with the selected month and year
    var title = "Report Summary - " + getMonthName(selectedMonth) + " " + selectedYear;
    
    win.document.write("<html><head><title>" + title + "</title></head><body>");
    win.document.write("<img src='" + canvas.toDataURL() + "'/>");
    win.document.write("<img src='" + canvas1.toDataURL() + "'/>");
    win.document.write("<img src='" + canvas2.toDataURL() + "'/>");
    win.document.write("</body></html>");
    win.document.close();
    win.print();
    win.onafterprint = function () {
        win.close();
    };

    // Function to get the month name from the month number
    function getMonthName(monthNumber) {
      var d = new Date();
      d.setMonth(monthNumber - 1); // Months are zero-based in JavaScript
      return d.toLocaleString('en-US', { month: 'long' });
    }
  }
</script>
