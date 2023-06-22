<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/admin.ico" />
        <title>Saint Vincent Ferrer Church | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/dashboard.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">Saint Vincent Parish</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login-rev.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- sidebar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'dashboard')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link tablinks" onclick="openCity(event, 'patron')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Patrons
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'announcement')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                                Announcement
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'report')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-microphone"></i></div>
                                Report
                            </a>

                            <div class="sb-sidenav-menu-heading">Credentials</div>
                            <a onclick="openCity(event, 'forms')" class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                                Forms
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'baptismal')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'death')" href="#">Death</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'kumpil')" href="#">Kumpil</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'marriage')" href="#">Marriage</a>
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Donations</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'transaction')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>
                                Transactions
                            </a>

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'charts')" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">

                <!-- Start of the tabs -->
                <main  class="tabcontent" id="dashboard">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <hr>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Integration Specialist</td>
                                            <td>Tokyo</td>
                                            <td>55</td>
                                            <td>2010/10/14</td>
                                            <td>$327,900</td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Javascript Developer</td>
                                            <td>San Francisco</td>
                                            <td>39</td>
                                            <td>2009/09/15</td>
                                            <td>$205,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>Software Engineer</td>
                                            <td>Edinburgh</td>
                                            <td>23</td>
                                            <td>2008/12/13</td>
                                            <td>$103,600</td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>30</td>
                                            <td>2008/12/19</td>
                                            <td>$90,560</td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2013/03/03</td>
                                            <td>$342,000</td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>Regional Director</td>
                                            <td>San Francisco</td>
                                            <td>36</td>
                                            <td>2008/10/16</td>
                                            <td>$470,600</td>
                                        </tr>
                                        <tr>
                                            <td>Haley Kennedy</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>London</td>
                                            <td>43</td>
                                            <td>2012/12/18</td>
                                            <td>$313,500</td>
                                        </tr>
                                        <tr>
                                            <td>Tatyana Fitzpatrick</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>19</td>
                                            <td>2010/03/17</td>
                                            <td>$385,750</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Silva</td>
                                            <td>Marketing Designer</td>
                                            <td>London</td>
                                            <td>66</td>
                                            <td>2012/11/27</td>
                                            <td>$198,500</td>
                                        </tr>
                                        <tr>
                                            <td>Paul Byrd</td>
                                            <td>Chief Financial Officer (CFO)</td>
                                            <td>New York</td>
                                            <td>64</td>
                                            <td>2010/06/09</td>
                                            <td>$725,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gloria Little</td>
                                            <td>Systems Administrator</td>
                                            <td>New York</td>
                                            <td>59</td>
                                            <td>2009/04/10</td>
                                            <td>$237,500</td>
                                        </tr>
                                        <tr>
                                            <td>Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13</td>
                                            <td>$132,000</td>
                                        </tr>
                                        <tr>
                                            <td>Dai Rios</td>
                                            <td>Personnel Lead</td>
                                            <td>Edinburgh</td>
                                            <td>35</td>
                                            <td>2012/09/26</td>
                                            <td>$217,500</td>
                                        </tr>
                                        <tr>
                                            <td>Jenette Caldwell</td>
                                            <td>Development Lead</td>
                                            <td>New York</td>
                                            <td>30</td>
                                            <td>2011/09/03</td>
                                            <td>$345,000</td>
                                        </tr>
                                        <tr>
                                            <td>Yuri Berry</td>
                                            <td>Chief Marketing Officer (CMO)</td>
                                            <td>New York</td>
                                            <td>40</td>
                                            <td>2009/06/25</td>
                                            <td>$675,000</td>
                                        </tr>
                                        <tr>
                                            <td>Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr>
                                            <td>Doris Wilder</td>
                                            <td>Sales Assistant</td>
                                            <td>Sidney</td>
                                            <td>23</td>
                                            <td>2010/09/20</td>
                                            <td>$85,600</td>
                                        </tr>
                                        <tr>
                                            <td>Angelica Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09</td>
                                            <td>$1,200,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gavin Joyce</td>
                                            <td>Developer</td>
                                            <td>Edinburgh</td>
                                            <td>42</td>
                                            <td>2010/12/22</td>
                                            <td>$92,575</td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Chang</td>
                                            <td>Regional Director</td>
                                            <td>Singapore</td>
                                            <td>28</td>
                                            <td>2010/11/14</td>
                                            <td>$357,650</td>
                                        </tr>
                                        <tr>
                                            <td>Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07</td>
                                            <td>$206,850</td>
                                        </tr>
                                        <tr>
                                            <td>Fiona Green</td>
                                            <td>Chief Operating Officer (COO)</td>
                                            <td>San Francisco</td>
                                            <td>48</td>
                                            <td>2010/03/11</td>
                                            <td>$850,000</td>
                                        </tr>
                                        <tr>
                                            <td>Shou Itou</td>
                                            <td>Regional Marketing</td>
                                            <td>Tokyo</td>
                                            <td>20</td>
                                            <td>2011/08/14</td>
                                            <td>$163,000</td>
                                        </tr>
                                        <tr>
                                            <td>Michelle House</td>
                                            <td>Integration Specialist</td>
                                            <td>Sidney</td>
                                            <td>37</td>
                                            <td>2011/06/02</td>
                                            <td>$95,400</td>
                                        </tr>
                                        <tr>
                                            <td>Suki Burks</td>
                                            <td>Developer</td>
                                            <td>London</td>
                                            <td>53</td>
                                            <td>2009/10/22</td>
                                            <td>$114,500</td>
                                        </tr>
                                        <tr>
                                            <td>Prescott Bartlett</td>
                                            <td>Technical Author</td>
                                            <td>London</td>
                                            <td>27</td>
                                            <td>2011/05/07</td>
                                            <td>$145,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gavin Cortez</td>
                                            <td>Team Leader</td>
                                            <td>San Francisco</td>
                                            <td>22</td>
                                            <td>2008/10/26</td>
                                            <td>$235,500</td>
                                        </tr>
                                        <tr>
                                            <td>Martena Mccray</td>
                                            <td>Post-Sales support</td>
                                            <td>Edinburgh</td>
                                            <td>46</td>
                                            <td>2011/03/09</td>
                                            <td>$324,050</td>
                                        </tr>
                                        <tr>
                                            <td>Unity Butler</td>
                                            <td>Marketing Designer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/12/09</td>
                                            <td>$85,675</td>
                                        </tr>
                                        <tr>
                                            <td>Howard Hatfield</td>
                                            <td>Office Manager</td>
                                            <td>San Francisco</td>
                                            <td>51</td>
                                            <td>2008/12/16</td>
                                            <td>$164,500</td>
                                        </tr>
                                        <tr>
                                            <td>Hope Fuentes</td>
                                            <td>Secretary</td>
                                            <td>San Francisco</td>
                                            <td>41</td>
                                            <td>2010/02/12</td>
                                            <td>$109,850</td>
                                        </tr>
                                        <tr>
                                            <td>Vivian Harrell</td>
                                            <td>Financial Controller</td>
                                            <td>San Francisco</td>
                                            <td>62</td>
                                            <td>2009/02/14</td>
                                            <td>$452,500</td>
                                        </tr>
                                        <tr>
                                            <td>Timothy Mooney</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>37</td>
                                            <td>2008/12/11</td>
                                            <td>$136,200</td>
                                        </tr>
                                        <tr>
                                            <td>Jackson Bradshaw</td>
                                            <td>Director</td>
                                            <td>New York</td>
                                            <td>65</td>
                                            <td>2008/09/26</td>
                                            <td>$645,750</td>
                                        </tr>
                                        <tr>
                                            <td>Olivia Liang</td>
                                            <td>Support Engineer</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2011/02/03</td>
                                            <td>$234,500</td>
                                        </tr>
                                        <tr>
                                            <td>Bruno Nash</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03</td>
                                            <td>$163,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sakura Yamamoto</td>
                                            <td>Support Engineer</td>
                                            <td>Tokyo</td>
                                            <td>37</td>
                                            <td>2009/08/19</td>
                                            <td>$139,575</td>
                                        </tr>
                                        <tr>
                                            <td>Thor Walton</td>
                                            <td>Developer</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2013/08/11</td>
                                            <td>$98,540</td>
                                        </tr>
                                        <tr>
                                            <td>Finn Camacho</td>
                                            <td>Support Engineer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/07/07</td>
                                            <td>$87,500</td>
                                        </tr>
                                        <tr>
                                            <td>Serge Baldwin</td>
                                            <td>Data Coordinator</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2012/04/09</td>
                                            <td>$138,575</td>
                                        </tr>
                                        <tr>
                                            <td>Zenaida Frank</td>
                                            <td>Software Engineer</td>
                                            <td>New York</td>
                                            <td>63</td>
                                            <td>2010/01/04</td>
                                            <td>$125,250</td>
                                        </tr>
                                        <tr>
                                            <td>Zorita Serrano</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>56</td>
                                            <td>2012/06/01</td>
                                            <td>$115,000</td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Acosta</td>
                                            <td>Junior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>43</td>
                                            <td>2013/02/01</td>
                                            <td>$75,650</td>
                                        </tr>
                                        <tr>
                                            <td>Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr>
                                            <td>Hermione Butler</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2011/03/21</td>
                                            <td>$356,250</td>
                                        </tr>
                                        <tr>
                                            <td>Lael Greer</td>
                                            <td>Systems Administrator</td>
                                            <td>London</td>
                                            <td>21</td>
                                            <td>2009/02/27</td>
                                            <td>$103,500</td>
                                        </tr>
                                        <tr>
                                            <td>Jonas Alexander</td>
                                            <td>Developer</td>
                                            <td>San Francisco</td>
                                            <td>30</td>
                                            <td>2010/07/14</td>
                                            <td>$86,500</td>
                                        </tr>
                                        <tr>
                                            <td>Shad Decker</td>
                                            <td>Regional Director</td>
                                            <td>Edinburgh</td>
                                            <td>51</td>
                                            <td>2008/11/13</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Bruce</td>
                                            <td>Javascript Developer</td>
                                            <td>Singapore</td>
                                            <td>29</td>
                                            <td>2011/06/27</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- NEW TABS -->
                <main  class="tabcontent" id="forms">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Forms</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Forms</li>
                        </ol>
                        <hr>
                        
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
                                        <td scope="col">Type</td>
                                        <td scope="col">Action</td>
                                      </tr>
                                    </thead>
                                      <tbody>
                                        <tr>
                                          <td>Image.jpg</td>
                                          <td>06/20/23</td>
                                          <td>Aproved</td>
                                          <td>Kumpil</td>
                                          <td>
                                            <select name="actions" id="actions">
                                              <option value=""></option>
                                              <option value="View">View</option>
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
                </main>

                <main  class="tabcontent" id="baptismal">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Baptismal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Baptismal</li>
                        </ol>
                    </div>
                </main>

                 <main  class="tabcontent" id="death">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Death</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Death</li>
                        </ol>
                    </div>
                </main>

                <main  class="tabcontent" id="kumpil">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kumpil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kumpil</li>
                        </ol>
                    </div>
                </main>

                <main  class="tabcontent" id="marriage">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Marriage</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Marriage</li>
                        </ol>
                    </div>
                </main>

                <main  class="tabcontent" id="transaction">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Transactions</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Transactions</li>
                        </ol>
                        <hr>
                        <div class="container py-5 ">
                          <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDonate" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Create New</button>
                                <table class="table">
                                      <thead>
                                        <tr class= table-dark>
                                          <td scope="col">Firstname</td>
                                          <td scope="col">Lastname</td>
                                          <td scope="col">Amount</td>
                                          <td scope="col">Date</td>
                                          <td scope="col">Receipt</td>
                                          <td scope="col">Event</td>
                                          <td scope="col">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <th scope="row">Kim</th>
                                          <td scope="row">Alex</td>
                                          <td scope="row">1000</td>
                                          <td scope="row">02/28/23</td>
                                          <td scope="row">Communion</td>
                                          <td scope="row">Communion.jpg</td>
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
                </main>

                  <main  class="tabcontent" id="announcement">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Announcement</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Announcement</li>
                        </ol>
                        <hr>
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
                                          <td scope="col">Action</td>
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
                </main>

                <main class="tabcontent" id="patron">
                   <div class="container-fluid px-4">
                        <h1 class="mt-4">Patrons</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Patrons</li>
                        </ol>
                      <hr>
                  <div class="container py-5 ">
                          <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-200" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table">
                                      <thead>
                                        <tr class= table-dark>
                                          <td scope="col">Firstname</td>
                                          <td scope="col">Lastname</td>
                                          <td scope="col">Password</td>
                                          <td scope="col">User Type</td>
                                          <td scope="col" colspan="4">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <th scope="row">John</th>
                                          <td>Brix</td>
                                          <td>******</td>
                                          <td>Customer</td>
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
                </main>

                <main  class="tabcontent" id="report">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                        <hr>
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
                                              <option value="View">View</option>
                                              <option value="Approved">Approved</option>
                                              <option value="Disapproved">Disapproved</option>
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
                                          <option value="View">View</option>
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
                </main>

                 <main class="tabcontent" id="charts">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Charts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Charts</li>
                        </ol>
                        <hr>
                        <div class="card mb-4">
                            <div class="card-body">
                                Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                                <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Pie Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

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

        <div class="modal" id="addDonate">
          <div class="modal-dialog ">
            <div class="modal-content">
                                <section>
                                 <div class="container">
                                   <div class="row justify-content-center align-items-center h-100">
                                     <div class="card container h-100" style="background: #f1f1f1;">

                                        <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                                      <div class="card-body">
                                        <h1>Transactions</h1>
                                        <hr>
                                        <form class="" action="" method="post">

                                          <div class="md-3">
                                              <p><i class="fa-solid fa-user"></i> Firstname
                                                      <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter firstname" required>
                                                    </p>

                                                <p><i class="fa-solid fa-user"></i> Lastname
                                                  <input class="form-control" type="text" id="lname" name="lname" placeholder="Enter lastname" required>
                                                </p>
                                                <p><i class="fa-solid fa-pen"></i> Amount
                                                      <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter the amount" required>
                                                    </p>
                                              </div>
                                              
                                              <div class="md-3">
                                                  <div class="mb-3">
                                                    <label for="myfile">Proof of receipt:</label><br>
                                                      <input class="form-control" type="file" id="myfile" name="myfile">
                                              </div>  

                                              <div class="md-3">
                                                <div class="mb-3">
                                                  <label for="myfile">Type of Event</label><br>
                                                  <select class="form-control" name="actions" id="actions">
                                                    <option value=""></option>
                                                    <option value="Kumpil">Kumpil</option>
                                                    <option value="Baptismal">Baptismal</option>
                                                    <option value="Communion">Communion</option>
                                                    <option value="Marriage">Marriage</option>
                                                    <option value="Funeral">Funeral</option>
                                                  </select>
                                                </div>
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
                  
 <script>
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
</script>


                <!-- END NG MGA TABS -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/dashboard.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
         <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

    </body>
</html>
