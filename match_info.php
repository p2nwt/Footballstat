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

  if (isset($_GET['mid'])) {
  $id = (isset($_GET['mid'])) ? $_GET['mid'] : '';
  }

  $sql = mysqli_query($connection,"SELECT 
  results_raw2.ID AS ID,
  football_clubs.Name AS Home_Team,
  team2.Name AS Away_Team,
  schedule.Date AS Date,
  schedule.Time AS Time,
  schedule.Match_Number_ID  AS Number,
  schedule.Match_NO_ID AS Matchday,
  results_raw2.Home_Goals_For AS ScoreHome,
  results_raw2.Away_Goals_For AS ScoreAway,
  results_raw2.Home_Club_ID AS Home_ID,
  results_raw2.Away_Club_ID AS Away_ID,
  football_clubs.pnglogo AS Home_Logo,
  team2.pnglogo AS Away_Logo
  FROM
  results_raw2
  INNER JOIN football_clubs on results_raw2.Home_Club_ID = football_clubs.ID
  INNER JOIN football_clubs team2 on results_raw2.Away_Club_ID = team2.ID
  INNER JOIN schedule on results_raw2.ID= schedule.ID
  WHERE schedule.ID = $id ;");
  $key= mysqli_fetch_assoc($sql);


 
  $t1id= mysqli_real_escape_string($connection, $_GET["team1"]);
  $t2id= mysqli_real_escape_string($connection, $_GET["team2"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Footballstat | Results </title>
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
      <h1>Results</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item"><a href="match.php">Match</a></li>
          <li class="breadcrumb-item active"> <?php echo $key["Home_Team"] .' : '.$key["Away_Team"];?></li>
         

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="col-lg-12">
        <div class="row">
       
              <div class="col-12">
                
                <div class="card info-card sales-card">
                <h5 class="card-title" style=" margin:0px 20px">Matchday <?php echo $key["Matchday"];?> <span>| NO. <?php echo $key["Number"];?></span></h5>
                  <div class="d-flex flex-column align-items-center">
                    <h5 class="card-title" ><?php echo "<a href='team_info.php?id={$key['Home_ID']}'style='text-decoration:none'>" . $key["Home_Team"]  ."</a>" ;?>
                    <span>VS</span>  <?php echo "<a href='team_info.php?id={$key['Away_ID']}'style='text-decoration:none'>" . $key["Away_Team"] . "</a>" ;?>
                  </div>
                  <div class="d-flex flex-column align-items-center">
                  <div class=" d-flex flex-column align-items-center">
                  <span class="text-secondary normal fw-bold" style="vertical-align:middle; margin:0px 150px 0px"><span>KICKOFF </span>  </div> 
                  <div class="  d-flex flex-column align-items-center">
                  <span class="text-secondary normal  fw-bold" style="vertical-align:middle; margin:0px 150px 0px"> <?php echo $key["Time"]?> </div> 
                                 
                    
                  <div class="">
                      <img width="100" style="vertical-align:middle; margin:0px 85px 0px" src="assets/img/<?php echo $key["Home_Logo"];?>">
                      <img width="100"style="vertical-align:middle; margin:0px 85px 0px" src="assets/img/<?php echo $key["Away_Logo"];?>"> 
                    </div> 
                  </div>
                  <div class="card-body profile-card pt-1 d-flex flex-column align-items-center">
                  <span class="text-black big  fw-bold"><?php echo $key["ScoreHome"]?> <span>VS  </span><?php echo $key["ScoreAway"]?>
                  </div>
 
                  <hr>
                  <div class="d-flex flex-column align-items-center">
                  <h7><span class="text-primary normal  fw-bold" style=" margin:20px 150px 0px">KO</span><span class="text-primary normal  fw-bold" style=" margin:20px 350px 0px">HT</span><span class="text-primary normal  fw-bold" style=" margin:20px 150px 0px">FT</span></h7>
                  </div>   
                  <div class="">   
                    
                  <img width="40"style="vertical-align:middle; margin:0px 20px 0px"src="assets/img/<?php echo $key["Home_Logo"] ?>"></div> 
                  
                  <div class="tab" style="width: 3px; 
                    background-color: gainsboro; 
                    height: 10px; 
                    position: relative;
                    left: 50%;"></div>
                   
                  
                  <div class= "line" style=" width: 100%;
                    background-color: gainsboro;
                    border: none;
                    height: 3px;"></div>
                  <div class="tab" style="width: 3px; 
                    background-color: gainsboro; 
                    height: 10px; 
                    position: relative;
                    left: 50%;"></div>
                  <div class="card-body  pt-1">  
                  <img width="40"style="vertical-align:middle; margin:0px 0px 0px" src="assets/img/<?php echo $key["Away_Logo"] ?>"></div> 

              
                  <div class="contents">
                    <?php
                        $goal1= "SELECT distinct fixture_event.Schedule_ID AS ID,
                        fixture_event.Minute AS Minute,
                        event.Event_Name AS Event,
                        football_clubs.Name AS Team,
                        player.Player_Name AS Player,
                        team_player.Number AS Number
                        FROM fixture_event
                        INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                         INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                         INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                         INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                        WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 1 AND fixture_event.Team_ID=$t1id";
                        $red1 = "SELECT distinct fixture_event.Schedule_ID AS ID,
                        fixture_event.Minute AS Minute,
                        event.Event_Name AS Event,
                        football_clubs.Name AS Team,
                        player.Player_Name AS Player,
                        team_player.Number AS Number
                        FROM fixture_event
                        INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                         INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                         INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                         INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                        WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 4 AND fixture_event.Team_ID=$t1id";
                        $yellow1= "SELECT distinct fixture_event.Schedule_ID AS ID,
                        fixture_event.Minute AS Minute,
                        event.Event_Name AS Event,
                        football_clubs.Name AS Team,
                        player.Player_Name AS Player,
                        team_player.Number AS Number
                        FROM fixture_event
                        INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                         INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                         INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                         INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                        WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 3 AND fixture_event.Team_ID=$t1id";
                        $yellowred1= "SELECT distinct fixture_event.Schedule_ID AS ID,
                        fixture_event.Minute AS Minute,
                        event.Event_Name AS Event,
                        football_clubs.Name AS Team,
                        player.Player_Name AS Player,
                        team_player.Number AS Number
                        FROM fixture_event
                        INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                         INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                         INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                         INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                        WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 7 AND fixture_event.Team_ID=$t1id";
                         $owngoal1= "SELECT distinct fixture_event.Schedule_ID AS ID,
                         fixture_event.Minute AS Minute,
                         event.Event_Name AS Event,
                         football_clubs.Name AS Team,
                         player.Player_Name AS Player,
                         team_player.Number AS Number
                         FROM fixture_event
                         INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                          INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                          INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                          INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                         WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 5 AND fixture_event.Team_ID=$t1id";
                         $penaltygoal1= "SELECT distinct fixture_event.Schedule_ID AS ID,
                         fixture_event.Minute AS Minute,
                         event.Event_Name AS Event,
                         football_clubs.Name AS Team,
                         player.Player_Name AS Player,
                         team_player.Number AS Number
                         FROM fixture_event
                         INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                          INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                          INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                          INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                         WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 8 AND fixture_event.Team_ID=$t1id";
                         $misspenalty1= "SELECT distinct fixture_event.Schedule_ID AS ID,
                         fixture_event.Minute AS Minute,
                         event.Event_Name AS Event,
                         football_clubs.Name AS Team,
                         player.Player_Name AS Player,
                         team_player.Number AS Number
                         FROM fixture_event
                         INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                          INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                          INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                          INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                         WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 6 AND fixture_event.Team_ID=$t1id";
                         $sub1= "SELECT distinct fixture_sub.ID AS FixID,
                         fixture_sub.Schedule_ID AS ID,
                         fixture_sub.Minute AS Minute,
                         football_clubs.Name AS Team,
                         player.Player_Name AS PlayerIn,
                         player2.Player_Name AS PlayerOut,
                         team_player.Number AS Number1,
                         number2.Number AS Number2
                         FROM fixture_sub
                          INNER JOIN schedule ON fixture_sub.Schedule_ID = schedule.ID
                          INNER JOIN player ON fixture_sub.Playerin_ID = player.Player_ID
                          INNER JOIN player player2 ON fixture_sub.Playerout_ID = player2.Player_ID
                          INNER JOIN football_clubs ON fixture_sub.Team_ID = football_clubs.ID
                          INNER JOIN team_player ON fixture_sub.Playerin_ID = team_player.Player_ID
                           INNER JOIN team_player number2 ON fixture_sub.Playerout_ID = number2.Player_ID
                          WHERE fixture_sub.Schedule_ID = $id AND  fixture_sub.Team_ID = $t1id
";
                        $goal11= mysqli_query($connection, $goal1);  
                        while($row1 = $goal11-> fetch_assoc()){
                            echo "<img src='assets/img/ball.png' style=' width: 15px; top: 400px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top:405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $yellow11= mysqli_query($connection, $yellow1);  
                        while($row1 = $yellow11-> fetch_assoc()){
                            echo "<img src='assets/img/yellow.png' style=' width: 20px; top: 380px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $red11= mysqli_query($connection, $red1);  
                        while($row1 = $red11-> fetch_assoc()){
                            echo "<img src='assets/img/red.png' style=' width: 20px; top: 380px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $yellowred11= mysqli_query($connection, $yellowred1);  
                        while($row1 = $yellowred11-> fetch_assoc()){
                            echo "<img src='assets/img/yellowred.png' style=' width: 20px; top: 380px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $penaltygoal11= mysqli_query($connection, $penaltygoal1);  
                        while($row1 = $penaltygoal11-> fetch_assoc()){
                            echo "<img src='assets/img/penaltygoal.png' style=' width: 20px; top: 400px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $owngoal11= mysqli_query($connection, $owngoal1);  
                        while($row1 = $owngoal11-> fetch_assoc()){
                            echo "<img src='assets/img/owngoal.png' style=' width: 15px; top: 400px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $misspenalty11= mysqli_query($connection, $misspenalty1);  
                        while($row1 = $misspenalty11-> fetch_assoc()){
                            echo "<img src='assets/img/misspenalty.png' style=' width: 20px; top: 400px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $sub11= mysqli_query($connection, $sub1);  
                        while($row1 = $sub11-> fetch_assoc()){
                            echo "<img src='assets/img/sub.png' style=' width: 17px; top: 360px; position: absolute;border: none; left:"  . 4+$row1["Minute"] . "% '  data-bs-toggle='tooltip' data-bs-placement='top' title='". ' ('.$row1["Minute"].")".' IN: ' .$row1["PlayerIn"].'('.$row1["Number1"].')'.' OUT:'.$row1["PlayerOut"].'('.$row1["Number2"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $goal2= "SELECT distinct fixture_event.Schedule_ID AS ID,
                        fixture_event.Minute AS Minute,
                        event.Event_Name AS Event,
                        football_clubs.Name AS Team,
                        player.Player_Name AS Player,
                        team_player.Number AS Number
                        FROM fixture_event
                        INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                         INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                         INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                         INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                        WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 1 AND fixture_event.Team_ID=$t2id";
                        $red2 = "SELECT distinct fixture_event.Schedule_ID AS ID,
                        fixture_event.Minute AS Minute,
                        event.Event_Name AS Event,
                        football_clubs.Name AS Team,
                        player.Player_Name AS Player,
                        team_player.Number AS Number
                        FROM fixture_event
                        INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                         INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                         INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                         INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                        WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 4 AND fixture_event.Team_ID=$t2id";
                        $yellow2= "SELECT distinct fixture_event.Schedule_ID AS ID,
                        fixture_event.Minute AS Minute,
                        event.Event_Name AS Event,
                        football_clubs.Name AS Team,
                        player.Player_Name AS Player,
                        team_player.Number AS Number
                        FROM fixture_event
                        INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                         INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                         INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                         INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                        WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 3 AND fixture_event.Team_ID=$t2id";
                        $yellowred2= "SELECT distinct fixture_event.Schedule_ID AS ID,
                        fixture_event.Minute AS Minute,
                        event.Event_Name AS Event,
                        football_clubs.Name AS Team,
                        player.Player_Name AS Player,
                        team_player.Number AS Number
                        FROM fixture_event
                        INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                         INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                         INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                         INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                        WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 7 AND fixture_event.Team_ID=$t2id";
                         $owngoal2= "SELECT distinct fixture_event.Schedule_ID AS ID,
                         fixture_event.Minute AS Minute,
                         event.Event_Name AS Event,
                         football_clubs.Name AS Team,
                         player.Player_Name AS Player,
                         team_player.Number AS Number
                         FROM fixture_event
                         INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                          INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                          INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                          INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                         WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 5 AND fixture_event.Team_ID=$t2id";
                         $penaltygoal2= "SELECT distinct fixture_event.Schedule_ID AS ID,
                         fixture_event.Minute AS Minute,
                         event.Event_Name AS Event,
                         football_clubs.Name AS Team,
                         player.Player_Name AS Player,
                         team_player.Number AS Number
                         FROM fixture_event
                         INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                          INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                          INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                          INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                         WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 8 AND fixture_event.Team_ID=$t2id";
                         $misspenalty2= "SELECT distinct fixture_event.Schedule_ID AS ID,
                         fixture_event.Minute AS Minute,
                         event.Event_Name AS Event,
                         football_clubs.Name AS Team,
                         player.Player_Name AS Player,
                         team_player.Number AS Number
                         FROM fixture_event
                         INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                          INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                          INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                          INNER JOIN team_player ON fixture_event.Player_ID = team_player.Player_ID
                         WHERE fixture_event.Schedule_ID = $id AND fixture_event.Event_ID = 6 AND fixture_event.Team_ID=$t2id";
                         $sub2= "SELECT distinct fixture_sub.Schedule_ID AS ID,fixture_sub.ID AS FixID,
                         fixture_sub.Minute AS Minute,
                         football_clubs.Name AS Team,
                         player.Player_Name AS PlayerIn,
                         player2.Player_Name AS PlayerOut,
                         team_player.Number AS Number1,
                         number2.Number AS Number2
                         FROM fixture_sub
                          INNER JOIN schedule ON fixture_sub.Schedule_ID = schedule.ID
                          INNER JOIN player ON fixture_sub.Playerin_ID = player.Player_ID
                          INNER JOIN player player2 ON fixture_sub.Playerout_ID = player2.Player_ID
                          INNER JOIN football_clubs ON fixture_sub.Team_ID = football_clubs.ID
                          INNER JOIN team_player ON fixture_sub.Playerin_ID = team_player.Player_ID
                           INNER JOIN team_player number2 ON fixture_sub.Playerout_ID = number2.Player_ID
                          WHERE fixture_sub.Schedule_ID = $id AND  fixture_sub.Team_ID = $t2id
";
                        $goal21= mysqli_query($connection, $goal2);  
                        while($row1 = $goal21-> fetch_assoc()){
                            echo "<img src='assets/img/ball.png' style=' width: 15px; top: 430px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top:405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $yellow21= mysqli_query($connection, $yellow2);  
                        while($row1 = $yellow21-> fetch_assoc()){
                            echo "<img src='assets/img/yellow.png' style=' width: 20px; top: 450px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $red21= mysqli_query($connection, $red2);  
                        while($row1 = $red21-> fetch_assoc()){
                            echo "<img src='assets/img/red.png' style=' width: 20px; top: 450px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $yellowred21= mysqli_query($connection, $yellowred2);  
                        while($row1 = $yellowred21-> fetch_assoc()){
                            echo "<img src='assets/img/yellowred.png' style=' width: 20px; top: 450px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $penaltygoal21= mysqli_query($connection, $penaltygoal2);  
                        while($row1 = $penaltygoal21-> fetch_assoc()){
                            echo "<img src='assets/img/penaltygoal.png' style=' width: 20px; top: 430px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $owngoal21= mysqli_query($connection, $owngoal2);  
                        while($row1 = $owngoal21-> fetch_assoc()){
                            echo "<img src='assets/img/owngoal.png' style=' width: 15px; top: 430px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $misspenalty21= mysqli_query($connection, $misspenalty2);  
                        while($row1 = $misspenalty21-> fetch_assoc()){
                            echo "<img src='assets/img/misspenalty.png' style=' width: 20px; top: 430px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='".$row1["Event"]. ' ('.$row1["Minute"].")".' : ' .$row1["Player"].'('.$row1["Number"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                        $sub21= mysqli_query($connection, $sub2);  
                        while($row1 = $sub21-> fetch_assoc()){
                            echo "<img src='assets/img/sub.png' style=' width: 17px; top: 470px; position: absolute;border: none; left:"  . 4+$row1["Minute"] .  "%'  data-bs-toggle='tooltip' data-bs-placement='top' title='". ' ('.$row1["Minute"].")".' IN: ' .$row1["PlayerIn"].'('.$row1["Number1"].')'.' OUT:'.$row1["PlayerOut"].'('.$row1["Number2"].')'."'>"  ;
                           
                            echo "<span class='text-primary small pt-2 fw-bold' style=' width: 20px; top: 405px; position: absolute;border: none; left:"  . 4+$row1["Minute"].  "%'>".$row1["Minute"]."</span> ";
                        }
                    ?>             
                  </div>

                </div>

            </div>
            
        </div>
               
        </div>
      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $key["Home_Team"]?></span></h5>
              
              <!-- Default Tabs --> 
              <ul class="nav nav-tabs nav-tabs-bordered" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Lineup</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Bench</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Changes</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-12">  
                    <div class="row">
                      <div class="card info-card sales-card">
                   
                        <table class="table table-striped">
                        <thead>
                        <tr><th scope="col">Number</th>
                    <th scope="col">Name</th>         
                    <th scope="col">Position</th>
      
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                                  $stmt = $conn->query("SELECT distinct fixture_player.Schedule_ID AS ID,
                                  fixture_player.Player_ID AS pID,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS Player,
                                  position.Main_Position_Name AS Position,
                                  team_player.Number AS Number,
                                  player.Playerpng AS playerpng
                                  FROM fixture_player
                                   INNER JOIN schedule ON  fixture_player.Schedule_ID = schedule.ID
                                   INNER JOIN player ON  fixture_player.Player_ID = player.Player_ID
                                   INNER JOIN football_clubs ON  fixture_player.Team_ID = football_clubs.ID
                                   INNER JOIN team_player ON fixture_player.Player_ID = team_player.Player_ID
                                   INNER JOIN  position ON team_player.Position_ID = position.Position_ID
                                   WHERE  fixture_player.Schedule_ID =$id  AND  fixture_player.Team_ID = $t1id AND fixture_player.Lineup_ID =1  ORDER BY position.Position_ID ASC,team_player.Number ASC;
                                    ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Number']; ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['pID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      <td><?php echo $user['Position']; ?></td>

                                                    
                                  </tr>
                              <?php }  } ?>    
                
                      </tbody>
                        </table>    



                      </div>
                    </div>
                  </div> 
                </div>
                
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-lg-12"> 
                    <div class="row">
                    <table class="table table-striped">
                  <thead>
                  <tr><th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
 
                  </tr>
                </thead>
                <tbody>
                <?php 
                                  $stmt = $conn->query("SELECT distinct fixture_player.Schedule_ID AS ID,
                                  fixture_player.Player_ID AS pID,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS Player,
                                  position.Main_Position_Name AS Position,
                                  team_player.Number AS Number,
                                  player.Playerpng AS playerpng
                                  FROM fixture_player
                                   INNER JOIN schedule ON  fixture_player.Schedule_ID = schedule.ID
                                   INNER JOIN player ON  fixture_player.Player_ID = player.Player_ID
                                   INNER JOIN football_clubs ON  fixture_player.Team_ID = football_clubs.ID
                                   INNER JOIN team_player ON fixture_player.Player_ID = team_player.Player_ID
                                   INNER JOIN  position ON team_player.Position_ID = position.Position_ID
                                   WHERE  fixture_player.Schedule_ID =$id  AND  fixture_player.Team_ID = $t1id AND fixture_player.Lineup_ID =2  ORDER BY position.Position_ID ASC,team_player.Number ASC;
                                    ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Number']; ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['pID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      <td><?php echo $user['Position']; ?></td>

                                                    
                                  </tr>
                              <?php }  } ?>    
           
                </tbody>
                  </table>    
                    </div>  
                  </div>
                </div>

               

                
                

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <h5 class="card-title">Player In</h5>
                  <table class="table table-striped">
                  <thead>
                  <tr>
                  <th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                  
                  <?php 
                                  $stmt = $conn->query("SELECT distinct fixture_sub.Schedule_ID AS ID,
                                  fixture_sub.Playerin_ID AS pID,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS Player,
                                  position.Main_Position_Name AS Position,
                                  team_player.Number AS Number,
                                  player.Playerpng AS playerpng
                                  FROM fixture_sub
                                   INNER JOIN schedule ON  fixture_sub.Schedule_ID = schedule.ID
                                   INNER JOIN player ON  fixture_sub.Playerin_ID = player.Player_ID
                                   INNER JOIN football_clubs ON fixture_sub.Team_ID = football_clubs.ID
                                   INNER JOIN team_player ON fixture_sub.Playerin_ID = team_player.Player_ID
                                   INNER JOIN  position ON team_player.Position_ID = position.Position_ID
                                   WHERE  fixture_sub.Schedule_ID =$id  AND  fixture_sub.Team_ID =$t1id 
                                   ORDER BY position.Position_ID ASC,team_player.Number ASC;
                                    ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Number']; ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['pID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      <td><?php echo $user['Position']; ?></td>

                                                    
                                  </tr>
                              <?php }  } ?>   
              
                  
           
                </tbody>
                  </table>  
                  <h5 class="card-title">Player Out</h5>
                  <table class="table table-striped">
                  <thead>
                  <tr>
                  <th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                <?php 
                                  $stmt = $conn->query("SELECT distinct fixture_sub.Schedule_ID AS ID,
                                  fixture_sub.Playerout_ID AS pID,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS Player,
                                  position.Main_Position_Name AS Position,
                                  team_player.Number AS Number,
                                  player.Playerpng AS playerpng
                                  FROM fixture_sub
                                   INNER JOIN schedule ON  fixture_sub.Schedule_ID = schedule.ID
                                   INNER JOIN player ON  fixture_sub.Playerout_ID = player.Player_ID
                                   INNER JOIN football_clubs ON fixture_sub.Team_ID = football_clubs.ID
                                   INNER JOIN team_player ON fixture_sub.Playerout_ID = team_player.Player_ID
                                   INNER JOIN  position ON team_player.Position_ID = position.Position_ID
                                   WHERE  fixture_sub.Schedule_ID =$id  AND  fixture_sub.Team_ID =$t1id 
                                   ORDER BY position.Position_ID ASC,team_player.Number ASC;
                                    ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Number']; ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['pID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      <td><?php echo $user['Position']; ?></td>

                                                    
                                  </tr>
                              <?php }  } ?>   
           
                </tbody>
                  </table> 
                </div>
              </div><!-- End Default Tabs -->

            </div>

          </div>

        </div>
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $key["Away_Team"]?></span></h5>

              <!-- Default Tabs --> 
              <ul class="nav nav-tabs nav-tabs-bordered" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home1" type="button" role="tab" aria-controls="home" aria-selected="true">Lineup</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile" aria-selected="false">Bench</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact1" type="button" role="tab" aria-controls="contact" aria-selected="false">Changes</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-12">  
                    <div class="row">
                      <div class="card info-card sales-card">
                   
                        <table class="table table-striped">
                        <thead>
                        <tr><th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
      
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                                  $stmt = $conn->query("SELECT distinct fixture_player.Schedule_ID AS ID,
                                  fixture_player.Player_ID AS pID,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS Player,
                                  position.Main_Position_Name AS Position,
                                  team_player.Number AS Number,
                                  player.Playerpng AS playerpng
                                  FROM fixture_player
                                   INNER JOIN schedule ON  fixture_player.Schedule_ID = schedule.ID
                                   INNER JOIN player ON  fixture_player.Player_ID = player.Player_ID
                                   INNER JOIN football_clubs ON  fixture_player.Team_ID = football_clubs.ID
                                   INNER JOIN team_player ON fixture_player.Player_ID = team_player.Player_ID
                                   INNER JOIN  position ON team_player.Position_ID = position.Position_ID
                                   WHERE  fixture_player.Schedule_ID =$id  AND  fixture_player.Team_ID = $t2id AND fixture_player.Lineup_ID =1  ORDER BY position.Position_ID ASC,team_player.Number ASC;
                                    ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Number']; ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['pID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      <td><?php echo $user['Position']; ?></td>

                                                    
                                  </tr>
                              <?php }  } ?>    
                
                      </tbody>
                        </table>    



                      </div>
                    </div>
                  </div> 
                </div>
                
                <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-lg-12"> 
                    <div class="row">
                    <table class="table table-striped">
                  <thead>
                  <tr><th scope="col">Number</th>
                    <th scope="col">Name</th>
                 
                    <th scope="col">Position</th>
 
                  </tr>
                </thead>
                <tbody>
                <?php 
                                  $stmt = $conn->query("SELECT distinct fixture_player.Schedule_ID AS ID,
                                  fixture_player.Player_ID AS pID,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS Player,
                                  position.Main_Position_Name AS Position,
                                  team_player.Number AS Number,
                                  player.Playerpng AS playerpng
                                  FROM fixture_player
                                   INNER JOIN schedule ON  fixture_player.Schedule_ID = schedule.ID
                                   INNER JOIN player ON  fixture_player.Player_ID = player.Player_ID
                                   INNER JOIN football_clubs ON  fixture_player.Team_ID = football_clubs.ID
                                   INNER JOIN team_player ON fixture_player.Player_ID = team_player.Player_ID
                                   INNER JOIN  position ON team_player.Position_ID = position.Position_ID
                                   WHERE  fixture_player.Schedule_ID =$id  AND  fixture_player.Team_ID = $t2id AND fixture_player.Lineup_ID =2  ORDER BY position.Position_ID ASC,team_player.Number ASC;
                                    ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Number']; ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['pID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      <td><?php echo $user['Position']; ?></td>

                                                    
                                  </tr>
                              <?php }  } ?>    
           
                </tbody>
                  </table>    
                    </div>  
                  </div>
                </div>

               

                
                

                <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                <h5 class="card-title">Player In</h5>
                  <table class="table table-striped">
                  <thead>
                  <tr>
                  <th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                <?php 
                                  $stmt = $conn->query("SELECT distinct fixture_sub.Schedule_ID AS ID,
                                  fixture_sub.Playerin_ID AS pID,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS Player,
                                  position.Main_Position_Name AS Position,
                                  team_player.Number AS Number,
                                  player.Playerpng AS playerpng
                                  FROM fixture_sub
                                   INNER JOIN schedule ON  fixture_sub.Schedule_ID = schedule.ID
                                   INNER JOIN player ON  fixture_sub.Playerin_ID = player.Player_ID
                                   INNER JOIN football_clubs ON fixture_sub.Team_ID = football_clubs.ID
                                   INNER JOIN team_player ON fixture_sub.Playerin_ID = team_player.Player_ID
                                   INNER JOIN  position ON team_player.Position_ID = position.Position_ID
                                   WHERE  fixture_sub.Schedule_ID =$id  AND  fixture_sub.Team_ID =$t2id 
                                   ORDER BY position.Position_ID ASC,team_player.Number ASC;
                                    ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Number']; ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['pID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      <td><?php echo $user['Position']; ?></td>

                                                    
                                  </tr>
                              <?php }  } ?>  
           
                </tbody>
                  </table>  
                  <h5 class="card-title">Player Out</h5>
                  <table class="table table-striped">
                  <thead>
                  <tr>
                  <th scope="col">Number</th>
                    <th scope="col">Name</th>              
                    <th scope="col">Position</th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                <?php 
                                  $stmt = $conn->query("SELECT distinct fixture_sub.Schedule_ID AS ID,
                                  fixture_sub.Playerout_ID AS pID,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS Player,
                                  position.Main_Position_Name AS Position,
                                  team_player.Number AS Number,
                                  player.Playerpng AS playerpng
                                  FROM fixture_sub
                                   INNER JOIN schedule ON  fixture_sub.Schedule_ID = schedule.ID
                                   INNER JOIN player ON  fixture_sub.Playerout_ID = player.Player_ID
                                   INNER JOIN football_clubs ON fixture_sub.Team_ID = football_clubs.ID
                                   INNER JOIN team_player ON fixture_sub.Playerout_ID = team_player.Player_ID
                                   INNER JOIN  position ON team_player.Position_ID = position.Position_ID
                                   WHERE  fixture_sub.Schedule_ID =$id  AND  fixture_sub.Team_ID =$t2id 
                                   ORDER BY position.Position_ID ASC,team_player.Number ASC;
                                    ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Number']; ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='team_info.php?id={$user['pID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      <td><?php echo $user['Position']; ?></td>

                                                    
                                  </tr>
                              <?php }  } ?>   
           
                </tbody>
                  </table> 
                </div>
              </div><!-- End Default Tabs -->

            </div>

          </div>

        </div>
      </div>
    </section>

  <section class="section dashboard">
  <div class="col-12">
    <div class="row">
      <!-- Sales Card -->
     
      <div class="col-sm-12">

        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Goals</h5>
            <table class="table table-striped">
            <thead>
            <tr>
              <th scope="col">Minute</th>
              <th scope="col">Event</th>
              <th scope="col">Player</th>
              <th scope="col">Team</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php 
                                  $stmt = $conn->query("SELECT fixture_event.Schedule_ID AS ID,                                  
                                  player.Player_ID AS PlayerID,
                                  football_clubs.ID AS TeamID,
                                  fixture_event.Minute AS Minute,
                                  event.Event_Name AS Event,
                                  player.Player_Name AS Player,
                                  football_clubs.Name AS Team,
                                  player.Playerpng AS playerpng,
                                  football_clubs.pnglogo AS teampng
                                  FROM
                                  fixture_event
                                  INNER JOIN schedule ON fixture_event.Schedule_ID = schedule.ID
                                  INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                                  INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                                  INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                                  WHERE schedule.ID = $id AND (fixture_event.Event_ID = 1 OR fixture_event.Event_ID = 5 OR fixture_event.Event_ID = 8 OR fixture_event.Event_ID = 6)
                                  ORDER BY fixture_event.Minute");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Minute']; ?></td>
                                      <td><?php echo $user['Event']; ?></td>
                                      <td> <img width="40" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['PlayerID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      
                                      <td> <img width="40" src="assets/img/<?php echo $user['teampng'];?>"> <?php echo "<a href='team_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>

                                                    
                                  </tr>
                              <?php }  } ?>   
            </tr>
     
          </tbody>
            </table>  
            
          </div>
        </div>
      </div>

      <div class="col-sm-12">

        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Substitutions</h5>
            <table class="table table-striped">
            <thead>
            <tr>
              <th scope="col">Minute</th>
              <th scope="col">Player In</th>
              <th scope="col">Player Out</th>
              <th scope="col">Team</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php 
                                  $stmt = $conn->query("SELECT 
                                  player.Player_ID AS PID1,
							                    player2.Player_ID AS PID2,
                                  football_clubs.ID AS TeamID,
                                  fixture_sub.Schedule_ID AS ID,
                                  fixture_sub.Minute AS Minute,
                                  football_clubs.Name AS Team,
                                  player.Player_Name AS PlayerIn,
                                  player2.Player_Name AS PlayerOut,
                                  player.Playerpng AS player1png,
                                  player2.Playerpng AS player2png,
                                  football_clubs.pnglogo AS teampng
                                  FROM fixture_sub
                                   INNER JOIN schedule ON fixture_sub.Schedule_ID = schedule.ID
                                   INNER JOIN player ON fixture_sub.Playerin_ID = player.Player_ID
                                   INNER JOIN player player2 ON fixture_sub.Playerout_ID = player2.Player_ID
                                   INNER JOIN football_clubs ON fixture_sub.Team_ID = football_clubs.ID
                                   WHERE schedule.ID = $id
                                    ORDER BY fixture_sub.Minute");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Minute']; ?></td>
                                    
                                      <td> <img width="40" src="assets/img/<?php echo $user['player1png'];?>"> <?php echo "<a href='player_info.php?id={$user['PID1']}'style='text-decoration:none'>" . $user["PlayerIn"] . "</a>" ;?></td>
                                      <td> <img width="40" src="assets/img/<?php echo $user['player2png'];?>"> <?php echo "<a href='player_info.php?id={$user['PID2']}'style='text-decoration:none'>" . $user["PlayerOut"] . "</a>" ;?></td>
                                      
                                      <td> <img width="40" src="assets/img/<?php echo $user['teampng'];?>"> <?php echo "<a href='team_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>

                                                    
                                  </tr>
                              <?php }  } ?>   
            </tr>
     
          </tbody>
            </table>  
            
          </div>
        </div>
      </div>

      <div class="col-sm-12">

        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Bookings</h5>
            <table class="table table-striped">
            <thead>
            <tr>
              <th scope="col">Minute</th>
              <th scope="col">Event</th>
              <th scope="col">Player</th>
              <th scope="col">Team</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php 
                                  $stmt = $conn->query("SELECT fixture_event.Schedule_ID AS ID,                                  
                                  player.Player_ID AS PlayerID,
                                  football_clubs.ID AS TeamID,
                                  fixture_event.Minute AS Minute,
                                  event.Event_Name AS Event,
                                  player.Player_Name AS Player,
                                  football_clubs.Name AS Team,
                                  player.Playerpng AS playerpng,
                                  football_clubs.pnglogo AS teampng
                                  FROM
                                  fixture_event
                                  INNER JOIN schedule ON fixture_event.Schedule_ID = schedule.ID
                                  INNER JOIN event ON fixture_event.Event_ID = event.Event_ID
                                  INNER JOIN player ON fixture_event.Player_ID = player.Player_ID
                                  INNER JOIN football_clubs ON fixture_event.Team_ID = football_clubs.ID
                                  WHERE schedule.ID = $id AND (fixture_event.Event_ID = 3 OR fixture_event.Event_ID = 4 OR fixture_event.Event_ID = 7)
                                  ORDER BY fixture_event.Minute");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                  foreach($users as $user)  {  
                              ?>
                                  <tr>
                                      <td><?php echo $user['Minute']; ?></td>
                                      <td><?php echo $user['Event']; ?></td>
                                      <td> <img width="40" src="assets/img/<?php echo $user['playerpng'];?>"> <?php echo "<a href='player_info.php?id={$user['PlayerID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>

                                      
                                      <td> <img width="40" src="assets/img/<?php echo $user['teampng'];?>"> <?php echo "<a href='team_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>

                                                    
                                  </tr>
                              <?php }  } ?>   
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
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script> 
    

    

</body>

</html>