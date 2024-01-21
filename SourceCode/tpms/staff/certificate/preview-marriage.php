<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Marriage Certificate</title>
	<link rel="icon" type="image/x-icon" href="../../assets/icons/team_icon/admin.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../css/wedd-cert.css">
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
					<h3 class="mb-3" style="font-family: 'Tangerine', cursive; font-size: 35px;">This is to certify that</h3>
					<div class="information mt-2">
					<div class="text-center certificate-content">
						<div class="information">
							<p><?php echo $row['groom']; ?> and <?php echo $row['bride']; ?></p>
							<div class="details row">
								<div class="col-6">
									Age of 
									<p><?php echo $row['gAge']; ?> and <?php echo $row['bAge']; ?></p>
									Status 
									<p><?php echo $row['maritalStatus']; ?> and <?php echo $row['maritalStatus2']; ?></p>
								</div>
								<div class="col-6">
									Native of 
									<p><?php echo $row['gNat']; ?> and <?php echo $row['bNat']; ?></p>
									Residence of 
									<p><?php echo $row['gResidence']; ?> and <?php echo $row['bResidence']; ?></p>
								</div>
							</div>
							<div class="details row">
								<div class="col-6">
								Groom's Parents
									<p><?php echo $row['gFather']; ?> and <?php echo $row['gMother']; ?></p>
								</div>
								<div class="col-6">
								Bride's Parents
									<p><?php echo $row['bFather']; ?> and <?php echo $row['bMother']; ?></p>
								</div>
							</div>
						</div>
						<div>
							<h5>were united on</h5>
							<h4>Holy Matrimony</h4>
							<h5 class="mb-4">According to the Rites of the Holy Roman Catholic Church</h5>
							<p>on the date of <?php echo date("F j, Y", strtotime($row["marriedDate"])); ?></p>
							<p>The Marriage was solemnized by <?php echo $row['priest']; ?> in the presence of <?php echo $row['sponsor1']; ?> and <?php echo $row['sponsor2']; ?> as appears from the Marriage Records of this Church.</p>
						</div>
					</div>

				<div class="baptized-by">
					<div class="right-side" style="float: right;">
						<span class="fw-bold">
							<?php echo $row['priest']; ?>
						</span><br>
						<p class="fw-bold">Parish Priest</p>
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
