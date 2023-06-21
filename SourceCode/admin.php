<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <title>Techno Art Craft | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/admin.css" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/admin.ico" />
</head>
<body>
    <div>
      <nav>
            <ul>
                <li class="logo">
                  <img style="border-radius: 50%;" src="assets/img/nav-logo.png">
                </li>
                <li class="tablinks">
                  
                </li>
                <li class="tablinks" onclick="openCity(event, 'dashboard')" id="defaultOpen">
                        <a href="#"><i class="bx bxs-dashboard"></i>   Dashboard</a>
                </li>
                <li class="tablinks" onclick="openCity(event, 'forms')" id="defaultOpen">
                        <a href="#"><i class="fa-solid fa-check-to-slot"></i>   Forms</a>
                </li>
                <li class="tablinks" onclick="openCity(event, 'formsa')" id="defaultOpen">
                        <a href="#"><i class="fa-solid fa-bell"></i>   Announcement</a>
                </li>
                <li class="tablinks" onclick="openCity(event, 'rUI')" id="defaultOpen">
                        <a href="#"><i class="fa-solid fa-exclamation"></i>   Reports</a>
                </li>
                <li class="tablinks" onclick="openCity(event, 'uI')" id="defaultOpen">
                        <a href="#"><i class="fa-solid fa-users"></i>   Patrons</a>
                </li>            
                <li>
                    <a href="login-rev.php"><i class="fa-solid fa-circle-xmark"></i>   Logout</a>
                </li>
            </ul>
      </nav>
    </div>
    <section id="content">
        <main>  
            <div id="dashboard" class="tabcontent">
                <div class="wrapper">
                    <div class="section">
                        <div class="box-area">
                            <div class="head-title">
                                <div class="left">
                                    <h1>Dashboard</h1>
                                    <hr>
                                </div>
                            </div>
                            <ul class="box-info">
                                <li>
                                    <i class='bx bxs-calendar-check' ></i>
                                    <span class="text">
                                        <h3></h3>
                                        <p>Events</p>
                                    </span>
                                </li>
                                <li>
                                    <i class='bx bxs-group' ></i>
                                    <span class="text">
                                        <h3></h3>
                                        <p>Patrons</p>
                                    </span>
                                </li>
                                <li>
                                    <i class='bx bxs-dollar-circle' ></i>
                                    <span class="text">
                                        <h3></h3>
                                        <p>Donations</p>
                                    </span>
                                </li>
                            </ul>
                            <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>Reports</h3>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Report Title</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="todo">
                            <div class="head">
                                <h3>Forms</h3>
                                
                            </div>
                            <ul class="todo-list">
                                <li class="completed">
                                    <p>Kumpil</p>
                                    <i class='bx bx-dots-vertical-rounded' onclick="openCity(event, 'forms')"></i>
                                </li>
                                <li class="completed">
                                    <p>Birthday</p>
                                    <i class='bx bx-dots-vertical-rounded' onclick="openCity(event, 'forms')"></i>
                                </li>
                                <li class="not-completed">
                                    <p>Binyag</p>
                                    <i class='bx bx-dots-vertical-rounded' onclick="openCity(event, 'forms')"></i>
                                </li>

                            </ul>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="forms" class="tabcontent">
                <div class="wrapper">
                    <div class="section">
                        <div class="box-area">
                            <div class="head-title">
                                <div class="left">
                                    <h1>Forms</h1>
                                    <hr>
                                </div>
                            </div>

                            <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                              <table class="table">
                                  <thead>
                                    <tr class= table-dark>
                                      <td scope="col">Filename</td>
                                      <td scope="col">Submitted Date</td>
                                      <td scope="col">Status</td>
                                      <td scope="col">Action</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Image.jpg</td>
                                      <td>06/20/23</td>
                                      <td>Aproved</td>
                                      <td>
                                        <select name="actions" id="actions">
                                          <option value=""></option>
                                          <option value="Approved">Approved</option>
                                          <option value="Disapproved">Disapproved</option>
                                        </select>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="formsa" class="tabcontent">
                  <div>
                     <div class="wrapper">
                    <div class="section">
                        <div class="box-area">
                            <div class="head-title">
                                <div class="left">
                                    <h1>Announcements</h1>
                                    <hr>
                                </div>
                            </div>
                    <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnounce" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Create New</button>
                              <table class="table">
                                  <thead>
                                    <tr class= table-dark>
                                      <td scope="col">Announcement Title</td>
                                      <td scope="col">Date</td>
                                      <td scope="col">Description</td>
                                      <td scope="col" colspan="3">Action</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">Libreng Kasal</th>
                                      <td>02/28/23</td>
                                      <td></td>
                                      <td>
                                        <select name="actions" id="actions">
                                          <option value=""></option>
                                          <option value="Edit">Edit</option>
                                          <option value="Delete">Delete</option>
                                        </select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td scope="row">Binyag</td>
                                      <td>03/05/23</td>
                                      <td></td>
                                      <td>
                                        <select name="actions" id="actions">
                                          <option value=""></option>
                                          <option value="Edit">Edit</option>
                                          <option value="Delete">Delete</option>
                                        </select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td scope="row">Kumpil</td>
                                      <td>04/22/23</td>
                                      <td></td>
                                      <td>
                                        <select name="actions" id="actions">
                                          <option value=""></option>
                                          <option value="Edit">Edit</option>
                                          <option value="Delete">Delete</option>
                                        </select>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>

                    <div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="rUI" class="tabcontent">
                <div class="wrapper">
                    <div class="section">
                        <div class="box-area">
                            <div class="head-title">
                                <div class="left">
                                    <h1>Reports</h1>
                                    <hr>
                                </div>
                            </div>
                            <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                               <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReport" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Create New</button>
                              <table class="table">
                                  <thead>
                                    <tr class= table-dark>
                                      <td scope="col">Report Title</td>
                                      <td scope="col">Date</td>
                                      <td scope="col">Image</td>
                                      <td scope="col">Description</td>
                                      <td scope="col" colspan="4">Action</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">Youth Club</th>
                                      <td>06/20/23</td>
                                      <td></td>
                                      <td>"Join now"</td>
                                      <td>
                                        <select name="actions" id="actions">
                                          <option value=""></option>
                                          <option value="Edit">Edit</option>
                                          <option value="Delete">Delete</option>
                                        </select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Choir Sessions</th>
                                      <td>07/01/23</td>
                                      <td></td>
                                      <td>"Join now"</td>
                                      <td>
                                        <select name="actions" id="actions">
                                          <option value=""></option>
                                          <option value="Edit">Edit</option>
                                          <option value="Delete">Delete</option>
                                        </select>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="uI" class="tabcontent">
                <div class="wrapper">
                    <div class="section">
                        <div class="box-area">
                            <div class="head-title">
                                <div class="left">
                                    <h1>Patrons</h1>
                                    <hr>
                                </div>
                            </div>
                            <div class="container">
                              <section>
                                 <div class="container py-5 ">
                                   <div class="row justify-content-center align-items-center h-100">
                                     <div class="card container h-100" style="background: #f1f1f1;">
                                      <div class="card-body">
                                        <h1>Patron Data</h1>
                                        <hr>
                                        <table class="table">
                                          <thead>
                                            <tr class= table-dark>
                                              <td scope="col">First Name</td>
                                              <td scope="col">Last Name</td>
                                              <td scope="col">Email Address</td>
                                              <td scope="col">Password</td>
                                              <td scope="col">Action</td>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td scope="col">Kent Bryan</td>
                                              <td scope="col">Carbayar</td>
                                              <td scope="col">kentbryan@gmail.com</td>
                                              <td scope="col">******</td>
                                              <td>
                                                <select name="actions" id="actions">
                                                  <option value=""></option>
                                                  <option value="Edit">Edit</option>
                                                  <option value="Delete">Delete</option>
                                                </select>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td scope="col">Jerico </td>
                                              <td scope="col">Cabotaje</td>
                                              <td scope="col">jerico@gmail.com</td>
                                              <td scope="col">*******</td>
                                              <td>
                                                <select name="actions" id="actions">
                                                  <option value=""></option>
                                                  <option value="Edit">Edit</option>
                                                  <option value="Delete">Delete</option>
                                                </select>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td scope="col">Kim Alex</td>
                                              <td scope="col">Mendoza</td>
                                              <td scope="col">kalx@gmail.com</td>
                                              <td scope="col">********</td>
                                              <td>
                                                <select name="actions" id="actions">
                                                  <option value=""></option>
                                                  <option value="Edit">Edit</option>
                                                  <option value="Delete">Delete</option>
                                                </select>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
        </div>

        <div class="modal" id="addReport">
          <div class="modal-dialog ">
            <div class="modal-content">
                                <section>
                                 <div class="container">
                                   <div class="row justify-content-center align-items-center h-100">
                                     <div class="card container h-100" style="background: #f1f1f1;">

                                        <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                                      <div class="card-body">
                                        <h1>Report</h1>
                                        <form class="" action="" method="post">
                                              <div class="md-3">
                                                <p><i class="fa-solid fa-pen"></i> Title
                                                      <input class="form-control" type="text" id="reportname" name="reportname" placeholder="Enter the report title" required>
                                                    </p>
                                                <p><i class="fa-solid fa-calendar-days" class="form-control"></i> Date
                                                  <input type="date"  class="form-control datetime" name="reportdate" required>
                                                </p>
                                                
                                              </div>

                                              <div class="md-3">
                                                  <div class="mb-3">
                                                    <label for="myfile">Select a file:</label><br>
                                                      <input class="form-control" type="file" id="myfile" name="myfile">
                                                      <br>
                                                      <p>Description
                                                        <textarea rows="2" class="form-control form" name="description" required></textarea>
                                                      </p>
                                       
                                              </div>  

                                             <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
                                          </div>
                                                 
                                        </form>
                                          
                                      </div>

                                    </div> 
                                   </div>
                                 </div>
                                </section>
            </div>
          </div>
        </div>

          <div class="modal" id="addAnnounce" >
            <div class="container">
              <div class="modal-dialog">
                 <div class="modal-content">
                   <section>
                                 <div class="container">
                                   <div class="row align-items-center h-100">
                                     <div class="card container h-100" style="background: #FFFFFF;">

                                        <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: right; cursor: pointer; " ></button>
                                      <div class="card-body">
                                        <h4>Announcements</h4>
                                        <form class="" action="" method="post">
                                          <h1></h1>
                                              <div class="md-3">
                                                <p><i class="fa-solid fa-pen"></i> Title
                                                      <input class="form-control" type="text" id="announcename" name="announcename" placeholder="Enter the announcement title" required>
                                                    </p>
                                                <p><i class="fa-solid fa-calendar-days" class="form-control"></i> Date
                                                  <input type="date"  class="form-control datetime" name="reportdate" required>
                                                </p>
                                                
                                              </div>

                                              <div class="md-3">
                                                  <div class="mb-3">
                                                  
                                                      <p><i class="fa-solid fa-comment"></i> Description
                                                        <textarea rows="2" class="form-control form" name="description" required></textarea>
                                                      </p>
                                       
                                              </div>  

                                             <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
                                          </div>
                                                 
                                        </form>
                                          
                                      </div>

                                    </div> 
                                   </div>
                                 </div>
                                </section>
                 </div>             
              </div> 
            </div>         
          </div>
        </main>
    </section>

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
<script type="text/javascript" href="js/modal.js"></script>
</body>
</html>