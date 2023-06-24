<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>
        <i class="fa-solid fa-right-to-bracket"></i> 
        Login
        <div class = "exit"><a href="homepage.php">
          <img src="assets/img/close-icon.svg"></a>
        </div>
      </header>
      <form action="php/login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text">
          <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="signup-rev.php">Signup Now</a></div>
    </section>
  </div>
  
  <script src="js/pass-show-hide.js"></script>
  <script src="js/login-2.js"></script>

</body>
</html>
