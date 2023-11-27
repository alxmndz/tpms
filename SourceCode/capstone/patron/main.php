<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="path/to/simple-calendar.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="path/to/simple-calendar.js"></script>

<div class="container">
      <div class="mt-2 card">
        <div class="card-header">
            <h3 class="text-center fw-bold" style="font-family: 'Poppins',sans-serif;">Event Calendar</h3>
        </div>
        <div class="card-body">
            <div id="container" class="calendar"></div>
        </div>
      </div>
</div>

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