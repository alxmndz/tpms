<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
  $reportTitle = $_POST['reportTitle'];
  $reportDate = $_POST['reportDate'];
  $reportTime = $_POST['reportTime'];
  $description= $_POST['description'];
  $type= $_POST['type'];
  $sql_query = "INSERT INTO reports(reportTitle,reportDate,reportTime,description,type) VALUES('$reportTitle','$reportDate','$reportTime','$description','$type')";
    mysqli_query($conn,$sql_query);
  

?>
    <script type="text/javascript">
      alert("Added Successfully!");
    </script>
<?php
        
  }
  mysqli_close($conn);
      ?>