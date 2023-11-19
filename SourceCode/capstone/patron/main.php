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
                  <h4>Events List Schedule</h4>
                </div>
                <div class="table-container">
                  <table class="event-table" id="eventListTbl">
                    <thead>
                      <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Event 1</td>
                        <td>2023-11-05</td>
                        <td>10:00 AM</td>
                        <td>Event Desc</td>
                      </tr>
                      <tr>
                        <td>Event 2</td>
                        <td>2023-11-10</td>
                        <td>10:00 AM</td>
                        <td>Event Desc</td>
                      </tr>
                      <tr>
                        <td>Event 3</td>
                        <td>2023-11-15</td>
                        <td>10:00 AM</td>
                        <td>Event Desc</td>
                      </tr>
                      <tr>
                        <td>Event 4</td>
                        <td>2023-11-20</td>
                        <td>10:00 AM</td>
                        <td>Event Desc</td>
                      </tr>
                      <tr>
                        <td>Event 5</td>
                        <td>2023-11-20</td>
                        <td>10:00 AM</td>
                        <td>Event Desc</td>
                      </tr>
                      <tr>
                        <td>Event 6</td>
                        <td>2023-11-20</td>
                        <td>10:00 AM</td>
                        <td>Event Desc</td>
                      </tr>
                      <!-- Add more events as needed -->
                    </tbody>
                  </table>
                </div>
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