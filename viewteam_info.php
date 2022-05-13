<?php
  session_start();
  require_once "config/db.php";

  include_once 'database.php'; 


  if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'Please login!';
    header('location: pages-login.php');
}

if (isset($_SESSION['user_login'])) {
  $user_id = $_SESSION['user_login'];
  $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
    

  if (isset($_GET['id'])) {
  $id = (isset($_GET['id'])) ? $_GET['id'] : '';
  }
  $sql = mysqli_query($connection,"SELECT  football_clubs.ID AS ID,football_clubs.Name AS Name,
  football_clubs.pnglogo AS Logo,
  football_clubs.Nickname AS Nickname,
  football_clubs.Location AS Location,
  stadium.Stadium_Name AS Stadium,
  stadium.Capacity AS Capacity,
  stadium.stadiumpng AS stadiumpic,
  manager.Name AS Manager,
  manager.pngmanager AS managerpng,
  manager.Date_of_Birth AS Datemanager,
  manager.Nationality AS Nationmanager
  FROM football_clubs
  INNER JOIN manager ON football_clubs.Manager_ID = manager.ID
  INNER JOIN stadium ON football_clubs.Stadium_ID = stadium.Stadium_ID  WHERE football_clubs.ID = $id ;");
  $key= mysqli_fetch_array($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Footballstat | Clubs</title>
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
      <a href="index.php" class="logo d-flex align-items-center">
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
              <span>User</span>
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
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-house-door"></i>
          <span>Home</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="viewfixtures.php">
          <i class="bi bi-calendar-day"></i>
          <span>Fixtures</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="viewmatch.php">
          <i class="bi bi-trophy"></i>
          <span>Results</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="viewstanding.php">
          <i class="bi bi-list-ol"></i>
          <span>Standings</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="viewteam.php">
          <i class="bi bi-people"></i>
          <span>Clubs</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="viewplayer.php">
          <i class="bi bi-person-circle"></i>
          <span>Players</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="viewstatic.php">
          <i class="bi bi-bar-chart"></i>
          <span>Statistics</span>
        </a>
      </li><!-- End Blank Page Nav -->

      

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Team</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="viewteam.php">Club</a></li>
          <li class="breadcrumb-item active"><?php echo "<a href='viewteam_info.php?id={$key['ID']}'style='text-decoration:none'>" . $key["Name"] . "</a>" ;?></li>
         

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $key["Name"]?></span></h5>
              <!-- Default Tabs --> 
              <ul class="nav nav-tabs nav-tabs-bordered" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Info</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Squad</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Result</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-12">  
                    <div class="row">
                      <div class="col-4">
                        <div class="card info-card sales-card">
                          <div class="card-body">
                        
                            <img width="150" style="vertical-align:middle; margin:0px 80px 5px" src="assets/img/<?php echo $key["Logo"];?>">  
                            <div class="ps-6">
                                <span class="text-dark normal pt-1 fw-bold">Name :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Name"]?></span>
                            </div>
                            <div class="ps-6">
                                <span class="text-dark normal pt-1 fw-bold">Nickname :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Nickname"]?></span>
                            </div>
                            <div class="ps-6">
                                <span class="text-dark normal pt-1 fw-bold">Location :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Location"]?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="card info-card sales-card">
                          <div class="card-body">
                        
                          <img width="300" style="vertical-align:middle; margin:20px 10px 10px" src="assets/img/<?php echo $key["stadiumpic"];?>">  
                            <div class="ps-6">
                                <span class="text-dark normal pt-1 fw-bold">Stadium :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Stadium"]?></span>
                            </div>
                            <div class="ps-6">
                                <span class="text-dark normal pt-1 fw-bold">Capacity :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Capacity"]?></span>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="card info-card sales-card">
                          <div class="card-body">
                        
                            <img width="150" style="vertical-align:middle; margin:20px 80px 10px" src="assets/img/<?php echo $key["managerpng"];?>">  
                            <div class="ps-6">
                                <span class="text-dark normal pt-1 fw-bold">Manager :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Manager"]?></span>
                            </div>
                            <div class="ps-6">
                                <span class="text-dark normal pt-1 fw-bold">Nationality :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Nationmanager"]?></span>
                            </div>
                            <div class="ps-6">
                                <span class="text-dark normal pt-1 fw-bold">Date of Birth :</span> <span class="text-muted big pt-2 ps-1"><?php echo $key["Datemanager"]?></span>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-lg-12"> 
                    <div class="row">
                      <h5 class="card-title" style="vertical-align:middle; margin:0px 30px 0px">Goalkeeper</span></h5>
                      <?php          
                      $result1 = mysqli_query($connection,"SELECT distinct player.Player_ID AS ID,
                      player.Player_Name AS Name,
                      team_player.Number AS Number,
                      position.Main_Position_Name AS Position,
                      player.Nationality AS Nationality,
                      player.Playerpng AS playerpng
                      FROM team_player
                        INNER JOIN player ON team_player.Player_ID = player.Player_ID
                        INNER JOIN football_clubs ON team_player.Team_ID = football_clubs.ID
                        INNER JOIN position ON team_player.Position_ID = position.Position_ID
                      WHERE team_player.Team_ID =$id AND team_player.Position_ID =1;");          
                      while($row1 = $result1-> fetch_assoc()){
                    ?>
                    <div class="col-3">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title" style="vertical-align:middle;margin:10px 10px "><?php echo "<a href='viewplayer_info.php?id={$row1['ID']}'style='text-decoration:none'>" . $row1["Name"] . "</a>" ;?>
                          <span> | <?php echo $row1['Number'];?></span></h5>
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <img width="80px" src="assets/img/<?php echo $row1['playerpng'];?>">
                          </div> 
                          <div class="ps-3">
                            <span class="text-muted  small" >Nationality: <?php echo $row1['Nationality'];?></span>
                          </div>
                                                    
                        </div> 
                      </div> 
                    </div>
                    </div>
                    <?php
                      }
                      ?>
                  </div>
                </div>

                <div class="col-lg-12"> 
                    <div class="row">
                      <h5 class="card-title" style="vertical-align:middle; margin:0px 30px 0px">Defender</span></h5>
                      <?php          
                      $result1 = mysqli_query($connection,"SELECT distinct player.Player_ID AS ID,
                      player.Player_Name AS Name,
                      team_player.Number AS Number,
                      position.Main_Position_Name AS Position,
                      player.Nationality AS Nationality,
                      player.Playerpng AS playerpng
                      FROM team_player
                        INNER JOIN player ON team_player.Player_ID = player.Player_ID
                        INNER JOIN football_clubs ON team_player.Team_ID = football_clubs.ID
                        INNER JOIN position ON team_player.Position_ID = position.Position_ID
                      WHERE team_player.Team_ID =$id AND team_player.Position_ID =2;");          
                      while($row1 = $result1-> fetch_assoc()){
                    ?>
                    <div class="col-3">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title" style="vertical-align:middle;margin:10px 10px "><?php echo "<a href='viewplayer_info.php?id={$row1['ID']}'style='text-decoration:none'>" . $row1["Name"] . "</a>" ;?>
                          <span> | <?php echo $row1['Number'];?></span></h5>
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <img width="80px" src="assets/img/<?php echo $row1['playerpng'];?>">
                          </div> 
                          <div class="ps-3">
                            <span class="text-muted  small" >Nationality: <?php echo $row1['Nationality'];?></span>
                          </div>
                                                    
                        </div> 
                      </div> 
                    </div>
                    </div>
                    <?php
                      }
                      ?>
                  </div>
                </div>

                <div class="col-lg-12"> 
                    <div class="row">
                      <h5 class="card-title" style="vertical-align:middle; margin:0px 30px 0px">Midfielder</span></h5>
                      <?php          
                      $result1 = mysqli_query($connection,"SELECT distinct player.Player_ID AS ID,
                      player.Player_Name AS Name,
                      team_player.Number AS Number,
                      position.Main_Position_Name AS Position,
                      player.Nationality AS Nationality,
                      player.Playerpng AS playerpng
                      FROM team_player
                        INNER JOIN player ON team_player.Player_ID = player.Player_ID
                        INNER JOIN football_clubs ON team_player.Team_ID = football_clubs.ID
                        INNER JOIN position ON team_player.Position_ID = position.Position_ID
                      WHERE team_player.Team_ID =$id AND team_player.Position_ID =3;");          
                      while($row1 = $result1-> fetch_assoc()){
                    ?>
                    <div class="col-3">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title" style="vertical-align:middle;margin:10px 10px "><?php echo "<a href='viewplayer_info.php?id={$row1['ID']}'style='text-decoration:none'>" . $row1["Name"] . "</a>" ;?>
                          <span> | <?php echo $row1['Number'];?></span></h5>
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <img width="80px" src="assets/img/<?php echo $row1['playerpng'];?>">
                          </div> 
                          <div class="ps-3">
                            <span class="text-muted  small" >Nationality: <?php echo $row1['Nationality'];?></span>
                          </div>
                                                    
                        </div> 
                      </div> 
                    </div>
                    </div>
                    <?php
                      }
                      ?>
                  </div>
                </div>

                <div class="col-lg-12"> 
                    <div class="row">
                      <h5 class="card-title" style="vertical-align:middle; margin:0px 30px 0px">Forward</span></h5>
                      <?php          
                      $result1 = mysqli_query($connection,"SELECT distinct player.Player_ID AS ID,
                      player.Player_Name AS Name,
                      team_player.Number AS Number,
                      position.Main_Position_Name AS Position,
                      player.Nationality AS Nationality,
                      player.Playerpng AS playerpng
                      FROM team_player
                        INNER JOIN player ON team_player.Player_ID = player.Player_ID
                        INNER JOIN football_clubs ON team_player.Team_ID = football_clubs.ID
                        INNER JOIN position ON team_player.Position_ID = position.Position_ID
                      WHERE team_player.Team_ID =$id AND team_player.Position_ID =4;");          
                      while($row1 = $result1-> fetch_assoc()){
                    ?>
                    <div class="col-3">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title" style="vertical-align:middle;margin:10px 10px "><?php echo "<a href='viewplayer_info.php?id={$row1['ID']}'style='text-decoration:none'>" . $row1["Name"] . "</a>" ;?>
                          <span> | <?php echo $row1['Number'];?></span></h5>
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <img width="80px" src="assets/img/<?php echo $row1['playerpng'];?>">
                          </div> 
                          <div class="ps-3">
                            <span class="text-muted  small" >Nationality: <?php echo $row1['Nationality'];?></span>
                          </div>
                                                    
                        </div> 
                      </div> 
                    </div>
                    </div>
                    <?php
                      }
                      ?>
                  </div>
                </div>

                
                </div>

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="col-lg-12"> 
                    <div class="row">
                      
                      <?php          
                    $result = mysqli_query($connection,"SELECT 
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
                    WHERE  football_clubs.ID= $id OR  team2.ID = $id
                    ORDER BY
                    schedule.Match_NO_ID ASC
                    ;");
                    
                  
                    while($row = $result-> fetch_assoc()){
                        
                ?>
              <div class="col-12">
              
                <div class="card info-card sales-card">

                <h5 class="card-title" style=" margin:0px 20px">Matchday <?php echo $row["Matchday"];?> <span>| NO. <?php echo $row["Number"];?></span></h5>
                  <div class="d-flex flex-column align-items-center">
                    <h5 class="card-title" ><?php echo "<a href='viewteam_info.php?id={$row['Home_ID']}'style='text-decoration:none'>" . $row["Home_Team"]  ."</a>" ;?>
                    <span>VS</span>  <?php echo "<a href='viewteam_info.php?id={$row['Away_ID']}'style='text-decoration:none'>" . $row["Away_Team"] . "</a>" ;?>
                  </div>

                  <div class="d-flex flex-column align-items-center">
                    <div class="">
                      <img width="100" style="vertical-align:middle; margin:0px 50px 0px" src="assets/img/<?php echo $row["Home_Logo"];?>">
                      <img width="100"style="vertical-align:middle; margin:0px 50px 0px" src="assets/img/<?php echo $row["Away_Logo"];?>"> 
                      </div> 
                  </div>

                  <div class=" d-flex flex-column align-items-center">
                  <span class="text-secondary big  fw-bold"><?php echo $row["ScoreHome"]?> <span><?php echo "<a href='viewmatch_info.php?team1={$row['Home_ID']}&team2={$row['Away_ID']}&mid={$row['ID']}'>"  . " VS " ."</a>" ?> </span><?php echo $row["ScoreAway"]?>
                  </div>

                  
          
                  <div class="card-body profile-card d-flex flex-column align-items-center">
                  <span class="text-secondary big "><?php echo $row["Date"]?> <span></span><?php echo $row["Time"]?>
                  </div>
                  
         
              
                
              </div>
              </div>
              <?php

}


?>
        </div>
                
                  </div>
                </div>
                </div>
                </div>
                </div>
              </div><!-- End Default Tabs -->

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