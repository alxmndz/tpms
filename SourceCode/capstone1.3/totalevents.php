<?php
include "php/dbconn.php";

$currentDate = date("Y-m-d");
// Extracting the month
$month = date("m", strtotime($currentDate));
// Extracting the year
$year = date("Y", strtotime($currentDate));
echo "month" . $month;
echo getcount($conn,$year,$month);

echo $currentDate;
function getcount($conn,$month,$year){
	$query = mysqli_query($conn, "SELECT * FROM certBap WHERE YEAR(generatedDate) = '2023' AND MONTH(generatedDate) = '11'");
if ($query) {
    $count = mysqli_num_rows($query);
    
    echo "COUNT: " . $count;
} else {
    echo "Error: " . mysqli_error($conn);
}



}



 ?>