<div class="container-fluid" style="margin-top: 20px;">
  <div class="card">
      <div class="card-body">
          <div class="card-header">
            <h5><i class="fa-solid fa-bell"></i> Announcements</h5>
          </div>
            <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM announcement");
            if (mysqli_num_rows($result) > 0) {
            ?>
            <div class="row">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3" style="margin-top: 10px;">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"><b><?php echo $row["title"] ?></b></div>
                            <div class="card-text"><i class="fa-regular fa-clock"></i> <?php echo date("h:i A", strtotime($row["start"])); ?> - <?php echo date("h:i A", strtotime($row["endtime"])); ?></div>
                            <div class="card-text"><i class="fa-solid fa-location-dot"></i> <?php echo $row["location"] ?></div>
                            <div class="card-text"><i class="fa-solid fa-calendar-days"></i> <?php echo $row["eventdate"] ?></div>
                            <div class="card-text"><small class="text-muted"><?php echo $row["description"] ?></small></div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
            } else {
                echo "No result found";
            }
            ?>
      </div>
  </div>
</div>
