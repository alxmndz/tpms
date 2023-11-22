<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/calendars.css">

<div class="container">
	<h5><i class="fas fa-house"></i> Home</h5>
	<hr>
        <div class="row">
            <div class="col-md-6">
                <div class="calendar calendar-first" id="calendar_first">
                    <div class="calendar_header">
                        <button class="switch-month switch-left"></button>
                        <h2 id="currentMonthYear"></h2>
                        <button class="switch-month switch-right"></button>
                    </div>
                    <div class="calendar_weekdays">
                        <div class="weekday">Sun</div>
                        <div class="weekday">Mon</div>
                        <div class="weekday">Tue</div>
                        <div class="weekday">Wed</div>
                        <div class="weekday">Thu</div>
                        <div class="weekday">Fri</div>
                        <div class="weekday">Sat</div>
                    </div>
                    <div class="calendar_content" id="calendarDates">
                        <!-- You can populate the calendar with events or dates here -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
    <div class="event-container">
        <div class="table-header">
            <h4 class="fw-bold" style="font-family: 'Poppins', sans-serif;">Events List Schedule</h4>
        </div>
        <?php
        include_once 'php/dbconn.php';

        // Get the current month and year
        $currentMonth = date("m");
        $currentYear = date("Y");

        $result = mysqli_query($conn, "SELECT * FROM eventlist WHERE MONTH(eventDate) = $currentMonth AND YEAR(eventDate) = $currentYear ORDER BY id DESC");

        if (mysqli_num_rows($result) > 0) {
            // Open the card-container outside the loop
            echo '<div class="card-container">';

            while ($row = mysqli_fetch_array($result)) {
                // Events Card
                echo '<div class="card mt-2">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title fw-bold">' . $row["title"] . '</h5>';
                echo '<p class="card-text">Date: ' . date("M d, Y", strtotime($row["eventDate"])) . '</p>';
                echo '<p class="card-text">Time: ' . date("h:i A", strtotime($row["eventTime"])) . '</p>';
                echo '<p class="card-text">Description: ' . $row["description"] . '</p>';
                echo '</div>';
                echo '</div>';
            }

            // Close the card-container outside the loop
            echo '</div>';
        } else {
            echo "No result found";
        }
        ?>
    </div>
</div>


        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script>
      $(document).ready(function(){
    
          var table = $('#eventListTbl').DataTable({
              
              buttons:['copy', 'csv', 'excel', 'pdf', 'print']
              
          });
          
          
          table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

      });
    </script>


    <script>
    // Function to update the current month and year in the calendar header
    function updateCalendarHeader(date) {
      const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      const currentMonth = monthNames[date.getMonth()];
      const currentYear = date.getFullYear();
      const header = document.getElementById("currentMonthYear");
      header.textContent = `${currentMonth} ${currentYear}`;
    }

    // Function to generate and display the calendar dates
    function generateCalendarDates(date) {
      const currentDate = date;
      const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
      const calendarDates = document.getElementById("calendarDates");
      calendarDates.innerHTML = ''; // Clear previous dates

      for (let day = 1; day <= daysInMonth; day++) {
        const dateDiv = document.createElement("div");
        dateDiv.classList.add("calendar_date");
        dateDiv.textContent = day;

        // Highlight the current date
        if (day === currentDate.getDate()) {
          dateDiv.classList.add("current-date");
        }

        dateDiv.addEventListener("click", function () {
          // Update the displayed date when a date is clicked
          updateCalendarHeader(new Date(date.getFullYear(), date.getMonth(), day));
        });

        calendarDates.appendChild(dateDiv);
      }
    }

    // Initial setup
    let currentDate = new Date();
    updateCalendarHeader(currentDate);
    generateCalendarDates(currentDate);

    // Update the displayed date every second
    function updateCurrentDate() {
      currentDate = new Date(); // Update the current date
      updateCalendarHeader(currentDate);
    }

    setInterval(updateCurrentDate, 1000);
    </script>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>