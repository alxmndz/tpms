<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="assets/icons/svf.png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/styles.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Tuy Parish Website</title>
</head>
<body>
		<header>
			<a href="index.html" class="logo fw-bold" style="font-family: 'Open Sans', sans-serif;">
				<img src="assets/icons/svf.png" alt="Tuy Parish Logo"><span>Tuy</span> Parish Website
			</a>
			<ul class="navbar">
				<li><a href="#home"><i class="fas fa-house"></i> Home</a></li>
				<li><a href="#offers"><i class="fas fa-envelope"></i> Offers</a></li>
				<li><a href="#events"><i class="fas fa-calendar-day"></i> Events</a></li>
				<li><a href="#team"><i class="fas fa-users"></i> Team</a></li>
			</ul>
			<span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()" class="fas fa-bars menu"></span>
		</header>

		<div class="sidebar" id="mySidebar">
			<a href="#home"><i class="fas fa-house"></i> Home</a>
			<a href="#offers"><i class="fas fa-envelope"></i> Offers</a>
			<a href="#events"><i class="fas fa-calendar-day"></i> Events</a>
			<a href="#team"><i class="fas fa-users"></i> Team</a>
		</div>
	
		<section class="home" id="home">
			<div class="home-text text-center mt-6">
				<h1 class="mt-2 fw-bolder">Welcome to Tuy Parish Website!</h1>
				<h5 class="mt-3 fw-bold">Greet one another with a kiss of love. Peace to all of you who are in Christ.</h5>
				<p class="mt-3 verse">1 Peter 5:14 NIV</p>
				<button class="btn btn-md btn-success mt-4" onclick="redirectToNewPage()"><div class="fw-bold">Sign-in</div></button>
			</div>
		</section>

	<section class="offers" id="offers">
		<div class="container">
			<h1 class="text-center fw-bold text-white" style="text-transform: uppercase; font-family: 'Open Sans', sans-serif;"> Services Offers</h1>
			<div class="row mt-3">

				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/offers/schedule.png">
						<h5>Reservation</h5>
						<p>Church reservation is a way to secure a dedicated space and time within a church for religious, ceremonial, or special events, providing a sacred and appropriate environment for such occasions.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/offers/security.png">
						<h5>Web Security</h5>
						<p>Web security is always changing because new threats come up. Having a good web security plan helps keep data safe, protect user privacy, and build trust with website visitors.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/offers/organize_files.png">
						<h5>Cerntralized Data Files</h5>
						<p>In a church setting, centralized organized data involves systematically gathering and overseeing crucial information, updates, and announcements for the congregation during worship services.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/offers/credentials.png">
						<h5>Requirements</h5>
						<p>Requirements is one of the important part in services of the church in terms of event reservation because every events needs a specific requirements for admins approval.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/offers/transaction.png">
						<h5>Online Transaction</h5>
						<p>Online transactions within a church management system offer churches a centralized and streamlined approach to managing financial transactions.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/offers/announcement.png">
						<h5>Announcement</h5>
						<p>Announcements in church refer to the communication of important information, updates, events, or announcements of interest to the congregation during a worship service or gathering.</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="events" id="events">
		<div class="container mt-4 mb-3">
			<h1 class="text-center fw-bold" style="text-transform: uppercase; font-family: 'Open Sans', sans-serif;"> Reservation Events</h1>
			<div class="row mt-3">

				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/events/baptism.png">
						<h5>Baptismal</h5>
						<p>Baptism is a vital spiritual initiation symbolizing forgiveness, cleansing from sin (especially in infant baptism), and a commitment to follow Christ.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/events/blessing.png">
						<h5>Blessing</h5>
						<p>Blessing is a sacred practice of seeking divine favor, protection, and grace for people, objects, places, and events.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/events/communion.png">
						<h5>Communion</h5>
						<p>Communion is a key Christian practice symbolizing faith in Christ's sacrifice, forgiveness, and spiritual connection with God and fellow believers.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/events/confirmation.png">
						<h5>Confirmation</h5>
						<p>Confirmation, after baptism and First Communion, empowers candidates with the Holy Spirit,marking a significant step in their faith journey.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/events/funeral.png">
						<h5>Funeral Mass</h5>
						<p>A funeral is a gathering to remember and find support in times of loss, where friends and family honor and pay respects to the departed.</p>
					</div>
				</div>
				<div class="card fade-in-out">
					<div class="card-body">
						<img src="assets/icons/events/wedding.png">
						<h5>Wedding</h5>
						<p>Wedding, a universal institution, is a recognized union between two people based on love, commitment, and mutual consent</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="page-section events-section team" id="team">
		<div class="container">
				 <div class="text-center">
					<h2 class="section-heading text-uppercase mb-3 mt-3" style="font-family: 'Open Sans', sans-serif;"><b>Church Leaders</b></h2>
				 </div>
				 <div class="row fade-in-out">
						 <div class="col-lg-4">
								 <div class="team-member">
										 <img class="mx-auto rounded-circle" src="assets/icons/team/fr.leo.png" alt="..." />
										 <h4>Rev. Fr. Leo Edgardo Villostas</h4>
										 <p>Church Head</p>
								 </div>
						 </div>
						 <div class="col-lg-4">
								 <div class="team-member">
										 <img class="mx-auto rounded-circle" src="assets/icons/team/bro.jeeper.jpg" alt="..." />
										 <h4>Bro. Jeeper Bisnan</h4>
										 <p>Administrator</p>
								 </div>
						 </div>
						 <div class="col-lg-4">
								 <div class="team-member">
										 <img class="mx-auto rounded-circle" src="assets/icons/team/bro.lorenz.jpg" alt="..." />
										 <h4>Bro. John Lorenz Lapitan</h4>
										 <p>Office Staff</p>
								 </div>
						 </div>
				 </div>
		 </div>
 </section>

 <footer>
    <div class="footer-container container">
        <div class="container">
            <p class="text-center">Copyright © Tuy Parish Management System 2023</p>
			<a href="#" style="color: white;"><i class="fa-brands fa-square-facebook text-center"></i></a>
        </div>
    </div>
 </footer>

 <script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "150px";
        document.addEventListener("click", closeNavOutside);
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.removeEventListener("click", closeNavOutside);
    }

    function closeNavOutside(event) {
        const sidebar = document.getElementById("mySidebar");
        if (!event.target.closest("#mySidebar") && !event.target.closest(".fas.fa-bars")) {
            closeNav();
        }
    }
</script>

<script>
	document.addEventListener("DOMContentLoaded", function () {
    // Get all elements with the 'fade-in-out' class
    var fadeElements = document.querySelectorAll(".fade-in-out");

    function fadeIn() {
        fadeElements.forEach(function (element) {
            // Calculate the position of the element relative to the viewport
            var elementPosition = element.getBoundingClientRect().top;

            // If the element is partially visible, add the 'fade-in' class
            if (elementPosition < window.innerHeight * 0.75 && elementPosition > -window.innerHeight * 0.25) {
                element.classList.add("fade-in");
            }
        });
    }

    // Initial fade check
    fadeIn();

    // Add event listener for scroll events
    window.addEventListener("scroll", function () {
        // Throttle the scroll event to improve performance
        clearTimeout(window.scrollThrottle);
        window.scrollThrottle = setTimeout(fadeIn, 200);
    });
});
</script>

<script>
    function redirectToNewPage() {
        // Replace 'newPage.html' with the actual URL of the new page you want to redirect to
        window.location.href = 'login.php';
    }
</script>

</body>
</html>