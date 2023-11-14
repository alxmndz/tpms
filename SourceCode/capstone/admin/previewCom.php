<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Communion Certificate</title>
	<link rel="icon" type="image/x-icon" href="../assets/icons/admin.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
  <style type="text/css">
  	@import url('https://fonts.googleapis.com/css2?family=Bitter&family=Montserrat&family=Poppins&family=Raleway&family=Varela+Round&display=swap');
  	p{
  		font-family: 'Montserrat', sans-serif;
  	}
  	@media print {
	    /* Hide non-essential elements */
	    .noPrint {
	      display: none;
	    }
	    body {
	      margin: 0;
	      padding: 0;
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
	      font-size: 12px; /* Adjust font size for printing */
	    }
	  }
  </style>
</head>
<body>

	<?php
		include_once '../php/dbconn.php';
		$result = mysqli_query($conn,"SELECT * FROM certcomm WHERE id='" . $_GET['id'] . "'");
		$row= mysqli_fetch_array($result);
	?>
	
<div class="container-fluid">
	<button class="btn btn-success btn-sm mb-2 mt-3 noPrint" onclick="printCertificate()"><i class="fas fa-print"></i> Print</button>
	<button class="btn btn-danger btn-sm mb-2 mt-3 noPrint" onclick="back()"><i class="fas fa-right-from-bracket"></i> Return</button>
            <div class="card-body mb-5"style="text-align: center;">
              <div class="certificate" style="border: 2px solid black; padding: 100px;">
                  <div class="certificate-title mt-2">
                      <h4 style="font-family: 'Old English Five', sans-serif;">
                        <img src="../assets/img/nav-logo.png" alt="Logo" class="img-fluid rounded-circle" style="width: 40px;"> Communion Certificate<br>
                        <span><b>Saint Vincent Ferrer Parish</b></span>
                      </h4>
                      <hr>
                      
                  </div>
                  <div class="certificate-content" style="margin-top: 30px;">
                    <p>This is to certify that</p>
                      <h5 style="font-family: Lucida Handwriting, cursive; border-bottom: 3px solid gold; display: inline-block;padding-bottom: 7px;">
                        <?php echo $row['name']; ?>
                      </h5>
                    <div class="mt-3">
                      <p>Child of <?php echo $row['fatherName']; ?></p>
                      <p>and <?php echo $row['motherName']; ?></p>
                      <p>Born in <?php echo $row['birthPlace']; ?></p>
                      <p>on the <?php echo date("M d, Y", strtotime($row["birthDate"])); ?></p>
                      <p>has received</p>
                      <h4><b style="font-family: 'Old English Five', sans-serif;" class="mt-3">The Holy Sacrament of Communion</b></h4>
                      <p>according to the rite of the Roman Catholic Church</p>
                      <div class="mt-5">
                        <p>on the <b><?php echo date("M d, Y", strtotime($row["birthDate"])); ?></b></p>
                        <p>By the <?php echo $row['priest']; ?></p>
                        <p>The sponsors being <?php echo $row['sponsor1']; ?></p>
                        <p>and <?php echo $row['sponsor2']; ?></p>
                      </div>
                      <div class="mt-5">
                        <p>As appears on the Communion Register No. <?php echo $row['id']; ?> of this church.</p>
                      </div>
                    </div>
                  </div>

                   <div class="baptized-by mt-5">
                    <div class="left-side" style="float: left; margin-left: 20px;">
                      <span class="fw-bold">
                        Date Issued: <?php echo date("M d, Y", strtotime($row["generatedDate"])); ?>
                      </span>
                      <br>
                      <span>
                        Purpose: For Record/Reference
                      </span>
                    </div>
                    <div class="right-side" style="float: right; margin-right: 20px;margin-left: 50px;">
                      <span class="fw-bold">
                        Rev. Fr. Leo Edgardo Villostas
                      </span><br>
                      <p>Parish Priest</p>
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