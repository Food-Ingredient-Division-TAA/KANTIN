<?php
ob_start();
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HYGIENE | FID-TAA</title>

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="shortcut icon" href="assets/img/icbplogo.png" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light" style="background:deeppink;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><small class="fas fa-bars"> &nbsp; HYGIENE MONITORING SYSTEM</small></a>        
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="video_player.php" target="blank"><b><i class="fa fa-video"></i> Hygiene1</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="video_player2.php" target="blank"><b><i class="fa fa-video"></i> Hygiene2</b></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
          <span class="jam"></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-danger elevation-4"  style="background:linear-gradient(white 25%,pink,deeppink);">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" style="padding:8px;"><center>
      <span class="brand-text font-weight-light"><img width="200" src="assets/img/indofood-cbp.png"/></span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama_user']; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php isset($dashboard)?print "active":NULL; ?>">
              <i class="nav-icon fas fa-search"></i>
              <p>FINDINGS</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="maping.php" class="nav-link <?php isset($maping)?print "active":NULL; ?>">
              <i class="nav-icon fas fa-map"></i>
              <p>BASE AREA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report.php" class="nav-link <?php isset($report)?print "active":NULL; ?>">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>REPORT</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="swab_sch.php" class="nav-link <?php isset($swab)?print "active":NULL; ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>SWAB SCHEDULE</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sanitasi.php" class="nav-link <?php isset($sanitasi)?print "active":NULL; ?>">
              <i class="nav-icon fas fa-soap"></i>
              <p>SANITASI</p>
            </a>
          </li>
        <?php if($_SESSION['level']=="Administrator" || $_SESSION['level']=="Supervisor" || $_SESSION['level']=="Manager"){ ?>
          <li class="nav-item">
            <a href="#!" class="nav-link <?php isset($master)?print "active":NULL; ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>MASTER DATA
                  <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="area.php" class="nav-link <?php isset($area)?print "active":NULL; ?>" style="margin-left:30px;">
                <small><i class="fas fa-map-marker"></i>
                  &nbsp;<p>AREA</p></small>
                </a>
              </li>
              <li class="nav-item">
                <a href="klausul.php" class="nav-link <?php isset($klausul)?print "active":NULL; ?>" style="margin-left:30px;">
                <small><i class="fas fa-table"></i>
                  &nbsp;<p>KLAUSUL</p></small>
                </a>
              </li>
              <li class="nav-item">
                <a href="user.php" class="nav-link <?php isset($user)?print "active":NULL; ?>" style="margin-left:30px;">
                <small><i class="fas fa-users"></i>
                  &nbsp;<p>USER</p></small>
                </a>
              </li>
              </li>
            </ul>
          </li>
        <?php } ?>
			  <li class="nav-item">
				<a href="logout.php" class="nav-link">
				<i class="nav-icon fas fa-sign-out-alt"></i>
				  <p> LOG OUT
				  </p>
				</a>
			  </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php echo format_indo(date('Y-m-d')); ?> ( 
				<?php 
					$now = date('Y-m-d');
					$now = date('Y-m-d', strtotime($now));
          $sql = mysqli_query($konek, "SELECT * FROM week_table WHERE DATE(NOW()) BETWEEN tgl_awal AND tgl_akhir");
          $result = mysqli_fetch_array($sql);
					  echo "Week ".substr($result['title_week'],5); $week= $result['title_week'];
				?> )
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
              <li class="breadcrumb-item active"><?php echo $page; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">