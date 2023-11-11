<?php
// Connect to the database
$db = new mysqli('localhost', 'username', '', 'tpms');

// Execute SQL query to count records from different tables
$baptismalCount = mysqli_query($db, 'SELECT COUNT(*) FROM baptismal_tbl');
$blessingCount = mysqli_query($db, 'SELECT COUNT(*) FROM blessing_tbl');
$communionCount = mysqli_query($db, 'SELECT COUNT(*) FROM communion_tbl');
$confirmationCount = mysqli_query($db, 'SELECT COUNT(*) FROM confirmation_tbl');
$funeralCount = mysqli_query($db, 'SELECT COUNT(*) FROM funeralmass_tbl');
$weddingCount = mysqli_query($db, 'SELECT COUNT(*) FROM wedding_tbl');

// Fetch and format data into an array
$data = array(
    array('label' => 'Baptismal', 'count' => mysqli_fetch_array($baptismalCount)[0]),
    array('label' => 'Blessing', 'count' => mysqli_fetch_array($blessingCount)[0]),
    array('label' => 'Communion', 'count' => mysqli_fetch_array($communionCount)[0]),
    array('label' => 'Confirmation', 'count' => mysqli_fetch_array($confirmationCount)[0]),
    array('label' => 'Funeral', 'count' => mysqli_fetch_array($funeralCount)[0]),
    array('label' => 'Wedding', 'count' => mysqli_fetch_array($weddingCount)[0]),
);

// Encode data into JSON format
echo json_encode($data);
?>

const labels = ['Jan','Feb','March','April','May',];