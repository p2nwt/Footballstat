<?php
  session_start();
 

  require_once "config/db.php";
  if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'Please login!';
    header('location: pages-login.php');
}

if (isset($_SESSION['admin_login'])) {
    $admin_id = $_SESSION['admin_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Footballstat | Standings</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 
    

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">FOOTBALL STAT</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['firstname']  ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="home.php">
      <i class="bi bi-house-door"></i>
      <span>Home</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="fixtures.php">
      <i class="bi bi-calendar-day"></i>
      <span>Fixtures</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="match.php">
      <i class="bi bi-trophy"></i>
      <span>Results</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="standing.php">
      <i class="bi bi-list-ol"></i>
      <span>Standings</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="team.php">
      <i class="bi bi-people"></i>
      <span>Clubs</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="player.php">
      <i class="bi bi-person-circle"></i>
      <span>Players</span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="static.php">
      <i class="bi bi-bar-chart"></i>
      <span>Statistics</span>
    </a>
  </li><!-- End Blank Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-plus-fill"></i><span>Insert</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="insert.php">
          <i class="bi bi-circle"></i><span>Insert Lineup</span>
        </a>
      </li>
      <li>
        <a href="insert_event.php">
          <i class="bi bi-circle"></i><span>Insert Event</span>
        </a>
      </li>
      <li>
        <a href="insert_sub.php">
          <i class="bi bi-circle"></i><span>Insert Substitution</span>
        </a>
      </li>
    </ul>
  </li>

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Standings</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active"><a href="standing.php">Standings</a></li>
  
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              

              <!-- Table with stripped rows -->
              <div class="container"> 
                
                  <div class="row">
                      <div class="table-responsive">
                          <table class="table table-bordered">
                          <?php $pos='1';?>
                          <thead>
                              <tr>
                                  <th scope="col">Position</th>
                                  <th scope="col">Team</th>
                                  <th scope="col">Played</th>
                                  <th scope="col">Won</th>
                                  <th scope="col">Drawn</th>
                                  <th scope="col">Lost</th>
                                  <th scope="col">GF</th>
                                  <th scope="col">GA</th>
                                  <th scope="col">GD</th>  
                                  <th scope="col">Points</th>
                              </tr>

                          </thead>
                          <tbody>
                          <?php 
                                  $stmt = $conn->query("select distinct football_clubs.ID as TeamID,football_clubs.pnglogo as Logo,
                                  football_clubs.Name as Team,
                                    (
                                    (select count(*) from results_raw2 where Home_Club_ID = football_clubs.ID and Home_Points = 3) +
                                    (select count(*) from results_raw2 where Away_Club_ID = football_clubs.ID and Away_Points = 3)
                                    ) as Win,
                                  (
                                    (select count(*) from results_raw2 where Home_Club_ID = football_clubs.ID and Home_Points = 1) +
                                    (select count(*) from results_raw2 where Away_Club_ID = football_clubs.ID and Away_Points = 1)
                                    ) as Draw,
                                  (
                                    (select count(*) from results_raw2 where Home_Club_ID = football_clubs.ID and Home_Points = 0) +
                                    (select count(*) from results_raw2 where Away_Club_ID = football_clubs.ID and Away_Points = 0)
                                    ) as Lose,
                                    (
                                    select count(*) from results_raw2 where Home_Club_ID = football_clubs.ID or Away_Club_ID = football_clubs.ID
                                    ) as Played,
                                    (
                                    (select sum(Home_Goals_For) from results_raw2 where Home_Club_ID = football_clubs.ID) +
                                        (select sum(Away_Goals_For) from results_raw2 where Away_Club_ID = football_clubs.ID)
                                    ) as GF,
                                    (
                                    (select sum(Away_Goals_For) from results_raw2 where Home_Club_ID = football_clubs.ID) +
                                        (select sum(Home_Goals_For) from results_raw2 where Away_Club_ID = football_clubs.ID)
                                    ) as GA,
                                    (
                                    (
                                      (select sum(Home_Goals_For) from results_raw2 where Home_Club_ID = football_clubs.ID) +
                                      (select sum(Away_Goals_For) from results_raw2 where Away_Club_ID = football_clubs.ID)
                                    ) -
                                        (
                                      (select sum(Away_Goals_For) from results_raw2 where Home_Club_ID = football_clubs.ID) +
                                      (select sum(Home_Goals_For) from results_raw2 where Away_Club_ID = football_clubs.ID)
                                    )
                                    ) as GD,
                                    (
                                    (select sum(Home_Points) from results_raw2 where Home_Club_ID = football_clubs.ID) +
                                    (select sum(Away_Points) from results_raw2 where Away_Club_ID = football_clubs.ID)
                                    ) as Points
                                from
                                  football_clubs
                                    inner join results_raw2 on football_clubs.ID = results_raw2.Home_Club_ID or football_clubs.ID = results_raw2.Away_Club_ID
                                order by
                                  Points desc,
                                    GD desc,
                                    GF desc,
                                    GA desc;
                                ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                    
                                  foreach($users as $user)  {  
                              ?>
                                

                                  <tr>
                                      <td><?php echo $pos ?></td>
                                      
                                      <td> <img width="40" src="assets/img/<?php echo $user['Logo'];?>"> <?php echo "<a href='team_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>
                                      <td><?php echo $user['Played']; ?></td>
                                      <td><?php echo $user['Win']; ?></td>
                                      <td><?php echo $user['Draw']; ?></td>
                                      <td><?php echo $user['Lose']; ?></td>
                                      <td><?php echo $user['GF']; ?></td>
                                      <td><?php echo $user['GA']; ?></td>
                                      <td><?php echo $user['GD']; ?></td>
                                      <td><?php echo $user['Points']; ?></td>
                                      <?php $pos++;?>          
                                  </tr>
                                      
                                  
                              <?php } 
                            
                            } ?>           
                          </tbody>
                          </table>  
                         
                      </div>
                  </div>
              </div>
    
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script> 
    

    

</body>

</html>