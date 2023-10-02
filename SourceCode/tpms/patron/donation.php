<div class="container px-4" style="margin-top: 20px;">
	<div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    Donation
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex mb-2">
                            <input type="text" id="searchInput2" class="form-control form-control-sm me-2" placeholder="Type to search..." autocomplete="off">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#donate"><i class="fa-solid fa-hand-holding-dollar"></i></button>
                        </div>
                        <table class="table table-striped">
                    <?php
                    include_once 'php/dbconn.php';
                    $result = mysqli_query($conn, "SELECT 
                                                d.id,
                                                d.name,
                                                d.contact,
                                                d.donatedDate,
                                                d.amount,
                                                d.receipt
                                                FROM donation d
                                                LEFT JOIN users u ON u.id = d.addedBy
                                                WHERE d.addedBy = '$id' LIMIT 5");
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Amount</th>
                            <th>Transaction Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["contact"]; ?></td>
                            <td>₱<?php echo number_format($row["amount"]); ?></td>
                            <td><?php echo date("M d, Y", strtotime($row["donatedDate"])); ?></td>
                            <td><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal1<?php echo $row['id']; ?>"><i class="fa-solid fa-eye"></i> View details</button></td>
                        </tr>

                        <div class="modal fade" id="updateModal1<?php echo $row['id']; ?>">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Add Donation</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                <!-- Left Side (Image) -->
                                <div class="row">
                                  <!-- Left Side (Image) -->
                                  <div class="col-md-6">
                                      <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                                          <div class="carousel-inner">
                                              <div class="carousel-item active">
                                                  <img src="receipt/<?php echo $row['receipt']; ?>" alt="Image 1" class="d-block w-100">
                                              </div>
                                          </div>
                                      </div>
                                  </div>



                                  <!-- Right Side (Form) -->
                                  <div class="col-md-6">
                                        <form>
                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i class="fa-solid fa-user"></i> Name</label>
                                                        <input class="form-control" type="text" id="name" name="name" value="<?php echo $_SESSION['name'] ?>" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                              <div class="col-md-12">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact Number</label>
                                                        <input class="form-control" type="text" id="contact" name="contact" value="<?php echo $_SESSION['contact'] ?>" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Donation Amount</label>
                                                        <input class="form-control" type="number" id="amount" name="amount" value="<?php echo $row['amount'] ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                              <div class="col-md-12">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Donated Date</label>
                                                        <input class="form-control" type="date" id="donatedDate" name="donatedDate" value="<?php echo $row['donatedDate'] ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>                                
                                 </form>
                               </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <?php
                        $i++;
                        }
                        ?>
                    </tbody>
                    <?php
                    } else {
                        echo "No result found";
                    }
                    ?>
                </table>
                    </div>
                </div>
            </div>                  
</div>

