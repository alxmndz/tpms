<?php
include "dbconn.php";

function getEvents($year, $month) {
    global $conn;

    $start_date = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-01';
    $end_date = date('Y-m-t', strtotime($start_date));

    $sql = "SELECT event_date, event_title FROM events WHERE event_date BETWEEN '$start_date' AND '$end_date'";
    $result = $conn->query($sql);

    $events = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = array(
                'event_date' => $row['event_date'],
                'event_title' => $row['event_title']
            );
        }
    }

    return $events;
}

$conn->close();
?>
