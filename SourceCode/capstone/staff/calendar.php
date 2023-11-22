
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <div class="card">
        <div class="card-body">
            <h3 class="mt-3">Event Schedule and Agenda</h3>

            <div class="container py-9 py-lg-11 position-relative z-index-1">
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm noPrint" data-toggle="collapse" data-target="#barFilter">Filter
                        &#9776;</button>
                    <div id="barFilter" class="collapse">
                        <form method="get" action="">
                            <div class="row">
                                <select name="selectedMonth" id="filterMonth" class="form-select shorteneds mt-2">
                                    <?php
                                    $defaultMonth = date('n'); // Get the current month without leading zeros
                                    $defaultYear = date('Y');  // Get the current year

                                    for ($month = 1; $month <= 12; $month++) {
                                        $selected = (isset($_GET['selectedMonth']) && $_GET['selectedMonth'] == $month) ? 'selected' : '';
                                        echo "<option value=\"$month\" $selected>" . date("F", mktime(0, 0, 0, $month, 1)) . "</option>";
                                    }
                                    ?>
                                </select>

                                <input name="selectedYear" id="barFilterDate" class="form-control shortened mt-2"
                                    type="number" placeholder="Select Year"
                                    value="<?php echo (isset($_GET['selectedYear'])) ? $_GET['selectedYear'] : $defaultYear; ?>">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-2 mb-2">Apply Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="nav nav-pills flex-column aos-init aos-animate" id="myTab" role="tablist"
                        data-aos="fade-up">
                        <!-- Adjusted the data-bs-target to match the correct tab ID -->
                        <button class="nav-link px-4 text-start mb-3 active" id="baptismal-tab" data-bs-toggle="tab"
                            data-bs-target="#baptismal" type="button" role="tab" aria-controls="baptismal"
                            aria-selected="true">
                            <span class="d-block fs-5 fw-bold">
                                <?php
                                    include "php/dbconn.php";
                                    $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
                                    $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;
                                    $sql = "SELECT COUNT(*) FROM baptismal_tbl WHERE MONTH(bapDate) = $selectedMonth AND YEAR(bapDate) = $selectedYear";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo $row['COUNT(*)'];
                                    }
                                ?>
                            </span>
                            <span class="small">Baptismal</span>
                        </button>
                        <button class="nav-link px-4 text-start mb-3" id="d1-tab" data-bs-toggle="tab" data-bs-target="#day1" type="button" role="tab" aria-controls="day1" aria-selected="true">
                        <span class="d-block fs-5 fw-bold"><?php
                                    include"php/dbconn.php";
                                    $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
                                    $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;
                                    $sql = "SELECT COUNT(*) FROM blessing_tbl WHERE MONTH(blessDate) = $selectedMonth AND YEAR(blessDate) = $selectedYear";
                                    $result = $conn->query($sql);
                                    while($row = mysqli_fetch_array($result)){
                                    echo $row['COUNT(*)'];
                                  }
                                ?></span>
                        <span class="small">Blessing</span>
                    </button>
                    <button class="nav-link px-4 text-start mb-3 active" id="d1-tab" data-bs-toggle="tab" data-bs-target="#day1" type="button" role="tab" aria-controls="day1" aria-selected="true">
                        <span class="d-block fs-5 fw-bold"><?php
                                    include"php/dbconn.php";
                                    $sql = "SELECT COUNT(*) FROM communion_tbl WHERE MONTH(comDate) = $selectedMonth AND YEAR(comDate) = $selectedYear";
                                    $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
                                    $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;
                                    $result = $conn->query($sql);
                                    while($row = mysqli_fetch_array($result)){
                                    echo $row['COUNT(*)'];
                                  }
                                ?></span>
                        <span class="small">Communion</span>
                    </button>
                    <button class="nav-link px-4 text-start mb-3" id="d1-tab" data-bs-toggle="tab" data-bs-target="#day1" type="button" role="tab" aria-controls="day1" aria-selected="true">
                        <span class="d-block fs-5 fw-bold"><?php
                                    include"php/dbconn.php";
                                    $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
                                    $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;
                                    $sql = "SELECT COUNT(*) FROM confirmation_tbl WHERE MONTH(conDate) = $selectedMonth AND YEAR(conDate) = $selectedYear";
                                    $result = $conn->query($sql);
                                    while($row = mysqli_fetch_array($result)){
                                    echo $row['COUNT(*)'];
                                  }
                                ?></span>
                        <span class="small">Confirmation</span>
                    </button>
                    <button class="nav-link px-4 text-start mb-3 active" id="d1-tab" data-bs-toggle="tab" data-bs-target="#day1" type="button" role="tab" aria-controls="day1" aria-selected="true">
                        <span class="d-block fs-5 fw-bold"><?php
                                    include"php/dbconn.php";
                                    $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
                                    $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;
                                    $sql = "SELECT COUNT(*) FROM funeralmass_tbl WHERE MONTH(buryDate) = $selectedMonth AND YEAR(buryDate) = $selectedYear";
                                    $result = $conn->query($sql);
                                    while($row = mysqli_fetch_array($result)){
                                    echo $row['COUNT(*)'];
                                  }
                                ?></span>
                        <span class="small">Funeral Mass</span>
                    </button>
                    <button class="nav-link px-4 text-start mb-3" id="d1-tab" data-bs-toggle="tab" data-bs-target="#day1" type="button" role="tab" aria-controls="day1" aria-selected="true">
                        <span class="d-block fs-5 fw-bold"><?php
                                    include"php/dbconn.php";
                                    $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
                                    $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;
                                    $sql = "SELECT COUNT(*) FROM wedding_tbl WHERE MONTH(wdate) = $selectedMonth AND YEAR(wdate) = $selectedYear";
                                    $result = $conn->query($sql);
                                    while($row = mysqli_fetch_array($result)){
                                    echo $row['COUNT(*)'];
                                  }
                                ?></span>
                        <span class="small">Wedding</span>
                    </button>
                    </div>
                </div>

                <div class="col-lg-7 col-xl-6">
                    <div data-aos="fade-up" class="tab-content aos-init aos-animate" id="myTabContent">
                        <!-- Adjusted the id attribute to match the correct tab ID -->
                        <div class="tab-pane fade active show" id="baptismal" role="tabpanel"
                            aria-labelledby="baptismal-tab">
                            <ul class="pt-4 list-unstyled mb-0">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            include_once 'php/dbconn.php';
                                            $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
                                            $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;
                                            $result = mysqli_query($conn, "SELECT * FROM eventlist WHERE MONTH(eventDate) = $selectedMonth AND YEAR(eventDate) = $selectedYear ORDER BY id ASC");
                                            if (mysqli_num_rows($result) > 0) {
                                                $i = 0;
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                        <li class="d-flex flex-column flex-md-row py-4"
                                            data-month="<?php echo date("n", strtotime($row["eventDate"])); ?>"
                                            data-year="<?php echo date("Y", strtotime($row["eventDate"])); ?>">
                                            <span
                                                class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                                                <?php echo date("M d, Y", strtotime($row["eventDate"])); ?>
                                            </span>
                                            <div class="flex-grow-1 ps-4 border-start border-3">
                                                <h4><?php echo $row["title"]; ?></h4>
                                                <p class="mb-0">
                                                    <?php echo $row["description"]; ?>
                                                    <div class="text-muted">
                                                        <?php echo date("h:i A", strtotime($row["eventTime"])); ?>
                                                    </div>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                                    $i++;
                                                }
                                                ?>
                                        <?php
                                            } else {
                                                echo "No result found";
                                            }
                                            ?>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <!-- Add similar tab-pane divs for other event types -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // JavaScript function for filtering events based on the selected month and year
        function filterEvents() {
            var selectedMonth = document.getElementById("filterMonth").value;
            var selectedYear = document.getElementById("barFilterDate").value;

            var items = document.querySelectorAll('.tab-pane.active.show li');
            items.forEach(function (item) {
                var eventMonth = parseInt(item.getAttribute('data-month'));
                var eventYear = parseInt(item.getAttribute('data-year'));

                var isVisible = (selectedMonth == 0 || eventMonth == selectedMonth) &&
                    (selectedYear == 0 || eventYear == selectedYear);

                item.style.display = isVisible ? 'flex' : 'none';
            });
        }

        // Trigger filterEvents when the page loads
        document.addEventListener("DOMContentLoaded", function () {
            filterEvents();
        });
    </script>