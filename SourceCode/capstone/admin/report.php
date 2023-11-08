<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>
</head>
<body>

<?php 
  $con = new mysqli('localhost', 'root', '', 'test');

  $query1 = "SELECT COUNT(*) AS count FROM baptismal_tbl";
	$query2 = "SELECT COUNT(*) AS count FROM blessing_tbl";
	$query3 = "SELECT COUNT(*) AS count FROM communion_tbl";
	$query4 = "SELECT COUNT(*) AS count FROM confirmation_tbl";
	$query5 = "SELECT COUNT(*) AS count FROM funeralmass_tbl";
	$query6 = "SELECT COUNT(*) AS count FROM wedding_tbl";

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


<div style="width: 500px;">
  <canvas id="chart"></canvas>
</div>
 
<script>
  const labels = ['Baptismal', 'Blessing', 'Communion', 'Confirmation' ,'Funeral', 'Wedding'];
  const datasets = [{
    label: 'Data Counts',
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
    document.getElementById('chart'),
    config
  );
</script>


</body>
</html>