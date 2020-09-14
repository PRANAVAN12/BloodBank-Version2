<?php
	include('../connection.php');
	session_start();

	if(!isset($_SESSION['membername']) AND $_SESSION['userid'] == ''){
		header('location:login.php');
	}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">

	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<style>
.top_space{
    top: 78px;
}
	.sidebar-container {
  position: fixed;
  width: 220px;
  height: 100%;
  left: 0;
  overflow-x: hidden;
  overflow-y: auto;
  background: #1a1a1a;
  color: #fff;
}

.content-container {
  padding-top: 20px;
}

.sidebar-logo {
  padding: 10px 15px 10px 30px;
  font-size: 20px;
  background-color: #2574A9;
}

.sidebar-navigation {
  padding: 0;
  margin: 0;
  list-style-type: none;
  position: relative;
}

.sidebar-navigation li {
  background-color: transparent;
  position: relative;
  display: inline-block;
  width: 100%;
  line-height: 20px;
}

.sidebar-navigation li a {
  padding: 10px 15px 10px 30px;
  display: block;
  color: #fff;
}

.sidebar-navigation li .fa {
  margin-right: 10px;
}

.sidebar-navigation li a:active,
.sidebar-navigation li a:hover,
.sidebar-navigation li a:focus {
  text-decoration: none;
  outline: none;
}

.sidebar-navigation li::before {
  background-color: #2574A9;
  position: absolute;
  content: '';
  height: 100%;
  left: 0;
  top: 0;
  -webkit-transition: width 0.2s ease-in;
  transition: width 0.2s ease-in;
  width: 3px;
  z-index: -1;
}

.sidebar-navigation li:hover::before {
  width: 100%;
}

.sidebar-navigation .header {
  font-size: 12px;
  text-transform: uppercase;
  background-color: #151515;
  padding: 10px 15px 10px 30px;
}

.sidebar-navigation .header::before {
  background-color: transparent;
}

.content-container {
  padding-left: 220px;
}
.sidebar-navigation li a {
    padding: 10px 15px 10px 30px;
    display: block;
    color: #fff;
    line-height: 40px;
    font-size: 18px;
    font-weight: 600;
}
</Style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src=""  class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
			
				
			
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
					
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->


		<div class="sidebar-container top_space">
<div class="logoarea">

						<?php
						$image = $connection->query("SELECT * FROM member WHERE username='".$_SESSION['membername']."'");
						$row = $image->fetch_array(); ?>
						
							<a href="#"  data-toggle="dropdown"><img src="../<?php echo $row['profile'];?>" class="img-circle" alt="Avatar"> <?php ?> <span><?php echo $_SESSION['membername'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							
					
</div>


  <div class="sidebar-logo">
  Jaffna 
  Blood Management
  </div>
  <ul class="sidebar-navigation">
    
    <li>
      <a href="#">
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
      </a>
    </li>
   
    <li>
      <a href="request.php">
        <i class="fa fa-tachometer" aria-hidden="true"></i> Request
      </a>
    </li>
    <li>
      <a href="donor.php">
        <i class="fa fa-cog" aria-hidden="true"></i> Donate
      </a>
    </li>
    <li>
      <a href="bmr.php">
        <i class="fa fa-info-circle" aria-hidden="true"></i> BMR
      </a>
    </li>
    <li>
      <a href="bmi.php">
        <i class="fa fa-info-circle" aria-hidden="true"></i> BMI
      </a>
    </li>
    <li>
      <a href="../index.html">
        <i class="fa fa-info-circle" aria-hidden="true"></i> Log Out
      </a>
    </li>
  </ul>
</div>
	

		<!-- logout modal -->
		 <div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to logout now ?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <a href="../logout.php"> <button type="button" class="btn btn-danger">Logout</button></a>
        </div>
      </div>
    </div>
  </div>

  <!-- edit profile modal -->
   <div class="modal fade" id="profile" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit My Profile</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  