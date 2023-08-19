<?php
include_once("dbconn.php");
if($_REQUEST['id']) {
$sql = "DELETE FROM announcement WHERE id='".$_REQUEST['id']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if($resultset) {
echo "<script type='text/javascript'>
        alert('Deleted Successfully!');
        window.location = '../../admin.php';
      </script>";
		}
}
?>