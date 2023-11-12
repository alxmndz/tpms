<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <title>Reporting</title>
</head>
<body>


<!-- WalkIn reserve -->
<?php 
  $con = new mysqli('localhost', 'root', '', 'test');

  $query1 = "SELECT COUNT(*) AS count FROM baptismal_tbl WHERE transactType = 'Walk-In'";
	$query2 = "SELECT COUNT(*) AS count FROM blessing_tbl WHERE transactType = 'Walk-In'";
	$query3 = "SELECT COUNT(*) AS count FROM communion_tbl WHERE transactType = 'Walk-In'";
	$query4 = "SELECT COUNT(*) AS count FROM confirmation_tbl WHERE transactType = 'Walk-In'";
	$query5 = "SELECT COUNT(*) AS count FROM funeralmass_tbl WHERE transactType = 'Walk-In'";
	$query6 = "SELECT COUNT(*) AS count FROM wedding_tbl WHERE transactType = 'Walk-In'";

	$query1 = "SELECT COUNT(*) AS count FROM baptismal_tbl WHERE transactType = 'Walk-In'";
	$query2 = "SELECT COUNT(*) AS count FROM blessing_tbl WHERE transactType = 'Walk-In'";
	$query3 = "SELECT COUNT(*) AS count FROM communion_tbl WHERE transactType = 'Walk-In'";
	$query4 = "SELECT COUNT(*) AS count FROM confirmation_tbl WHERE transactType = 'Walk-In'";
	$query5 = "SELECT COUNT(*) AS count FROM funeralmass_tbl WHERE transactType = 'Walk-In'";
	$query6 = "SELECT COUNT(*) AS count FROM wedding_tbl WHERE transactType = 'Walk-In'";

  $result1 = mysqli_query($conn, $query1);
	$result2 = mysqli_query($conn, $query2);
	$result3 = mysqli_query($conn, $query3);
	$result4 = mysqli_query($conn, $query4);
	$result5 = mysqli_query($conn, $query5);
	$result6 = mysqli_query($conn, $query6);

	$data1 = mysqli_fetch_array($result1);
	$data2 = mysqli_fetch_array($result2);
	$data3 = mysqli_fetch_array($result3);
	$data4 = mysqli_fetch_array($result4);
	$data5 = mysqli_fetch_array($result5);
	$data6 = mysqli_fetch_array($result6);

	$counts = [$data1['count'], $data2['count'], $data3['count'], $data4['count'], $data5['count'], $data6['count']];

?>


<!-- online reserve -->
<?php 
  $con = new mysqli('localhost', 'root', '', 'test');

  $query1 = "SELECT COUNT(*) AS countOnline FROM baptismal_tbl WHERE transactType = 'Online'";
	$query2 = "SELECT COUNT(*) AS countOnline FROM blessing_tbl WHERE transactType = 'Online'";
	$query3 = "SELECT COUNT(*) AS countOnline FROM communion_tbl WHERE transactType = 'Online'";
	$query4 = "SELECT COUNT(*) AS countOnline FROM confirmation_tbl WHERE transactType = 'Online'";
	$query5 = "SELECT COUNT(*) AS countOnline FROM funeralmass_tbl WHERE transactType = 'Online'";
	$query6 = "SELECT COUNT(*) AS countOnline FROM wedding_tbl WHERE transactType = 'Online'";

	$query1 = "SELECT COUNT(*) AS countOnline FROM baptismal_tbl WHERE transactType = 'Online'";
	$query2 = "SELECT COUNT(*) AS countOnline FROM blessing_tbl WHERE transactType = 'Online'";
	$query3 = "SELECT COUNT(*) AS countOnline FROM communion_tbl WHERE transactType = 'Online'";
	$query4 = "SELECT COUNT(*) AS countOnline FROM confirmation_tbl WHERE transactType = 'Online'";
	$query5 = "SELECT COUNT(*) AS countOnline FROM funeralmass_tbl WHERE transactType = 'Online'";
	$query6 = "SELECT COUNT(*) AS countOnline FROM wedding_tbl WHERE transactType = 'Online'";

  $result1 = mysqli_query($conn, $query1);
	$result2 = mysqli_query($conn, $query2);
	$result3 = mysqli_query($conn, $query3);
	$result4 = mysqli_query($conn, $query4);
	$result5 = mysqli_query($conn, $query5);
	$result6 = mysqli_query($conn, $query6);

	$data1 = mysqli_fetch_array($result1);
	$data2 = mysqli_fetch_array($result2);
	$data3 = mysqli_fetch_array($result3);
	$data4 = mysqli_fetch_array($result4);
	$data5 = mysqli_fetch_array($result5);
	$data6 = mysqli_fetch_array($result6);

	$onlineCounts = [$data1['countOnline'], $data2['countOnline'], $data3['countOnline'], $data4['countOnline'], $data5['countOnline'], $data6['countOnline']];

?>



<!-- reserve -->
<?php 
  $con = new mysqli('localhost', 'root', '', 'test');

	$query1 = "SELECT COUNT(event) AS countReq1 FROM request WHERE event = 'Baptismal Certificate'";
	$query2 = "SELECT COUNT(event) AS countReq2 FROM request WHERE event = 'Communion Certificate'";
	$query3 = "SELECT COUNT(event) AS countReq3 FROM request WHERE event = 'Confirmation Certificate'";
	$query4 = "SELECT COUNT(event) AS countReq4 FROM request WHERE event = 'Death Certificate'";
	$query5 = "SELECT COUNT(event) AS countReq5 FROM request WHERE event = 'Marriage Certificate'";

  $result1 = mysqli_query($conn, $query1);
	$result2 = mysqli_query($conn, $query2);
	$result3 = mysqli_query($conn, $query3);
	$result4 = mysqli_query($conn, $query4);
	$result5 = mysqli_query($conn, $query5);

	$data1 = mysqli_fetch_array($result1);
	$data2 = mysqli_fetch_array($result2);
	$data3 = mysqli_fetch_array($result3);
	$data4 = mysqli_fetch_array($result4);
	$data5 = mysqli_fetch_array($result5);

	$reqCounts = [$data1['countReq1'], $data2['countReq2'], $data3['countReq3'], $data4['countReq4'], $data5['countReq5']];

?>


<!-- month -->
<?php 
  $con = new mysqli('localhost','root','','tpms');
  $query = $con->query("
    SELECT 
      MONTHNAME(eventDate) as monthEventName,
        COUNT(id) as id
    FROM eventlist
  ");

  foreach($query as $data)
  {
    $eventsListDate[] = $data['monthEventName'];
    $countId[] = $data['id'];
  }

?>

<?php 
  $con = new mysqli('localhost','root','','tpms');
  $query = $con->query("
    SELECT 
      MONTHNAME(donatedDate) as monthname,
        amount as amount
    FROM donation
  ");

  foreach($query as $data)
  {
    $donatedDate[] = $data['monthname'];
    $amount[] = $data['amount'];
  }

?>

<div class="container">
  <div class="row">
    <div class="col-md-6 mt-3">
      <div class="card">
        <div class="card-body">
          <div>
              <button class="btn btn-primary" data-toggle="collapse" data-target="#barFilter">Filter &#9776;</button>
              <div id="barFilter" class="collapse">
                <input id="barFilterDate" class="form-control" type="text" placeholder="Select Date">
             </div>
           </div>
          <canvas id="barGraph"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6 mt-3">
      <div class="card">
        <div class="card-body">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6 mt-3">
      <div class="card">
        <div class="card-body">
          <canvas id="pieChart" width="255px" height="255px"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6 mt-3">
      <div class="card">
        <div class="card-body">
          <canvas id="lineChart" max-width="230px" max-height="230px"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

 
<script>
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

<!-- bar -->
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

</script>


<!-- pie -->
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

<!-- line chart -->
<script>
    $(function (){
    	const labels =  <?php echo json_encode($donatedDate); ?>;
    const data = {
      labels: labels,
      datasets: [{
        label: 'Sample Line Chart',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 2,
        data:  <?php echo json_encode($amount); ?>, // Replace with your data
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

    // Create a new line chart
    const lineChart = new Chart(
      document.getElementById('lineChart'),
      config
    );
    });
</script>


<!-- Filter -->
<script type="text/javascript">
 flatpickr("#barFilterDate", {
            mode: "single",  // Allows selecting a single date
            dateFormat: "Y-m-d",  // Date format (year-month-day)
            onChange: function(selectedDates, dateStr) {
                // Update the bar graph when a date is selected
                updateBarGraph(dateStr);
            }
        });

        flatpickr("#pieFilterDate", {
            mode: "single",  // Allows selecting a single date
            dateFormat: "Y-m-d",  // Date format (year-month-day)
            onChange: function(selectedDates, dateStr) {
                // Update the pie graph when a date is selected
                updatePieGraph(dateStr);
            }
        });

        function updateBarGraph(dateStr) {
            // Example: Convert the selected date to year and month
            const parts = dateStr.split("-");
            const year = parts[0];
            const month = parts[1];
            const day = parts[2];

            // Use the year, month, and day to fetch data (you may need to adjust this)
            const dataKey = `${year}-${month}-${day}`;
            
            if (evacueeData[dataKey]) {
                // Update Bar Graph
                barGraph.data.datasets = [{
                    label: `Evacuees in ${year} - ${month} - ${day}`,
                    data: <?php echo json_encode($onlineCounts); ?>,
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1,
                }];
                barGraph.update();
            }
        }

</script>

</body>
</html>