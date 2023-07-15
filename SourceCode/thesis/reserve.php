<div class="container py-5">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRes" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;"><i class="fa-solid fa-plus"></i> Add Reservation</button>
  <table class="table table-bordered text-center" style="color: black;">
    <?php
    include_once 'php/config.php';
    $result = mysqli_query($conn,"SELECT * FROM eventres");
    if (mysqli_num_rows($result) > 0) {
    ?>
    <thead>
      <tr>
        <td scope="col">Name</td>
        <td scope="col">Event</td>
        <td scope="col">Date</td>
        <td scope="col">Time</td>
        <td scope="col">Contact</td>
        <td scope="col">Address</td>
        <td scope="col">Email</td>
        <td scope="col" colspan="3">Action</td>
      </tr>
    </thead>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($result)) {
    ?>
    <tr class="text-center">
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["eventName"]; ?></td>
      <td><?php echo $row["eventDate"]; ?></td>
      <td><?php echo $row["eventTime"] ?></td>
      <td><?php echo $row["contactNum"]; ?></td>
      <td><?php echo $row["address"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td>
        <a href="php/reserve/edit.php?eventResID=<?php echo $row["eventResID"]; ?>">
          <button class="btn btn-primary">
            <i class="fa-solid fa-pen-to-square"></i>
          </button>
        </a>
      </td>
      <td>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row["eventResID"]; ?>">
          <i class="fa-solid fa-eye"></i>
        </button>
      </td>
      <td>
        <a href="php/reserve/delete.php?eventResID=<?php echo $row["eventResID"]; ?>">
          <button class="btn btn-danger">
            <i class="fa-solid fa-trash"></i>
          </button>
        </a>
      </td>
    </tr>

    <div class="modal fade" id="viewModal<?php echo $row["eventResID"]; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel<?php echo $row["eventResID"]; ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel<?php echo $row["eventResID"]; ?>">Reservation Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 text-start">
            <p><strong>Receipt:</strong></p>
            <img id="credentialfile" src="credentials/<?php echo $row['credentialfile']; ?>" style="max-width: 250px;" alt="receipt" class="mx-auto mb-3" style="max-width: 100%; height: auto;">
          </div>
          <div class="col-md-6 text-end">
            <p><strong>Name:</strong> <?php echo $row["name"]; ?></p>
            <p><strong>Event:</strong> <?php echo $row["eventName"]; ?></p>
            <p><strong>Date:</strong> <?php echo $row["eventDate"]; ?></p>
            <p><strong>Time:</strong> <?php echo $row["eventTime"]; ?></p>
            <p><strong>Contact:</strong> <?php echo $row["contactNum"]; ?></p>
            <p><strong>Address:</strong> <?php echo $row["address"]; ?></p>
            <p><strong>Email:</strong> <?php echo $row["email"]; ?></p>
          </div>
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
    }
    else
    {
      echo "No result found";
    }
    ?>
  </table>
</div>
