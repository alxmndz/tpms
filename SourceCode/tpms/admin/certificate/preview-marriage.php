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
  <link rel="stylesheet" type="text/css" href="../../css/marriage-cert.css">
</head>
<body>

	<?php
		include_once '../../php/dbconn.php';
		$result = mysqli_query($conn,"SELECT * FROM certmarriage WHERE id='" . $_GET['id'] . "'");
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
                                <h2 style="font-family: 'Old English Five', sans-serif; font-size: 20px;">Certificate of Marriage</h2>
                                <h5 class="fw-bold" style="font-family: 'Times New Roman', Times, serif; font-size: 15px;">Saint Vincent Ferrer Parish</h5>
                            </div>

                            <div class="text-center" style="text-align: center; margin-left: 150px;">
                              <span>ARCHDIOCESE OF LIPA</span> <br>
                              <span>4214 Tuy, Batangas</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center certificate-content" style="margin-top: 5px;">
                  <h5 class="mb-3" style="font-family: 'Tangerine', cursive; font-size: 35px;">This is to certifies that</h5>
                  <p><?php echo $row['groom']; ?> and <?php echo $row['bride']; ?></p>
                  <div class="mt-1">
                      <p>Age <u><?php echo $row['gAge']; ?></u> <u><?php echo $row['bAge']; ?></u></p>
                      <p>Status <u><?php echo $row['maritalStatus']; ?></u> <u><?php echo $row['maritalStatus2']; ?></u></p>
                      <p>Native of <u><?php echo $row['gNat']; ?></u> <u><?php echo $row['bNat']; ?></u></p>
                      <p>Residence of <u><?php echo $row['gResidence']; ?></u> <u><?php echo $row['bResidence']; ?></u></p>
                      <p>Father <u><?php echo $row['gFather']; ?></u> <u><?php echo $row['bFather']; ?></u></p>
                      <p>Mother <u><?php echo $row['gMother']; ?></u> <u><?php echo $row['bMother']; ?></u></p>
                  </div>


                    <div class="mt-1">
                      <h1 style="font-family: 'Tangerine', cursive;">were united on</h1>
                      <h4 style="font-family: 'Playfair Display', serif;">Holy Matrimony</h4>
                      <h5 class="mb-4" style="font-family: 'Old English Five', sans-serif;">According to the Rites of the Holy Roman Catholic Church</h5>
                    </div>

                    <div class="mt-2">
                      <p>on the date of <?php echo date("F j, Y", strtotime($row["marriedDate"])); ?></p>
                      <p>The Marriage was solemnized by <?php echo $row['priest']; ?></p>
                      <p> in the presence of <?php echo $row['sponsor1']; ?> and <?php echo $row['sponsor2']; ?> as appears from the Marriage Records of this Church.
                      </p>
                    </div>
                    
                  </div>
                </div>
              
                   <div class="baptized-by mt-2">
                    <div class="right-side" style="float: right; margin-right: 20px;margin-left: 50px;">
                      <span class="fw-bold">
                        <?php echo $row['priest']; ?>
                      </span><br>
                      <p class="fw-bold">Parish Priest</p>
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
        window.location.href = 'marriageGenCert.php';
    }
</script>

</body>
</html>