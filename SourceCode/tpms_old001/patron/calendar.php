<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style type="text/css">
    <?php include "css/counter.css";  ?>
  </style>
</head>
<body>
  <div class="container" style="margin-top: 20px;">
    <div class="card">
      <div class="card-header">
        <h5><i class="fa-solid fa-calendar" style="color: #EC7063;"></i> Event Lists</h5>
      </div>
      <div class="card-body">
        <?php
          include_once 'php/dbconn.php';
          $result = mysqli_query($conn, "SELECT * FROM eventlist");
          if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <tbody>
              <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <td class="text-right">
                  <h1 class="display-4"><span class="badge badge-secondary"><?php echo $row["daynumber"]; ?></span></h1>
                  <h2><?php echo $row["month"]; ?></h2>
                </td>
                <td>
                  <h3 class="text-uppercase"><strong><?php echo $row["title"]; ?></strong></h3>
                  <ul class="list-inline">
                    <li class="list-inline-item"><i class="fa-regular fa-calendar" aria-hidden="true"></i> <?php echo $row["eventday"]; ?></li>
                    <li class="list-inline-item"><i class="fa-regular fa-clock" aria-hidden="true"></i> <?php echo date("h:i A", strtotime($row["start"])); ?> - <?php echo date("h:i A", strtotime($row["endtime"])); ?></li>
                    <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $row["location"]; ?></li>
                  </ul>
                  <p><?php echo $row["description"]; ?></p>
                </td>
              </tr>
              <?php
                $i++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <?php
          } else {
             echo "No result found";
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
