<?php
  session_start();
  require_once "config/db.php";

  include_once 'database.php'; 


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

  if (isset($_GET['id'])) {
  $id = (isset($_GET['id'])) ? $_GET['id'] : '';
  }
  $sql = mysqli_query($connection,"SELECT player.Player_Name AS Name,
  team_player.Team_ID AS TeamID,
  team_player.Number AS Number,
  football_clubs.Name AS Club,
  position.Main_Position_Name AS Position,
  player.Nationality AS Nationality,
  player.Date_of_Birth AS DateofBirth,
  player.Playerpng AS playerpng
  FROM team_player
  INNER JOIN player ON team_player.Player_ID = player.Player_ID
  INNER JOIN football_clubs ON team_player.Team_ID = football_clubs.ID
  INNER JOIN position ON team_player.Position_ID = position.Position_ID
  WHERE team_player.Player_ID = $id;");
  $key= mysqli_fetch_array($sql);
 
  $sql2 = mysqli_query($connection,"SELECT DISTINCT player.Player_Name AS Name,
  (SELECT COUNT(*) 
   FROM fixture_player WHERE fixture_player.Lineup_ID = 1 AND fixture_player.Player_ID = $id)AS Lineup,
   (SELECT COUNT(*) 
   FROM fixture_player WHERE fixture_player.Lineup_ID = 2 AND fixture_player.Player_ID = $id)AS Sub,
   (SELECT COUNT(*) 
   FROM fixture_sub WHERE fixture_sub.Playerin_ID = $id )AS SubIn,
   (SELECT COUNT(*) 
   FROM fixture_sub WHERE fixture_sub.Playerout_ID = $id )AS SubOut,
    (SELECT COUNT(*) 
   FROM fixture_event WHERE fixture_event.Event_ID=1 AND fixture_event.Player_ID = $id )AS Goal1,
    (SELECT COUNT(*) 
   FROM fixture_event WHERE fixture_event.Event_ID=8 AND fixture_event.Player_ID = $id )AS Goal2,
   (SELECT COUNT(*) 
   FROM fixture_event WHERE fixture_event.Event_ID=2 AND fixture_event.Player_ID = $id )AS Assist,
   (SELECT COUNT(*) 
   FROM fixture_event WHERE fixture_event.Event_ID=3 AND fixture_event.Player_ID = $id )AS Yellow,
   (SELECT COUNT(*) 
   FROM fixture_event WHERE fixture_event.Event_ID=4 AND fixture_event.Player_ID = $id )AS Red,
   (SELECT COUNT(*) 
   FROM fixture_event WHERE fixture_event.Event_ID=7 AND fixture_event.Player_ID = $id )AS YellowRed,
   (SELECT Lineup +SubIn )AS Game,
   (SELECT Goal1 + Goal2 ) AS Goal,
   (SELECT Yellow + YellowRed ) AS Yellow,
    (SELECT Red + YellowRed ) AS Red
  FROM fixture_player
  INNER JOIN player ON fixture_player.Player_ID = player.Player_ID
  WHERE player.Player_ID =$id;
  ");
  $key2= mysqli_fetch_assoc($sql2);

  

  


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Footballstat | Players</title>
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
      <h1>Player</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item"><a href="player.php">Player</a></li>
          <li class="breadcrumb-item active"> <?php echo $key["Name"] ;?></li>
  
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
  
        <div class="col-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-sm-4">
              <div class="card info-card sales-card">
                
               
                <div class="card-body">
                  <h5 class="card-title"><?php echo $key["Name"]?> <span>| <?php echo $key["Number"]?></span></h5>

                  <img width="150" style="vertical-align:middle;margin:0px 80px 10px" src="assets/img/<?php echo $key["playerpng"];?>">  
                  
                  <div class="ps-6">
                      <span class="text-dark normal pt-1 fw-bold">CLUB :</span> <span class="text-muted big pt-2 ps-1"><?php echo "<a href='team_info.php?id={$key['TeamID']}'style='text-decoration:none'>" . $key["Club"] . "</a>" ;?></span>
                  </div>
                  <div class="ps-6">
                      <span class="text-dark normal pt-1 fw-bold">POSITION :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Position"]?></span>
                    </div>
                </div>

              </div>
            </div>
            <div class="col-sm-8">

              <div class="card info-card customers-card">

                

                <div class="card-body">
                  <h5 class="card-title">Personal Details</h5>
                  <div class="ps-6">
                      <span class="text-dark normal pt-1 fw-bold">Nationality:</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Nationality"]?> </span>
                      
                  </div>
                  <div class="ps-6">
                      
                      <span class="text-dark normal pt-1 fw-bold">Date of Birth:</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["DateofBirth"]?></span>
                  </div>
                  <hr>
                  <h5 class="card-title">Statistics</h5>
                  <table class="table table-striped">
                  <thead>
                  <tr>
                    <th scope="col">Game</th>
                    <th scope="col">Line Up</th>
                    <th scope="col">On Bench</th>
                    <th scope="col">In</th>
                    <th scope="col">Out</th>
                    <th scope="col">Goal</th>
                    <th scope="col">Yellow</th>
                    <th scope="col">Red</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
               
                    <td><?php echo $key2["Game"]?></td>
                    <td><?php echo $key2["Lineup"]?></td>
                    <td><?php echo $key2["Sub"]?></td>
                    <td><?php echo $key2["SubIn"]?></td>
                    <td><?php echo $key2["SubOut"]?></td>
                    <td><?php echo $key2["Goal"]?></td>
                    <td><?php echo $key2["Yellow"]?></td>
                    <td><?php echo $key2["Red"]?></td>
                  </tr>
           
                </tbody>
                  </table>  
                  
                </div>
              </div>
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