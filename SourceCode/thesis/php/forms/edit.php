<?php
include_once 'dbconn.php';
$message = ""; // Initialize the message variable

if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE forms SET fname='" . $_POST['fname'] . "', lname ='" . $_POST['lname'] . "', address ='" . $_POST['address'] . "', mobilePhone ='" . $_POST['mobilePhone'] . "', email ='" . $_POST['email'] . "', formType ='" . $_POST['formType'] . "', status ='" . $_POST['status'] . "', amount ='" . $_POST['amount'] . "'  WHERE formsID='" . $_POST['formsID'] . "'");

    $message = "Updated successfully";
}

$result = mysqli_query($conn, "SELECT * FROM forms WHERE formsID='" . $_GET['formsID'] . "'");
$row = mysqli_fetch_array($result);
?>
<?php include "header.php"; ?>

<body>
    <div class="modal d-flex justify-content-center" style="margin-top: 50px;">
        <div class="container">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-bottom: 15px;">
                    <section>
                        <div class="container">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="card container h-100" style="background: #f1f1f1;">
                                    <a href="../../dashboard.php">
                                        <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal"
                                            style="margin-top: 10px; margin-left: 1200px; float: left; cursor: pointer; "></button>
                                    </a>
                                    <div class="card-body">
                                      <a href="../../dashboard.php">
                                        <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal"
                                            style="margin-top: 10px; margin-left: 1200px; float: left; cursor: pointer; "></button>
                                    </a>
                                        <h4>Request Forms</h4>
                                        <hr>
                                        <form class="" action="" method="post" enctype="multipart/form-data">
                                            <div class="row my-3">
                                                <?php if (!empty($message)) : ?>
                                                    <script>
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Data Updated Successfully',
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        });
                                                    </script>
                                                <?php endif; ?>
                                                <div class="col-md-6">
                                                    <div class="form-outline">
                                                        <p>
                                                            <input type="hidden" name="formsID" class="form-control"
                                                                value="<?php echo $row['formsID']; ?>">
                                                        </p>
                                                        <label class="form-label" for="typeText">
                                                            <i class="fa-solid fa-user"></i>
                                                            First name
                                                        </label>
                                                        <input class="form-control" type="text" id="fname"
                                                            name="fname" value="<?php echo $row['fname']; ?>";
                                                            autocomplete="off" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText">
                                                            <i class="fa-solid fa-user"></i>
                                                            Lastname
                                                        </label>
                                                        <input class="form-control" type="text" id="lname"
                                                            name="lname" value="<?php echo $row['lname']; ?>"
                                                            autocomplete="off" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i
                                                                class="fa-solid fa-home"></i> Address</label>
                                                        <input class="form-control" type="text" id="address"
                                                            name="address" value="<?php echo $row['address']; ?>"
                                                            autocomplete="off" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i
                                                                class="fa-solid fa-phone"></i> Contact Number</label>
                                                        <input class="form-control" type="text" id="mobilePhone"
                                                            name="mobilePhone"
                                                            value="<?php echo $row['mobilePhone']; ?>"
                                                            autocomplete="off" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-6">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i
                                                                class="fa-solid fa-envelope"></i> E-mail</label>
                                                        <input class="form-control" type="tel" id="email"
                                                            name="email" value="<?php echo $row['email']; ?>"
                                                            autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i
                                                                class="fa-solid fa-calendar"></i> Event</label>
                                                        <select class="form-control" id="formType" name="formType"
                                                            required>
                                                            <option value=""></option>
                                                            <option value="Baptismal">Baptismal</option>
                                                            <option value="Communion">Communion</option>
                                                            <option value="Confirmation">Confirmation</option>
                                                            <option value="Funeral">Funeral</option>
                                                            <option value="Wedding">Wedding</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-outline">
                                                    <label class="form-label" for="typeText"><i
                                                            class="fa-solid fa-money-bill-1-wave"></i> Reference
                                                        Number</label>
                                                    <input class="form-control" type="text" id="refNum" name="refNum"
                                                        value="<?php echo $row['refNum']; ?>" autocomplete="off"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-6">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i
                                                                class="fa-solid fa-money-bill-1-wave"></i>Amount
                                                            Price</label>
                                                        <input class="form-control" type="text" id="amount"
                                                            name="amount" value="<?php echo $row['amount']; ?>"
                                                            autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="typeText"><i
                                                                class="fa-solid fa-heart"></i> Status</label>
                                                        <select class="form-control" id="status" name="status"
                                                            required>
                                                            <option value=""></option>
                                                            <option value="Disapproved">Disapproved</option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Pending">Pending</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <button class="btn btn-success" name="btn-save" id="btn-save"
                                                    style="float: right;">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>

    <!-- Show the success alert if the message is not empty -->
    <?php if (isset($_POST) && !empty($message)) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Updated Successfully',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    <?php endif; ?>
</body>

</html>
