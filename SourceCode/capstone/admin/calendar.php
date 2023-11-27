<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link rel="stylesheet" href="path/to/simple-calendar.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="path/to/simple-calendar.js"></script>
</head>
<body>

<h1 class="title" style="font-family: 'Poppins',sans-serif;">Event Calendar</h1>
<hr>
<div id="container" class="calendar"></div>

<?php
include_once 'php/dbconn.php';

$result = mysqli_query($conn, "SELECT * FROM eventlist;");

if (mysqli_num_rows($result) > 0) {
    $events = array();

    while ($row = mysqli_fetch_array($result)) {
        $eventDate = $row['eventDate'];
        $eventTime = $row['eventTime'];
        $title = $row['title'];

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$eventDate $eventTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$eventDate $eventTime +1 hour")),
            'summary' => $title,
        ];
    }

    echo "<script>
        var \$calendar;
        \$(document).ready(function () {
            let container = \$('#container').simpleCalendar({
                fixedStartDay: 0, // begin weeks by Sunday
                disableEmptyDetails: true,
                events: " . json_encode($events) . ",
            });
            \$calendar = container.data('plugin_simpleCalendar');
        });
        </script>";
} else {
    echo "No result found";
}
?>

</body>
</html>
