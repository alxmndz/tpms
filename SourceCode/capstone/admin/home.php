<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/calendars.css">
<style type="text/css">
  .card-counter {
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
        }

        .icon-container {
            background: #C0392B;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-container1 {
            background: #2E86C1;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-container2 {
            background: #F1C40F;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-container3 {
            background: #52BE80;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon {
            color: #fff;
            font-size: 24px;
        }

        .counter-value {
            font-size: 24px;
        }
.card{
    align-content: center;
}

.icon-contain{
 background: #52BE80;
 width: 50px;
 height: 50px;
 border-radius: 50%;
 display: flex;
 justify-content: center;
 align-items: center;
 margin-left: 50px;
 color: whitesmoke;
}
</style>
<div class="container">
  <h5><i class="fas fa-house"></i> Home</h5>
  <hr>
        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="card-counter">
                    <div class="icon-container">
                        <i class="icon fas fa-calendar-days"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Total Events</p>
                                                <h4 class="my-1 text-center">
                                                  <?php
                                                    $conn = new mysqli("localhost","root","","tpms");
                                                      if ($conn->connect_error) {
                                                        die("Connection failed : " . $conn->connect_error);
                                                      }
                                                      $sql = "SELECT COUNT(*) FROM eventlist";
                                                      $result = $conn->query($sql);
                                                      while($row = mysqli_fetch_array($result)){
                                                      echo $row['COUNT(*)'];
                                                    }
                                                  ?>
                                              </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card-counter">
                    <div class="icon-container1">
                        <i class="icon fas fa-pen-to-square"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Total Requests</p>
                                                   <h4 class="my-1 text-center">
                                                     <?php
                                                       $conn = new mysqli("localhost","root","","tpms");
                                                        if ($conn->connect_error) {
                                                         die("Connection failed : " . $conn->connect_error);
                                                       }
                                                       $sql = "SELECT COUNT(*) FROM request";
                                                       $result = $conn->query($sql);
                                                       while($row = mysqli_fetch_array($result)){
                                                       echo $row['COUNT(*)'];
                                                       }
                                                     ?>
                                                   </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card-counter">
                    <div class="icon-container2" style="background: #52BE80;">
                        <i class="icon fas fa-scroll"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Certificates</p>
                                                 <h4 class="my-1 text-center">
                                                   <?php
                                                  $conn = new mysqli("localhost", "root", "", "tpms");
                                                  if ($conn->connect_error) {
                                                      die("Connection failed: " . $conn->connect_error);
                                                  }

                                                  $sql = "SELECT SUM(amount) AS total FROM request"; // Use an alias for the SUM() result.
                                                  $result = $conn->query($sql);

                                                  if ($result) {
                                                      $row = $result->fetch_assoc();
                                                      $sum = $row['total'];

                                                      // Format the sum with a comma for thousands separator and a peso sign.
                                                      $formatted_sum = '₱' . number_format($sum, 2, '.', ',');

                                                      echo $formatted_sum;
                                                  } else {
                                                      echo "Error: " . $conn->error;
                                                  }
                                                  ?>
                                                 </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card-counter">
                    <div class="icon-container2">
                        <i class="icon fas fa-peso-sign"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Total Donations</p>
                                                 <h4 class="my-1 text-center">
                                                  <?php
                                                      $conn = new mysqli("localhost", "root", "", "tpms");
                                                      if ($conn->connect_error) {
                                                          die("Connection failed: " . $conn->connect_error);
                                                      }

                                                      $sql = "SELECT SUM(amount) AS total FROM donation";
                                                      $result = $conn->query($sql);

                                                      if ($result) {
                                                          $row = $result->fetch_assoc();
                                                          $sum = $row['total'];

                                                          // Format the sum with a comma for thousands separator and a peso sign.
                                                          $formatted_sum = '₱' . number_format($sum, 2, '.', ',');

                                                          echo $formatted_sum;
                                                      } else {
                                                          echo "Error: " . $conn->error;
                                                      }

                                                      $conn->close();
                                                      ?>
                                                </h4>
                    </div>
                </div>
            </div>

        </div>
    </div>

<div class="container">
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


<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h5>Total Event Reservations</h5>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-2">
                <!-- Six Bootstrap cards -->
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #17A589;">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Card 1</h5>
                            <p class="card-text">Baptismal</p>
                        </div>
                    </div>
                </div>
                

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #2E86C1;">
                            <i class="fas fa-cross"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Card 2</h5>
                            <p class="card-text">Blessing</p>
                        </div>
                    </div>
                </div>
                

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #A569BD;">
                            <i class="fas fa-book-bible"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Card 1</h5>
                            <p class="card-text">Communion</p>
                        </div>
                    </div>
                </div>
                

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #EC7063;">
                            <i class="fas fa-person-praying"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Card 2</h5>
                            <p class="card-text">Confirmation</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #28B463;">
                            <i class="fas fa-hands-praying"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Card 1</h5>
                            <p class="card-text">Funeral</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #F1C40F;">
                            <i class="fas fa-ring"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Card 2</h5>
                            <p class="card-text">Wedding</p>
                        </div>
                    </div>
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