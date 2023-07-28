<div class="card mb-4">
     <div class="card-header">
          <i class="fa-solid fa-circle-check" style="color: #17A589;"></i>
            Request Status
     </div>
     <div class="card-body">
        <table id="datatablesSimple">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT
                                            u.name,
                                            u.contact,
                                            u.email,
                                            u.address,
                                            r.id,
                                            r.event,
                                            r.amount,
                                            r.status
                                        FROM request r
                                        LEFT JOIN users u ON u.id = r.addedBy
                                        WHERE r.addedBy = '$id'");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact</th>
              <th>Email</th>
              <th>Address</th>
              <th>Event</th>
              <th>Amount</th>
              <th>Status</th>
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
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["address"]; ?></td>
              <td><?php echo $row["event"]; ?></td>
              <td><?php echo $row["amount"]; ?></td>
              <td><?php echo $row["status"]; ?></td>
              <?php
                $i++;
                  }
              ?>
            </tr>
            <?php
              }else{
                echo "No result found";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>