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
    $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
}
  include_once 'database.php';
  $select1 = "SELECT * FROM schedule";
  $result1 = mysqli_query ($connection, $select1);
  $select2 = "SELECT * FROM football_clubs";
  $result2 = mysqli_query ($connection, $select2);
  $select3 = "SELECT DISTINCT player.Player_Name,player.Player_ID
  FROM fixture_player
  INNER JOIN player ON fixture_player.Player_ID = player.Player_ID
  WHERE fixture_player.Lineup_ID =1 ";
  $result3 = mysqli_query ($connection, $select3);
  $select4 = "SELECT * FROM player";
  $result4 = mysqli_query ($connection, $select4);
  $select5 = "SELECT DISTINCT player.Player_Name,player.Player_ID
  FROM fixture_player
  INNER JOIN player ON fixture_player.Player_ID = player.Player_ID
  WHERE fixture_player.Lineup_ID =2 ";
  $result5 = mysqli_query ($connection, $select5);
 
    

    $message   =  "";


        if (isset($_GET['id'])) {
        $id = (isset($_GET['id'])) ? $_GET['id'] : '';
        }
        $edit = mysqli_query($connection,"SELECT * FROM fixture_sub WHERE ID = '$id' ");
        $row= mysqli_fetch_array($edit);
    
    if(count($_POST)>0)
    {
    
      $ID = $_POST['IDI'];
      $Schedule = $_POST['Schedule'];
      $Team = $_POST['Team']; 
      $Player_In=$_POST['Player_In'];
      $Player_Out = $_POST['Player_Out'];
      $Minute=$_POST['Minute'];

      
      $sql=mysqli_query($connection,"UPDATE fixture_sub SET Schedule_ID = '$Schedule', Team_ID = '$Team', Playerin_ID='   $Player_In',Playerout_ID='$Player_Out',Minute='$Minute' WHERE ID = '$ID'");
    
      if ($sql) {
      echo "<script>alert('Data has been updated successfully');</script>";
      echo "<script>window.location.href = 'insert_sub.php';</script>";
      }else{
      echo "<script>alert('Data has not been updated successfully');</script>";
      echo "<script>window.location.href = 'insert_sub.php';</script>";
      }
    } 
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Footballstat | Edit Substitution</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

    
		
		

  

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row1['firstname']  ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <h6><?php echo $row1['firstname'] . ' ' . $row1['lastname'] ?></h6>
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
      <h1>Edit Substitution</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active"><a href="insert_sub.php">Insert Substitution</a></li>
          <li class="breadcrumb-item active">Edit Substitution</li>
  
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Substitution</h5>
              
              <!-- Table with stripped rows -->
              <div class="container"> 

                  <form method="post" action="edit_sub.php">
                
                        <div class="col-md-6">
                        <input type="text" readonly value="<?php echo $row['ID']; ?>" required class="form-control" name="IDI" >
                        </div>
                        
                        <div class="col-md-6">
                          <label for="">Fixture</label>
                            <select class="form-control" name="Schedule">
                              <?php foreach($result1 as $key ):?>
                              <option value="<?php echo $key['ID']; ?>"<?php if($row['Schedule_ID'] == $key['ID']) echo 'selected="selected"'; ?>><?php echo $key['Descrip']; ?></option>
                              <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-6">
                          <label for="">Team</label>
                            <select name="Team" class="form-control">
                              <option>Please select Team</option>
                              <?php foreach($result2 as $key ):?>
                              <option value="<?php echo $key['ID']; ?>"<?php if($row['Team_ID'] == $key['ID']) echo 'selected="selected"'; ?>><?php echo $key['Name']; ?></option>
                              <?php endforeach;?>
                            </select>
                        </div>
                      
                        <div class="col-md-6">
                          <label for="">Player_In</label>
                          <select name="Player_In" class="form-control selectpicker" data-live-search="true">
                              <option>Please select Player In</option>
                              <?php foreach($result5 as $key ):?>
                              <option value="<?php echo $key['Player_ID']; ?>"<?php if($row['Playerin_ID'] == $key['Player_ID']) echo 'selected="selected"'; ?>><?php echo $key['Player_Name']; ?></option>
                              <?php endforeach;?>
                              
                            </select>
                        </div>

                        <div class="col-md-6">
                          <label for="">Player_out</label>
                          <select name="Player_Out" class="form-control selectpicker" data-live-search="true">
                              <option>Please select Player Out</option>
                              <?php foreach($result3 as $key ):?>
                              <option value="<?php echo $key['Player_ID']; ?>"<?php if($row['Playerout_ID'] == $key['Player_ID']) echo 'selected="selected"'; ?>><?php echo $key['Player_Name']; ?></option>
                              <?php endforeach;?>
                              
                            </select>
                        </div>
                   

                        <div class="col-md-6">
                          <label for="">Minute</label>
                          <input type="text" name="Minute" value="<?php echo $row['Minute']; ?>" class="form-control">
                        </div>



                        <hr>
                        <a href="insert_sub.php" class="btn btn-secondary">Go Back</a>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        
                        
                  
                      

                  </form>

                  

                  
                  
  
    
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></!--script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>$(".multiple-select").select2({});</script>
  
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>