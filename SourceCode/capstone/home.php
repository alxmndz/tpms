<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Offcanvas Example</title>
  <link rel="stylesheet" type="text/css" href="css/homepage1.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-scroll">
  <div class="container">
    <a class="navbar-brand" href="#main" style="color: white;"><b>Tuy Parish Management System</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-item d-none d-sm-block"> <!-- Visible on larger screens -->
      <div class="d-flex align-items-center">
        <a class="nav-link mx-2 text-white" href="#services">Services</a>
        <a class="nav-link mx-2 text-white" href="#events">Events</a>
        <a class="nav-link mx-2 text-white" href="#team">Team</a>
      </div>
    </div>
  </div>
</nav>


<!-- Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" data-bs-backdrop="false">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <!-- Menu items go here -->
    <ul class="list-group">
      <li class="list-group-item">Home</li>
      <li class="list-group-item">About</li>
      <li class="list-group-item">Services</li>
      <li class="list-group-item">Contact</li>
    </ul>
  </div>
</div>

<!-- Main Content -->
<header class="masthead" id=main>
  <div class="container">
    <div class="masthead-heading">Welcome To Our Church!</div>
    <div class="masthead-subheading">Greet one another with a kiss of love. Peace to all of you who are in Christ.</div>
    <br>
    <div class="masthead-subheading">-1 Peter 5:14 NIV</div>
    <a type="button" href="loginform.php" class="btn btn-success btn-lg"><b>LOGIN</b></a>
  </div>
</header>

<!-- Second Section -->
<section class="page-section bg-light" id="services">
            <div class="container">
                <div class="text-center">
                    <h1 class="section-heading text-uppercase mb-3"><b>Services Offer</b></h1>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                            <i class="fas fa-pen fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Reservation</h4>
                        <p class="text-muted">Church reservation is a way to secure a dedicated space and time within a church for religious, ceremonial, or special events, providing a sacred and appropriate environment for such occasions.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Online Mass</h4>
                        <p class="text-muted">Online Mass is a virtual religious service where people can participate from their own locations using the internet. It has become more popular when physical attendance is limited.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                            <i class="fas fa-bell fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Announcement</h4>
                        <p class="text-muted">Announcements in church refer to the communication of important information, updates, events, or announcements of interest to the congregation during a worship service or gathering.</p>
                    </div>
                    <br>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                            <i class="fas fa-peso-sign fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Online Transaction</h4>
                        <p class="text-muted">Online transactions within a church management system offer churches a centralized and streamlined approach to managing financial transactions.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                            <i class="fas fa-folder fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Requirements</h4>
                        <p class="text-muted">Requirements is one of the important part in services of the church in terms of event reservation because every events needs a specific requirements for admins approval.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Web Security</h4>
                        <p class="text-muted">Web security is always changing because new threats come up. Having a good web security plan helps keep data safe, protect user privacy, and build trust with website visitors.</p>
                    </div>
                </div>
            </div>
        </section>

<!-- Third Section -->
<section class="mt-2 events-section page-section" id="events">
  <div class="text-center">
     <h1 class="section-heading text-uppercase" style="color: white;"><b>EVENTS</b></h1>
  </div>
  <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/img/portfolio/baptize.jpg" class="card-img-top img-fluid" alt="Baptismal">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Baptismal</h5>
                                        <p class="card-text">Baptism is a vital spiritual initiation symbolizing forgiveness, cleansing from sin (especially in infant baptism), and a commitment to follow Christ, marking the start of one's Christian journey.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/img/portfolio/blessing.jpg" class="card-img-top img-fluid" alt="Blessing">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Blessing</h5>
                                        <p class="card-text">Blessing is a sacred practice of seeking divine favor, protection, and grace for people, objects, places, and events.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/img/portfolio/communion.jpg" class="card-img-top img-fluid" alt="Communion">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Communion</h5>
                                        <p class="card-text">Communion is a key Christian practice symbolizing faith in Christ's sacrifice, forgiveness, and spiritual connection with God and fellow believers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/img/portfolio/kumpil.jpg" class="card-img-top img-fluid" alt="Confirmation">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Confirmation</h5>
                                        <p class="card-text">Confirmation, after baptism and First Communion, empowers candidates with the Holy Spirit to be active church members, marking a significant step in their faith journey.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/img/portfolio/funeral.jpg" class="card-img-top img-fluid" alt="Funeral">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Funeral</h5>
                                        <p class="card-text">A funeral is a gathering to remember and find support in times of loss, where friends and family honor and pay respects to the departed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/img/portfolio/marriage.jpg" class="card-img-top img-fluid" alt="Wedding">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Wedding</h5>
                                        <p class="card-text">Marriage, a universal institution, is a recognized union between two people based on love, commitment, and mutual consent, both legally and socially.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat the same structure for other carousel items -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</section>

      <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase mb-3 mt-3" style="font-family: 'Poppins',sans-serif;"><b>Church Leaders</b></h2>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/fr.leo.png" alt="..." />
                            <h4>Rev. Fr. Leo Edgardo Villostas</h4>
                            <p class="text-muted">Church Head</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/bro.jeeper.jpg" alt="..." />
                            <h4>Bro. Jeeper Bisnan</h4>
                            <p class="text-muted">Administrator</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/bro.lorenz.jpg" alt="..." />
                            <h4>Bro. John Lorenz Lapitan</h4>
                            <p class="text-muted">Office Staff</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<footer class="footer py-4">
   <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-4 text-center">Copyright &copy; Tuy Parish Management System 2023</div>
      </div>
   </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
