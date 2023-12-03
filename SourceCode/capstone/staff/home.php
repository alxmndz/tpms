<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/homeAdmin.css">
<div class="container">
  <div style="display: flex; justify-content: space-between;">
       <h5><i class="fas fa-house"></i> Home</h5>
       <h5><?php echo date('F d, Y'); ?></h5>
  </div>
  <hr>
        <div class="row">
            <div class="col-md-3 mt-3 mx-auto text-center">
                <div class="card-counter">
                    <div class="icon-container1">
                        <i class="icon fas fa-pen-to-square"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Requested Certificates</p>
                            <h4 class="my-1 text-center">
                                <?php
                                include "php/dbconn.php";

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Get the current month and year
                                $currentMonth = date("m");
                                $currentYear = date("Y");

                                // Define the status condition
                                $statusCondition = "Ready to Pick Up";

                                // Construct the SQL query with the WHERE clause including the status condition
                                $sql = "SELECT COUNT(*) FROM request WHERE MONTH(transactDate) = $currentMonth AND YEAR(transactDate) = $currentYear AND status = '$statusCondition'";

                                $result = $conn->query($sql);

                                if ($result === false) {
                                    // Handle the query error
                                    echo "Error: " . $conn->error;
                                } else {
                                    // Fetch the result
                                    $row = $result->fetch_assoc();

                                    // Display the count
                                    echo $row['COUNT(*)'];
                                }

                                // Close the database connection
                                $conn->close();
                                ?>
                              </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mx-auto text-center">
                <div class="card-counter">
                    <div class="icon-container2" style="background: #52BE80;">
                        <i class="icon fas fa-scroll"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary"> Released Certificates</p>
                    <h4 class="my-1 text-center">
                  <?php
                    include "php/dbconn.php";

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Get the current month and year
                    $currentMonth = date("m");
                    $currentYear = date("Y");

                    // Define the status condition
                    $statusCondition = "Approved";

                    // Construct the SQL queries with the WHERE clauses including the status condition
                    $sql = "SELECT COUNT(*) AS total FROM certbap WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";
                    $sql1 = "SELECT COUNT(*) AS total FROM certcomm WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";
                    $sql2 = "SELECT COUNT(*) AS total FROM certcon WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";
                    $sql3 = "SELECT COUNT(*) AS total FROM certfun WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";
                    $sql4 = "SELECT COUNT(*) AS total FROM certmarriage WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";

                    // Execute the queries
                    $result = $conn->query($sql);
                    $result1 = $conn->query($sql1);
                    $result2 = $conn->query($sql2);
                    $result3 = $conn->query($sql3);
                    $result4 = $conn->query($sql4);

                    // Check for errors and display the results
                    if ($result && $result1 && $result2 && $result3 && $result4) {
                        $row = $result->fetch_assoc();
                        $sum = $row['total'];

                        $row1 = $result1->fetch_assoc();
                        $sum1 = $row1['total'];

                        $row2 = $result2->fetch_assoc();
                        $sum2 = $row2['total'];

                        $row3 = $result3->fetch_assoc();
                        $sum3 = $row3['total'];

                        $row4 = $result4->fetch_assoc();
                        $sum4 = $row4['total'];

                        // Calculate the total sum
                        $totalSum = $sum + $sum1 + $sum2 + $sum3 + $sum4;

                        // Display the total sum
                        echo $totalSum;
                    } else {
                        echo "Error: " . $conn->error;
                    }

                    // Close the database connection
                    $conn->close();
                    ?>

                       </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mx-auto text-center">
                <div class="card-counter">
                    <div class="icon-container2">
                        <i class="icon fas fa-peso-sign"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Total Donations</p>
                          <h4 class="my-1 text-center">
                          <?php
                            include"php/dbconn.php";

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Get the current month and year
                            $currentMonth = date("m");
                            $currentYear = date("Y");

                            // Construct the SQL query with the WHERE clause
                            $sql = "SELECT SUM(amount) AS total FROM donation WHERE MONTH(donatedDate) = $currentMonth AND YEAR(donatedDate) = $currentYear";

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

                            // Close the database connection
                            $conn->close();
                          ?>
                       </h4>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="text-center fw-bold mt-2" style="font-family: 'Poppins', sans-serif;">Total Event Reservations this <?php echo date('F'); ?></h5>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-2">
                <!-- Six Bootstrap cards -->
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #16A085;">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?php
                                include "php/dbconn.php";

                                // For Baptismal
                                $sql = "SELECT COUNT(*) AS count FROM baptismal_tbl WHERE status = 'Reserved' AND MONTH(bapDate) = $currentMonth AND YEAR(bapDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
                            </h5>
                            <p class="card-text">Baptismal</p>
                        </div>
                    </div>
                </div>
                

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #16A085;">
                            <i class="fas fa-cross"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?php
                                include "php/dbconn.php";

                                // For Blessing
                                $sql = "SELECT COUNT(*) AS count FROM blessing_tbl WHERE status = 'Reserved' AND MONTH(blessDate) = $currentMonth AND YEAR(blessDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }

                                // Close the database connection
                                $conn->close();
                                ?>
                            </h5>
                            <p class="card-text">Blessing</p>
                        </div>
                    </div>
                </div>
                

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #16A085;">
                            <i class="fas fa-book-bible"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?php
                                include "php/dbconn.php";

                                // For Communion
                                $sql = "SELECT COUNT(*) AS count FROM communion_tbl WHERE status = 'Reserved' AND MONTH(comDate) = $currentMonth AND YEAR(comDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
                            </h5>
                            <p class="card-text">Communion</p>
                        </div>
                    </div>
                </div>
                

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #16A085;">
                            <i class="fas fa-person-praying"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?php
                                include "php/dbconn.php";

                                // For Confirmation
                                $sql = "SELECT COUNT(*) AS count FROM confirmation_tbl WHERE status = 'Reserved' AND MONTH(conDate) = $currentMonth AND YEAR(conDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
                            </h5>
                            <p class="card-text">Confirmation</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #16A085;">
                            <i class="fas fa-hands-praying"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?php
                                include "php/dbconn.php";

                                // For Funeral
                                $sql = "SELECT COUNT(*) AS count FROM funeralmass_tbl WHERE status = 'Reserved' AND MONTH(buryDate) = $currentMonth AND YEAR(buryDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
                            </h5>
                            <p class="card-text">Funeral</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card d-flex flex-row">
                        <div class="icon-contain mt-3" style="background: #16A085;">
                            <i class="fas fa-ring"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?php
                                include "php/dbconn.php";

                                // For Wedding
                                $sql = "SELECT COUNT(*) AS count FROM wedding_tbl WHERE status = 'Reserved' AND MONTH(wdate) = $currentMonth AND YEAR(wdate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
                            </h5>
                            <p class="card-text">Wedding</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

