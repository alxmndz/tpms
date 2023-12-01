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

// Initialize separate arrays for each type of event
$events = [];

// Fetch events from 'eventlist' table
$resultEventList = mysqli_query($conn, "SELECT * FROM eventlist;");

if (mysqli_num_rows($resultEventList) > 0) {
    while ($row = mysqli_fetch_array($resultEventList)) {
        $eventDate = $row['eventDate'];
        $eventTime = $row['eventTime'];
        $title = $row['title'];

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($eventDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$eventDate $eventTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$eventDate $eventTime +1 hour")),
            'summary' => $title,
        ];
    }
}

// Fetch events from 'baptismal_tbl' table with status 'Reserved'
$resultBaptismal = mysqli_query($conn, "SELECT * FROM baptismal_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultBaptismal) > 0) {
    while ($row = mysqli_fetch_assoc($resultBaptismal)) {
        $bapDate = $row['bapDate'];
        $bapTime = $row['bapTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($bapDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Baptismal';
        $summary = ($name) ? "$name - $source" : $source;

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$bapDate $bapTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$bapDate $bapTime +1 hour")),
            'summary' => $summary,
        ];
    }
}

$resultBlessing = mysqli_query($conn, "SELECT * FROM blessing_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultBlessing) > 0) {
    while ($row = mysqli_fetch_assoc($resultBlessing)) {
        $blessDate = $row['blessDate'];
        $blessTime = $row['blessTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($blessDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Blessing';
        $summary = ($name) ? "$name - $source" : $source;

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$blessDate $blessTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$blessDate $blessTime +1 hour")),
            'summary' => $summary,
        ];
    }
}


$resultCom = mysqli_query($conn, "SELECT * FROM communion_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultCom) > 0) {
    while ($row = mysqli_fetch_assoc($resultCom)) {
        $comDate = $row['comDate'];
        $comTime = $row['comTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($comDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Communion';
        $summary = ($name) ? "$name - $source" : $source;

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$comDate $comTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$comDate $comTime +1 hour")),
            'summary' => $summary,
        ];
    }
}

$resultCom = mysqli_query($conn, "SELECT * FROM confirmation_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultCom) > 0) {
    while ($row = mysqli_fetch_assoc($resultCom)) {
        $conDate = $row['conDate'];
        $conTime = $row['conTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($conDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }
        // Determine the source and set the summary accordingly
        $source = 'Confirmation';
        $summary = ($name) ? "$name - $source" : $source;

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$conDate $conTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$conDate $conTime +1 hour")),
            'summary' => $summary,
        ];
    }
}

$resultFuneral = mysqli_query($conn, "SELECT * FROM funeralmass_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultFuneral) > 0) {
    while ($row = mysqli_fetch_assoc($resultFuneral)) {
        $buryDate = $row['buryDate'];
        $resTime = $row['resTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        // Check if the event month and year have already passed
        if (date('Y-m', strtotime($buryDate)) < date('Y-m')) {
            continue; // Skip this event if the month and year have passed
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($buryDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Funeral Mass';
        $summary = ($name) ? "$name - $source" : $source;

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$buryDate $resTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$buryDate $resTime +1 hour")),
            'summary' => $summary,
        ];
    }
}


$resultWedding = mysqli_query($conn, "SELECT * FROM wedding_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultWedding) > 0) {
    while ($row = mysqli_fetch_assoc($resultWedding)) {
        $wdate = $row['wdate'];
        $resTime = $row['resTime'];
        $groom = $row['groom']; // Change 'name' to 'groom'
        $bride = $row['bride']; // Add a new variable for 'bride'
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        // Check if the event month and year have already passed
        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($wdate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Wedding'; // Change source to 'Wedding'
        $summary = ($groom && $bride) ? "$groom & $bride - $source" : $source;

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$wdate $resTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$wdate $resTime +1 hour")),
            'summary' => $summary,
        ];
    }
}

if (!empty($events)) {
    echo "<script>
        \$(document).ready(function () {
            let container = \$('#container').simpleCalendar({
                fixedStartDay: 0,
                disableEmptyDetails: true,
                events: " . json_encode($events) . ",
                displayEventTime: true, // Show event time
                timeFormat: '12h', // Use 12-hour format with AM/PM
            });
            \$calendar = container.data('plugin_simpleCalendar');
        });
        </script>";
} else {
    echo "No events found";
}


?>

</body>
</html>
