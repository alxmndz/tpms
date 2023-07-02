<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&family=Open+Sans&family=Oswald:wght@500;600&family=Raleway:wght@400;500&family=Roboto&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

	<title>Reservation</title>


  <style type="text/css">
    *{
      font-family: 'Heebo', sans-serif;
    }
    body{
      background: url('camera02.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }
    button{
      margin-top: 10px;
      margin-left: 5px;
    }
    h1{
      font-family: 'Lobster', cursive;
    }
    .datetime{
      cursor: pointer;
    }
    .btn .btn-primary{
      margin-top: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

	<section>
   <div class="container py-5 ">
     <div class="row justify-content-center align-items-center h-100">
       <div class="card container h-100" style="background: #f1f1f1;">
        
        <div class="card-body">
          <form class="" action="insertRes.php" method="post">

          <a href="customer.php"><h5><i class="fa-solid fa-circle-xmark" style="float: right; margin-top: 5px;color: red;"></i></h5></a>

        <h1>Registration</h1>

                <div class="md-3">
                  <?php if (isset($_GET['res_date'])) { ?>
                  <p><i class="fa-solid fa-calendar-days" class="form-control datetime"></i>  Reservation Date
                    <input type="date" class="form-control" name="res_date" value="<?php echo $_GET['res_date']; ?>" required>
                  </p>
                  <?php }else{ ?>
                  <p><i class="fa-solid fa-calendar-days" class="form-control"></i> Reservation Date
                    <input type="date"  class="form-control datetime" name="res_date" required>
                  </p>
                  <?php }?>
                </div>

              <div class="md-3">
                <?php if (isset($_GET['res_time'])) { ?>
                <p><i class="fa-solid fa-clock"></i> Timeslot
                <input type="time" name="res_time" class="form-control datetime" value="<?php echo $_GET['res_time']; ?>" required>   
                </p>
                  <?php }else{ ?>
                <p><i class="fa-solid fa-clock"></i> Timeslot
                <input type="time" name="res_time" class="form-control datetime" required>
                </p>
                <?php }?>

                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="6" style="text-align: center;">Available Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>10:00 AM</td>
                      <td>11:30 AM</td>
                      <td>1:00 PM</td>
                      <td>2:30 PM</td>
                      <td>3:30 PM</td>
                      <td>5:00 PM</td>
                    </tr>
                    <tr>
                      <td>10:30 AM</td>
                      <td>12:00 NN</td>
                      <td>1:30 PM</td>
                      <td>2:00 PM</td>
                      <td>4:00 PM</td>
                      <td>5:30 PM</td>
                    </tr>
                    <tr>
                      <td>11:00 AM</td>
                      <td>12:30 NN</td>
                      <td>2:00 PM</td>
                      <td>3:00 PM</td>
                      <td>4:30 PM</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table><hr>

              </div>


              <div class="mb-3">

                <table class="table">
                  <thead>
                    <th colspan="6" style="text-align: center;">Package Offer</th>
                    <tr>
                      
                      <th>Offer # 1</th>
                      <th>Offer # 2</th>
                      <th>Offer # 3</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                    </tr>
                    <tr>
                      <td>15 Digital Images</td>
                      <td>20 Digital Images</td>
                      <td>35 Digital Images</td>
                    </tr>
                    <tr>
                      <td>Up to Two Outfits</td>
                      <td>Up to Three Outfits</td>
                      <td>Up to Four Outfits</td>
                    </tr>
                    <tr>
                      <td>Professional Editing</td>
                      <td>Professional Editing</td>
                      <td>Professional Editing</td>
                    </tr>
                    <tr>
                      <td><strong>PHP 200.00</strong></td>
                      <td><strong>PHP 300.00</strong></td>
                      <td><strong>PHP 400.00</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                 <?php if (isset($_GET['offer'])) { ?>
                <p>Package
                  <input class="form-control" type="text" id="offer" name="offer" placeholder="Enter your package" value="<?php echo $_GET['offer']; ?>" required>
                </p>
                <?php }else{ ?>
                  <p>Package
                    <input class="form-control" type="text" id="offer" name="offer" placeholder="Enter your package" required>
                  </p>
                <?php }?>
              </div>  


            <div class="mb-3">
                   <h3>Payment Method</h3>

              <div class="icon-container">
                  <p>Accepted Transaction 
                    <i><img src="gcash.png" style="width: 50px;height: 50px;border-radius: 74px;" class="circle"></i>
                    <p>iKreate's G-Cash Number: 09275217065</p>
                  </p>
              </div>
            </div>

                <?php if (isset($_GET['cname'])) { ?>
                <p>G-Cash Name
                  <input class="form-control" type="text" id="cname" name="cname" placeholder="Enter your G-Cash name" value="<?php echo $_GET['cname']; ?>"required>
                </p>
                <?php }else{ ?>
                  <p>G-Cash Name
                    <input class="form-control" type="text" id="cname" name="cname" placeholder="Enter your G-Cash name"required>
                  </p>
                <?php }?>

                <?php if (isset($_GET['cnum'])) { ?>
                <p>G-Cash Number
                  <input class="form-control" type="text" id="cnum" name="cnum" placeholder="Enter your G-Cash number" value="<?php echo $_GET['cnum']; ?>"required>
                </p>
                <?php }else{ ?>
                <p>G-Cash Number
                  <input class="form-control" type="text" id="cnum" name="cnum" placeholder="Enter your G-Cash number"required>
                </p>
                <?php }?>

                <?php if (isset($_GET['amount'])) { ?>
                <p> Amount Price
                  <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter your amount" value="<?php echo $_GET['amount']; ?>"required>
                </p>
                <?php }else{ ?>
                <p> Amount Price
                  <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter your amount"required>
                </p>
                
                <?php }?>

                <?php if (isset($_GET['transaction'])) { ?>
                <p> Transaction PIN
                  <input class="form-control" type="text" id="transaction" name="transaction" placeholder="Enter your transaction PIN" required> value="<?php echo $_GET['transaction']; ?>">
                </p><hr>
                <?php }else{ ?>
                <p> Transaction PIN
                  <input class="form-control" type="text" id="transaction" name="transaction" placeholder="Enter your transaction PIN" required>
                </p><hr>
                
                <?php }?>

                  <p><i class="fa-solid fa-location-pin"></i> Lot 17, Blk 2, Azalea Street, Camia Homes, Nasugbu, Philippines</p>
                  <p><i class="fa-solid fa-bell"></i> 30 mins per session</p><hr>

                  <p><i class="fa-solid fa-user-pen"></i> User Details</p>

                 <?php if (isset($_GET['custom_name'])) { ?>
                <p> Name
                  <input class="form-control" type="text" id="custom_name" name="custom_name" placeholder="Enter your name" value="<?php echo $_GET['custom_name']; ?>" required>
                </p>
                  <?php }else{ ?>
                <p> Name
                    <input class="form-control" type="text" id="custom_name" name="custom_name" placeholder="Enter your name" required>
                </p>
                  <?php }?>

                <?php if (isset($_GET['contact'])) { ?>
                <p> Contact
                  <input class="form-control" type="text" id="contact" name="contact" placeholder="Enter your contact number" value="<?php echo $_GET['contact']; ?>" required>
                </p>
                <?php }else{ ?>
                <p> Contact
                  <input class="form-control" type="text" id="contact" name="contact" placeholder="Enter your contact number" required>
                </p>
                <?php }?>

               <button class="btn btn-success" name="btn-save" id="btn-save" style="float: left;">Reserve</button>  
            </div>
                   
          </form>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              Select the G-Cash Receipt to Upload:
              <input type="file" name="file" class="form-control" required>
              <input type="submit" name="submit" class="btn btn-primary" value="Upload">
          </form>
        </div>

      </div> 
     </div>
   </div>
  </section>
		
</body>
</html>