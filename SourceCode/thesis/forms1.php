<div class="container py-5">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForms1" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;"><i class="fa-solid fa-plus"></i> Create New</button>
    <table class="table text-center table-bordered text-dark">
        <?php
        include_once 'php/config.php';
        $result = mysqli_query($conn,"SELECT * FROM forms");
        if (mysqli_num_rows($result) > 0) {
        ?>
        <thead>
            <tr>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Type</th>
                <th scope="col">Receipt</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="text-center">
                <td><?php echo $row["fname"]; ?></td>
                <td><?php echo $row["lname"]; ?></td>
                <td><?php echo $row["formType"]; ?></td>
                <td><img src="rcpts/<?php echo $row['receiptIMG']; ?>" style="max-width: 100px;"></td>
                <td><?php echo $row["status"]; ?></td>
                <td>
                    <a href="php/forms/edit1.php?formsID=<?php echo $row["formsID"]; ?>">
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </a>
                </td>
                <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row['formsID']; ?>">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
                <td>
                    <a href="php/forms/delete1.php?formsID=<?php echo $row["formsID"]; ?>">
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </a>
                </td>
            </tr>

<div class="modal fade" id="viewModal<?php echo $row['formsID']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 text-start">
                        <p><strong>Receipt:</strong></p>
                        <img id="receiptImage" src="rcpts/<?php echo $row['receiptIMG']; ?>" style="max-width: 250px;" alt="receipt" class="mx-auto mb-3" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-6 text-end">
                        <p><strong>Firstname:</strong> <?php echo $row["fname"]; ?></p>
                        <p><strong>Lastname:</strong> <?php echo $row["lname"]; ?></p>
                        <p><strong>Address:</strong> <?php echo $row["address"]; ?></p>
                        <p><strong>Contacts:</strong> <?php echo $row["mobilePhone"]; ?></p>
                        <p><strong>Email:</strong> <?php echo $row["email"]; ?></p>
                        <p><strong>Type:</strong> <?php echo $row["formType"]; ?></p>
                        <p><strong>Reference:</strong> <?php echo $row["refNum"]; ?></p>
                        <p><strong>Amount:</strong> <?php echo $row["amount"]; ?></p>
                        <p><strong>Status:</strong> <?php echo $row["status"]; ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        // Update receipt image source when the modal is shown
        $('#viewModal<?php echo $row['formsID']; ?>').on('shown.bs.modal', function() {
            var receiptSrc = 'rcpts/<?php echo $row["receiptIMG"]; ?>';
            $('#receiptImage').attr('src', receiptSrc);
        });
    });
</script>


            <?php
                $i++;
            }
            ?>
        </tbody>
        <?php
        }
        else {
            echo "No result found";
        }
        ?>
    </table>
</div>
