<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="homestyle.css">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>
<body>
	<!--navbar-->
	<nav class="navbar">
		<h1 class="logo">iKreate</h1>
		<ul class="nav-links">
			<li><a href="gallery.php"><i class="fa-solid fa-mountain-sun"></i> Gallery</a></li>
			<li><a href="about.php"><i class="fa-solid fa-magnifying-glass"></i> About</a></li>
			<li><a href="contacts.php"><i class="fa-solid fa-phone"></i> Contacts</a></li>
			<li><a href="login.php" class="ctn">Login</a></li>
			
		</ul>
		<img src="menu-btn.png" alt="" class="menu-btn">
	</nav>

	<!--background-->
	<header>
		<div class="header-content">
			<h2>Every moment is <span>memorable</span></h2>
			<div class="line"></div>
			<h1>CAPTURE THE MOMENT.</h1>
			<a href="signup.php" class="ctn">Reserve Now!</a>
		</div>
	</header>

	<!-- About -->
	<section class="about-info">
		<div class="title">
			<h1>About</h1>
		</div>
		<div class="row">
			<div class="col">
				<img src="img2.jpg">
				<h4>About</h4>
				<p>iKreate Self Portrait Studio offers complete background, lighting, props, and a professional camera – everything you need to take your own photos. This concept is perfect for people who easily get conscious in front of a camera especially when there’s a photographer present.</p>
				<a href="about.php" class="ctn">Read More</a>
			</div>
		</div>
	</section>

	<!--Register-->
	<section class="register">
		<div class="rgstr-content">
			<h1>Register</h1>
			<p>To connect with us you could register here to know what offer you could get,
			And to know your reservation status.
			</p>
			<a href="signup.php" class="ctn">Register Now</a>
		</div>
	</section>

<!--Gallery-->
	<section class="gallery">
		<div class="row">
			<div class="col content-col">
				<h1>Gallery</h1>
				<p>The great expiditon for the sample pictures here in our gallery. Let me show you how creative we could be.</p>
				<a href="gallery.php" class="ctn">Go to Gallery</a>
			</div>
			<div class="col img-col">
				<div class="img-gallery">
					<img src="sample4.jpg">
					<img src="sample5.jpg">
				</div>
			</div>
		</div>
	</section>

<!--footer-->
	<section class="footer">
		<p>Copyright Reserved.</p>
		<p>Lot 17, Blk 2, Azalea Street, Camia Homes, Nasugbu, Philippines</p>
	</section>

	<script type="text/javascript">
		const menuBtn = document.querySelector('.menu-btn')
		const navlinks = document.querySelector('.nav-links')

		menuBtn.addEventListener('click',()=>{
			navlinks.classList.toggle('mobile-menu')
		})

	</script>

</body>
</html>