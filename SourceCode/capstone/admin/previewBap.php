<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Baptismal Certificate</title>
	<link rel="icon" type="image/x-icon" href="../assets/icons/admin.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
<style>
        @import url('https://fonts.cdnfonts.com/css/tr-dauphin');
    </style>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Bitter&family=Montserrat&family=Poppins&family=Raleway&family=Varela+Round&display=swap');

        h5 {
            font-family: 'TR Dauphin', sans-serif;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 12px; /* Adjust font size for printing */
            }

            .container-fluid {
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .card-body {
                page-break-before: always;
                margin: 0;
                padding: 0;
            }

            .certificate {
                border: 2px solid black;
                padding: 20px;
                text-align: center;
                margin-top: 30px;
            }

            .certificate-title {
                margin-bottom: 20px;
            }

            .certificate-content {
                margin-top: 30px;
            }

            .baptized-by {
                margin-top: 5px;
            }

            .left-side,
            .right-side {
                margin: 0;
                padding: 0;
            }

            .noPrint {
                display: none;
            }

            /* Remove URL and page number */
            @page {
                margin: 0;
            }

            body::after {
                content: none !important;
            }

            body::before {
                content: none !important;
            }

            /* Additional elements to hide when printing */
            .btn,
            .navbar,
            .footer {
                display: none;
            }

            /* Adjustments for better printing */
            .certificate-title h2,
            .certificate-title h5 {
                margin: 0;
            }

            .certificate-content h5,
            .certificate-content h4 {
                margin: 0;
            }

            .baptized-by h5 {
                margin: 0;
            }

            @page {
            margin: 0;
            }

            body::after {
                content: none !important;
            }

            body::before {
                content: none !important;
            }
        }
    </style>

</head>
<body>

	<?php
		include_once '../php/dbconn.php';
		$result = mysqli_query($conn,"SELECT * FROM certbap WHERE id='" . $_GET['id'] . "'");
		$row= mysqli_fetch_array($result);
	?>
	
<div class="container-fluid">
	<button class="btn btn-success btn-sm mb-2 mt-3 noPrint" onclick="printCertificate()"><i class="fas fa-print"></i> Print</button>
	<button class="btn btn-danger btn-sm mb-2 mt-3 noPrint" onclick="back()"><i class="fas fa-right-from-bracket"></i> Return</button>
            <div class="card-body mb-5"style="text-align: center;">
              <div class="certificate" style="border: 2px solid black; padding: 100px;">
                  <div class="certificate-title" style="text-align: center; margin-right: 155px;">
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <!-- Logo on the left of the Text -->
                        <div style="flex: 1; display: flex; align-items: center; justify-content: flex-end; margin-right: 10px;">
                            <img src="../assets/icons/lipa.png" alt="Logo" class="img-fluid rounded-circle" style="width: 40px;">
                        </div>

                        <!-- Text -->
                        <div style="flex: 1; text-align: left;">
                            <h2 style="font-family: 'TR Dauphin', sans-serif; font-size: 24px;" class="fw-bold">Baptismal Certificate</h2>
                            <h5 style="font-family: 'Times New Roman', Times, serif; font-size: 15px;" class="fw-bold">Saint Vincent Ferrer Parish</h5>
                        </div>
                    </div>
                </div>
                <hr>

                  <div class="certificate-content" style="margin-top: 30px;">
                    <h5 class="fw-bold">This is to certify that</h5>
                      <h4 class="fw-bold" style="font-family: 'TR Dauphin', sans-serif; text-transform: uppercase; font-size: 20px;">
                        <?php echo strtoupper($row['name']); ?>
                      </h4>
                    <div class="mt-3" style="font-family: 'TR Dauphin', sans-serif;">
                      <h5>Child of <?php echo $row['fatherName']; ?></h5>
                      <h5>and <?php echo $row['motherName']; ?></h5>
                      <h5>Born in <?php echo $row['birthPlace']; ?></h5>
                      <h5>on the <?php echo date("F j, Y", strtotime($row["birthDate"])); ?></h5>
                      <h5>has received</h5>
                      <h4><b style="font-family: 'TR Dauphin', sans-serif; font-size: 20px;" class="mt-3">The Holy Sacrament of Baptism</b></h4>
                      <h5>according to the rite of the Roman Catholic Church</h5>
                      <div class="mt-5">
                        <h5>on the <b><?php echo date("F j, Y", strtotime($row["birthDate"])); ?></b></h5>
                        <h5>By the <?php echo $row['priest']; ?></h5>
                        <h5>The sponsors being <?php echo $row['sponsor1']; ?></h5>
                        <h5>and <?php echo $row['sponsor2']; ?></h5>
                      </div>
                      <div class="mt-5">
                        <h5>As appears on the Baptismal Register No. <?php echo $row['id']; ?> of this church.</h5>
                      </div>
                    </div>
                  </div>

                   <div class="baptized-by mt-5">
                    <div class="left-side" style="float: left; margin-left: 20px;">
                      <h5>
                        Date Issued: <?php echo date("M d, Y", strtotime($row["generatedDate"])); ?>
                      </h5>
                      <h5>
                        Purpose: For Record/Reference
                      </h5>
                    </div>
                    <div class="right-side" style="float: right; margin-right: 20px;margin-left: 50px;">
                      <h5 class="fw-bold">
                        Rev. Fr. Leo Edgardo Villostas
                      </h5>
                      <h5 class="fw-bold">Parish Priest</h5>
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
        window.location.href = '../admin.php';
    }
</script>

</body>
</html>