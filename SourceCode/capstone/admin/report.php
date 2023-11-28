<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" type="text/css" href="css/report.css">

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

<div class="container">
  <h5 style="font-family: 'Poppins', sans-serif;" class="fw-bold">Summary Report</h5>

        <button class="btn btn-primary btn-sm noPrint" data-toggle="collapse" data-target="#barFilter">Filter &#9776;</button>
            <div id="barFilter" class="collapse">
              <form method="get">
                <div class="row">
                  <select name="selectedMonth" class="form-select shorteneds mt-2">
                      <?php
                      $currentMonth = date('n'); // Get the current month without leading zeros
                      $currentYear = date('Y');  // Get the current year

                      for ($month = 1; $month <= 12; $month++) {
                          $selected = ($currentMonth == $month) ? 'selected' : '';
                          echo "<option value=\"$month\" $selected>" . date("F", mktime(0, 0, 0, $month, 1)) . "</option>";
                      }
                      ?>
                  </select>

                  <input name="selectedYear" id="barFilterDate" class="form-control shortened mt-2" type="number" placeholder="Select Year" value="<?php echo $currentYear; ?>">
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

      </div>

      <div class="row mt-3">
        <div class="col-md-6 mt-2">
          <div class="card summary card-sm mt-3">
            <div class="card-body text-center">
              <h3 class="card-title text-center fw-bold" style="font-family: 'Poppins', sans-serif;">Total Donation Amount:</h3>
              <h3 class="card-text"><?= $formattedSum ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-2">
          <div class="card summary card-sm mt-3 mb-2">
            <div class="card-body text-center">
              <h3 class="card-title text-center fw-bold" style="font-family: 'Poppins', sans-serif;"><?= $title ?></h3>
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

      <div class="row mt-3">
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
      </div>

      <div class="col-md-12 mt-3">
        <div class="card">
          <div class="card-body">
            <canvas id="barCert" width="100%" height="400px"></canvas>
          </div>
        </div>
      </div>
</div>
 

<script>
  $(function () {
    const data = {
      labels: <?php echo json_encode(array_values($monthNames)); ?>,
      datasets: [
        {
          label: 'Baptism',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Baptism']); ?>,
        },
        {
          label: 'Blessing',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Blessing']); ?>,
        },
        {
          label: 'Communion',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Communion']); ?>,
        },
        {
          label: 'Confirmation',
          backgroundColor: 'rgba(255, 206, 86, 0.2)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Confirmation']); ?>,
        },
        {
          label: 'Funeral Mass',
          backgroundColor: 'rgba(153, 102, 255, 0.2)',
          borderColor: 'rgba(153, 102, 255, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['FuneralMass']); ?>,
        },
        {
          label: 'Wedding',
          backgroundColor: 'rgba(255, 159, 64, 0.2)',
          borderColor: 'rgba(255, 159, 64, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Wedding']); ?>,
        },
      ]
    };

    const config = {
      type: 'line',
      data: data,
      options: {
        responsive: true,
        scales: {
          x: {
            beginAtZero: true
          },
          y: {
            beginAtZero: true
          }
        }
      }
    };

    const lineChart = new Chart(
      document.getElementById('reservedChart'),
      config
    );
  });
</script>

<script>
    $(function () {
        const labels = <?php echo json_encode($donatedDate); ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Donation Amount',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                data: <?php echo json_encode($totalAmount); ?>,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const lineChart = new Chart(
            document.getElementById('lineChart'),
            config
        );
    });
</script>



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
      // Bar Chart Data
      var barChartData = {
        datasets: [
          {
            label: 'Certificates',
            data: <?php echo json_encode($requestCounts); ?>,
            backgroundColor: ['#16A085', '#3498DB', '#8E44AD', '#C0392B', '#DC7633'],
          },
        ],
        labels: ['Baptismal Certificate', 'Communion Certificate', 'Confirmation Certificate', 'Death Certificate', 'Marriage Certificate'],
      };

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true,
          }
        },
        legend: {
          display: false,
        },
      };

      var ctx_2 = document.getElementById('barCert').getContext('2d');
      new Chart(ctx_2, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions,
      });
    });
</script>


<script type="text/javascript">
  function printReport() {
    window.print();
  }
</script>
