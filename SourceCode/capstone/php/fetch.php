<?php
// Connect to the database
$db = new mysqli("localhost", "root", "", "tpms");

// Prepare the SQL statement
$stmt = $db->prepare('SELECT * FROM eventlist ORDER BY eventDate ASC');

// Execute the prepared statement
$stmt->execute();

// Get the event data from the prepared statement
$events = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Close the database connection
$db->close();

// Output events in JSON format
header('Content-Type: application/json');
echo json_encode($events);
?>
