    <?php 
  session_start();

  if(isset($_SESSION['unique_id'])){
    $user_id = $_SESSION['user_id'];
    // $conn = new mysqli("localhost","root","","technoartdb");
    //       if ($conn->connect_error) {
    //       die("Connection failed : " . $conn->connect_error);
    //     }
    // $id = $_SESSION['unique_id'];
    // $sql = "SELECT * FROM users WHERE unique_id = '$id'";
    // $result = $conn->query($sql);
    // $email = "admin@gmail.com";
    // if($result){
    //     while($row = $result->fetch_assoc()){
    //         $type_row = $row['email'];
    //         if($type_row == $email){
    //           header("Location: admin.php");
    //         }
    //         else{
    //           header("Location: hompage.php");
    //         }
         
            
       
  
?>
<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
	<meta charset="UTF-8">
	<title>Simple Sidebar Menu Using HTML & CSS</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
	<link href="css/customer-final.css" rel="stylesheet">
  <style type="text/css">
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");
body {
  width: 100%;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  min-height: 100vh;
  font-family: "Poppins", sans-serif;
}

/*product details*/

.single-product{
  margin-top: 80px;
}
.single-product .col-2 img{
  padding: 0;
}
.single-product .col-2{
  padding: 20px;
}
.single-product h4{
  margin: 20px 0;
  font-size: 22px;
  font-weight: bold;
}
.single-product select{
  display: block;
  padding: 10px;
  margin-top: 20px;
}
.single-product input{
  width: 50px;
  height: 40px;
  padding-left: 10px;
  margin-right:10px;
  font-size:10px;
  border: 1px solid #ff523b;
}
input:focus{
  outline: none;
}
.single-product a{
  margin-bottom: 30px;
  border-radius: 45px;
}

#indent{
  color: black;
}
.single-product .fa{
  margin-left: 10px;
}

.small-img-row{
  display: flex;
  justify-content:flex-start;
}
.SmallImg{
    display: flex;
  justify-content:space-between;
}
.small-img-col{
  flex-basis: 24%;
  cursor: pointer;
}


.cart-page{
  margin: 80px auto;
} 
table{
  width: 100%;
  border-collapse: collapse;
}

.cart-info{
  display: flex;
  flex-wrap: wrap;
}

th{
  text-align: left;
  padding: 5px;
  color: #fff;
  background: #ff523b;
  font-weight: normal;
 }
 td{
  padding: 10px 5px;
 }

td input{
  width: 40px;
  height: 30px;
  padding: 5px;
}

td a{
  color: #ff523b;
  font-size: 12px;

}
td img{
  width: 80px;
  height: 80px;
  margin-right: 10px;
}

.total-price{
  display: flex;
  justify-content: flex-end;
}
.total-price table{
  border-top: 3px solid #ff523b;
  width: 100%;
  max-width: 430px;
}
td:last-child{
  text-align: right;
}
th:last-child{
  text-align: right;
}

#another{
  background-color: #ff523b;
  color: #fff;
}
#another:hover{
  background: #563434;
}
#back{
  background-color: #D9DDDC;
  color: black;
}
#back:hover{
  background: #563434;
}


/*responsive feature*/

@media only screen and (max-width:600px){
  .row{
    text-align: center;
  }
  .col-2,.col-3.col-4{
    flex-basis: 100%;
  }
  .single-product .row{
    text-align: left;
  }
  .single-product .col-2{
    padding: 20px 0;
  }
  .single-product h1{
    font-size: 26px;
    line-height: 32px;
  }
  .cart-info p{
    display: none;
  }
}

.complete-btn{
  border-radius: 5px;
  width: 100px;
  height: 50px;
  background-color:#ff523b ;
  color: #fff;
  text-transform:uppercase;
}

.complete-btn:hover{
  background-color:#5DBB63;
  transition: 0.8s;
  color: #000;
}


  </style>
</head>
<body>
	<nav>
		<ul>
			<li class="logo"><img alt="" src="https://i.postimg.cc/WzkCM20g/logo1.png"></li>
			<li><a><i class="fa-solid fa-user"></i> username</a></li>
			<li class="tablinks" onclick="openCity(event, 'Home')" id="defaultOpen">
					<a href="homepage.php"><i class="fa fa-home"></i>   home</a>
			</li>
			<li class="tablinks" onclick="openCity(event, 'cart')" id="defaultOpen">
					<a href="#"><i class="fa-solid fa-cart-shopping"></i>   art cart</a>
			</li>
			<li class="tablinks" onclick="openCity(event, 'artists')" id="defaultOpen">
					<a href="#"><i class="fa fa-users"></i>   liked artist</a>
			</li>
			<li class="tablinks">
					<a href="users.php"><i class="fa-solid fa-envelope"></i>   message</a>
			</li>
			<li>

				<a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?> " class="logout"><i class="fa-solid fa-circle-xmark"></i>   logout</a>
			</li>
		</ul>
	</nav>
	<div id="Home" class="tabcontent">
		<div class="wrapper">
			<div class="section">
				<div class="box-area">
					<section class="main">
          <div class="main-top" style="overflow-x:auto;">
            <h1>Recent Product Orders</h1>
          </div>
          <div class="users">
            <div class="card">
              <img src="images/product.png">
              <h4>Art Name:</h4>
              <p>Ordered On:</p>
              <div class="per">
                <table>
                  <tr>
                    <td><span>Jan</span></td>
                    <td><span>17</span></td>
                  </tr>
                  <tr>
                    <td>Month</td>
                    <td>Day</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="card">
              <img src="images/ai.png">
              <h4>Art Name:</h4>
              <p>Ordered On:</p>
              <div class="per">
                <table>
                  <tr>
                    <td><span>Feb</span></td>
                    <td><span>18</span></td>
                  </tr>
                  <tr>
                    <td>Month</td>
                    <td>Day</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="card">
              <img src="images/monalisadab.jpg">
              <h4>Art Name:</h4>
              <p>Ordered On:</p>
              <div class="per">
                <table>
                  <tr>
                    <td><span>Mar</span></td>
                    <td><span>19</span></td>
                  </tr>
                  <tr>
                    <td>Month</td>
                    <td>Day</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="card">
              <img src="images/squid.jpg">
              <h4>Art Name: </h4>
              <p>Ordered On:</p>
              <div class="per">
                <table>
                  <tr>
                    <td><span>Apr</span></td>
                    <td><span>22</span></td>
                  </tr>
                  <tr>
                    <td>Month</td>
                    <td>Day</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <section class="artistic">
            <div class="artist-list">
              <h1>Artworks Transaction</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th>Artist_ID</th>
                    <th>Artist Name</th>
                    <th>Art Type</th>
                    <th>Transaction Date</th>
                    <th>Price Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>01</td>
                    <td>Marco Polo</td>
                    <td>vector</td>
                    <td>03-24-23</td>
                    <td>1300.00</td>
                  </tr>
                  <tr class="active">
                    <td>02</td>
                    <td>Kier Guevarra</td>
                    <td>Traditional Art</td>
                    <td>04-12-23</td>
                    <td>300.00</td>
                  </tr>
                  <tr>
                    <td>03</td>
                    <td>Kim Alexander Mendoza</td>
                    <td>Tattoo</td>
                    <td>04-22-23</td>
                    <td>4000.00</td>
                  </tr>
                  <tr>
                    <td>04</td>
                    <td>Melvin Felicisimo</td>
                    <td>Tattoo</td>
                    <td>05-25-23</td>
                    <td>2000.00</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>
        </section>
				</div>
			</div>
		</div>
	</div>

	<div id="cart" class="tabcontent">
		<div class="wrapper">
			<div class="section">
				<div class="box-area">
					<!-- checkout -->
                <div class="small-container cart-page">
                  <table>
                    <tr>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Subtotal</th>
                      <th>Action</th>
                    </tr>


               <?php 
          $conn = new mysqli("localhost","root","","technoartdb");
          if ($conn->connect_error) {
          die("Connection failed : " . $conn->connect_error);
        }
        else{ 
          $id = 1;
          $transSQL = "SELECT * FROM transactions WHERE account_id = '$user_id'";
          $transSQLresult = $conn->query($transSQL);
          while($row = $transSQLresult->fetch_assoc()){
        ?>
      
                    <tr>
                      <td>
                        <div class="cart-info">
                          <img src="<?php echo $row['image_url']?>"  width="125px">
                          <div>
                            <p><?php echo $row['art_style'] ?></p>
                            <small>Price: <b>₱</b><?php echo $row['price'] ?></small>
                            <br>
                            <a href="#">Remove</a>
                          </div>
                        </div>
                      </td>
                      <td><input type = "number" value = "<?php echo $row['quantity'] ?>" disabled></td>
                      <td><b>₱</b><?php echo $row['quantity'] * $row['price']?></td>
                      <td><a href="remove.php?id=<?php echo $row['id']; ?>"><button class="complete-btn">Cancel</button></a></td>
                    </tr>

   <?php }
}
?>
                    
                  </table>

                <div class="total-price">
                  <table>
                    <tr>
                      <td>Sub Total</td>
                      <td>₱5,100</td>
                    </tr>
                    <tr>
                      <td>Shipping Fee</td>
                      <td>₱350</td>
                    </tr>
                    <tr>
                      <td><a id="another" class="btn btn-primary">Add another</a></td>
                      <td><a id="back" href="products.html" class="btn btn-secondary">Add more</a></td>
                    </tr>
                  </table>
                </div>

                </div>
				</div>
			</div>
		</div>
	</div>
				</div>
			</div>
		</div>
	</div>

	<div id="artists" class="tabcontent">
		<div class="wrapper">
			<div class="section">
				<div class="box-area">
					<section class="main">
       <section class="artistic">
        <h1>Liked Artists</h1>
        <div class="artist-list" style="overflow-x:auto;, display: flex;">
          
            <table class="table">
                <thead>
                  <tr>
                    <th>Artist_ID</th>
                    <th>Artist Name</th>
                    <th>Art Type</th>
                  </tr>
                </thead>
                     <?php 
          $conn = new mysqli("localhost","root","","technoartdb");
          if ($conn->connect_error) {
          die("Connection failed : " . $conn->connect_error);
        }
        else{ 
          $id = 1;
          $transSQL = "SELECT * FROM viewartistfollows WHERE account_id = '$user_id'";
          $transSQLresult = $conn->query($transSQL);
          while($row = $transSQLresult->fetch_assoc()){
        ?>
      
                <tbody>
                  <tr>
                    <td><?php echo $row['account_id']?></td>
                    <td><?php echo $row['first_name'] . $row['last_name']?></td>
                    <td><?php echo $row['categories']?></td>
                  </tr>
                  
                <?php }}?>
                </tbody>
          </table>
        </div>
      </section>
      </div>
     </section>
				</div>
			</div>
		</div>
	</div>
    
	<div id="message" class="tabcontent">
    <div class="wrapper">
      <div class="section">

        </div>
      </div>
    </div>
				</div>
			</div>
		</div>
	</div>

	<div id="logout" class="tabcontent">
		<div class="wrapper">
			<div class="section">
				<div class="box-area">
					<h2 style="color: #2b2626">Logout</h2>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
	function openCity(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	    tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
	    tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>
</body>
</html>
<?php
 // }
 //     }
 } 
else{
  header("Location: index.php?Error Something went wrong");
}
?>

