<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Death Certificate</title>
	<link rel="icon" type="image/x-icon" href="../../assets/icons/team_icon/admin.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/deathCert.css">
</head>
<body>

	<?php
		include_once '../../php/dbconn.php';
		$result = mysqli_query($conn,"SELECT * FROM certfun WHERE id='" . $_GET['id'] . "'");
		$row= mysqli_fetch_array($result);
	?>
	
<div class="container-fluid">
	<button class="btn btn-success btn-sm mb-2 mt-3 noPrint" onclick="printCertificate()"><i class="fas fa-print"></i> Print</button>
	<button class="btn btn-danger btn-sm mb-2 mt-3 noPrint" onclick="back()"><i class="fas fa-right-from-bracket"></i> Return</button>
            <div class="card-body mb-5">
              <div class="certificate" style="border: 2px solid black; padding: 100px;">
                <div class="certificate-title mt-2 text-center" style="text-align: center; margin-right: 150px;">
                  <div class="text-center">
                        <div class="row justify-content-center align-items-center">
                            <!-- Logo on the left of the Text -->
                            <div class="col-6 text-end">
                                <img src="../../assets/icons/logo.png" alt="Logo" class="img-fluid rounded-circle" style="width: 40px;">
                            </div>

                            <!-- Text -->
                            <div class="col-6 text-start">
                                <h2 class="fw-bold" style="font-family: 'TR Dauphin', sans-serif; font-size: 24px;">Certificate of Death</h2>
                                <h5 class="fw-bold" style="font-family: 'Times New Roman', Times, serif; font-size: 15px;">Saint Vincent Ferrer Parish</h5>
                            </div>

                            <div class="text-center" style="text-align: center; margin-left: 150px;">
                              <span>ARCHDIOCESE OF LIPA</span> <br>
                              <span>4214 Tuy, Batangas</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="margin-top: 25px;">
                  <h5 class="mb-4" style="font-family: 'Old English Five', sans-serif;">This is to certify that</h5>
                  <p class="text-justify">That, <?php echo $row['deceasedName']; ?> </p>
                  <div class="mt-3 text-justify">
                    <p>Son (daughter) of <?php echo $row['fatherName']; ?> and <?php echo $row['motherName']; ?></p>
                    <p>residents of <?php echo $row['residentAdd']; ?></p>
                    <p>died on the day of <?php echo date("F j, Y", strtotime($row["deathDate"])); ?></p>
                    <p>The cause of death was <?php echo $row['causeOfDeath']; ?></p>

                    <p><?php echo $row['sbd']; ?> , received the last Sacrament before Death</p>
                    <p><?php echo $row['sbd2']; ?> , was not able to received the last Sacrament before Death</p>
                    <p>Issued in this Parochial Office this date <?php echo date("F j, Y", strtotime($row["generatedDate"])); ?></p>
                  </div>
                </div>
              
                  <div class="baptized-by mb-4 mt-5">
                    <div class="left-side" style="float: left; margin-left: 20px;">
                      <br>
                      <span>
                        Purpose: For Record/Reference
                      </span>
                    </div>
                    <div class="right-side" style="float: right; margin-right: 20px;margin-left: 50px;">
                      <span class="fw-bold">
                        <?php echo $row['priest']; ?>
                      </span><br>
                      <p>Parish Priest</p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<script type="text/javascript">
	 function printCertificate(){
		window.print();
	}
	function back() {
        window.location.href = 'deathGenCert.php';
    }
</script>

</body>
</html>