<div class="container py-5">
    <table class="table text-center table-bordered text-dark">
        <?php
        include_once 'php/config.php';
        $result = mysqli_query($conn,"SELECT * FROM donation");
        if (mysqli_num_rows($result) > 0) {
        ?>
        <thead>
            <tr>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Contact</th>
                <th scope="col">Reference #</th>
                <th scope="col">Date</th>
                <th scope="col" colspan="2">Action</th>
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
                <td><?php echo $row["contact"]; ?></td>
                <td><?php echo $row["refNum"]; ?></td>
                <td><?php echo $row["donateDate"]; ?></td>
                <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row['donateID']; ?>">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
                <td>
                    <a href="php/donation/delete.php?donateID=<?php echo $row["donateID"]; ?>">
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </a>
                </td>
            </tr>

<div class="modal fade" id="viewModal<?php echo $row['donateID']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
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
                        <img id="donateReceipt" src="rcpts/<?php echo $row['donateReceipt']; ?>" style="max-width: 250px;" alt="receipt" class="mx-auto mb-3" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-6 text-end">
                        <p><strong>Firstname:</strong> <?php echo $row["fname"]; ?></p>
                        <p><strong>Lastname:</strong> <?php echo $row["lname"]; ?></p>
                        <p><strong>Contact:</strong> <?php echo $row["contact"]; ?></p>
                        <p><strong>Reference #:</strong> <?php echo $row["refNum"]; ?></p>
                        <p><strong>Amount:</strong> <?php echo $row["donateAmount"]; ?></p>
                        <p><strong>Date:</strong> <?php echo $row["donateDate"]; ?></p>
                        <p><strong>Event:</strong> <?php echo $row["donateEvent"]; ?></p>
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
        $('#viewModal<?php echo $row['donateID']; ?>').on('shown.bs.modal', function() {
            var receiptSrc = 'rcpts/<?php echo $row["donateReceipt"]; ?>';
            $('#donateReceipt').attr('src', receiptSrc);
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
