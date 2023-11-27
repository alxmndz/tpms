<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="dist/simple-calendar.css">
  <link rel="stylesheet" href="css/demo.css">
  <title>Event Calendar</title>
  <style>
    .small-card {
      max-width: 400px; /* Set your preferred max-width */
      margin: 0 auto; /* Center the card horizontally */
    }

    .small-calendar {
      max-width: 300px; /* Set your preferred max-width */
      margin: 0 auto; /* Center the calendar horizontally */
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="card text-center small-card">
      <div class="card-header">
        <h1 class="title">Event Calendar</h1>
      </div>
      <div class="card-body">
        <div id="container" class="calendar-container small-calendar"></div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
          integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="dist/jquery.simple-calendar.js"></script>
</body>
</html>
