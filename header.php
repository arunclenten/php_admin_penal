<?php

@include 'db.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
   exit(); // Stop execution if not logged in
}

// Check if user ID is set in the session
if(isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];

   // Fetch user's full data from the database using their ID
   $sql = "SELECT * FROM user_login WHERE id = $user_id";
   $result = mysqli_query($connction, $sql);

   if(mysqli_num_rows($result) == 1) {
      $user_data = mysqli_fetch_assoc($result);

      $email = $user_data['email'];
      $user_type = $user_data['user_type'];
   } else {
      // Redirect or handle error if user data not found
   }
} else {
   // Redirect or handle error if user ID is not set in the session
}

?>
<!doctype html>
<html lang="en">



<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rocker</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">



				<li>
					<a href="index.php">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="properties.php">
						<div class="parent-icon"><i class='bx bx-arch'></i>
						</div>
						<div class="menu-title">Create properties</div>
					</a>
				</li>

				<li>
					<a href="subproperties.php">
						<div class="parent-icon"><i class='bx bx-arch'></i>
						</div>
						<div class="menu-title">Create Sub properties</div>
					</a>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-user-circle'></i>
						</div>
						<div class="menu-title">Land</div>
					</a>
					<ul>
						<li> <a href="land.php"><i class='bx bx-radio-circle'></i>Create land</a>
						</li>
						<li> <a href="#"><i class='bx bx-radio-circle'></i>View land</a>
						</li>
						<li> <a href="uint.php"><i class='bx bx-radio-circle'></i>Units</a>
						</li>
					</ul>
				</li>



				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-user-circle'></i>
						</div>
						<div class="menu-title">Create Users</div>
					</a>
					<ul>
						<li> <a href="user.php"><i class='bx bx-radio-circle'></i>Users</a>
						</li>
						<li> <a href="widgets.html"><i class='bx bx-radio-circle'></i>Mediator</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="lead.php">
						<div class="parent-icon"><i class='bx bx-map-alt'></i>
						</div>
						<div class="menu-title">Leads</div>
					</a>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-door-open'></i>
						</div>
						<div class="menu-title">Buyers</div>
					</a>
					<ul>
						<li> <a href="index.html"><i class='bx bx-radio-circle'></i>All</a>
						</li>
						<li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Cash</a>
						</li>
						<li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Loan</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class=' bx bx-male'></i>
						</div>
						<div class="menu-title">Interviews</div>
					</a>
					<ul>
						<li> <a href="index.html"><i class='bx bx-radio-circle'></i>Add candidate</a>
						</li>
						<li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Apporved</a>
						</li>
						<li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Rejected</a>
						</li>
						<li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Pending</a>
						</li>
						<li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Offer Letter</a>
						</li>
					</ul>
				</li>



			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					<div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
						<a href="javascript:;" class="btn d-flex align-items-center"><i class='bx bx-search'></i>Search</a>
					</div>


					<div class="top-menu ms-auto">

						<ul>
							<li class="nav-item dropdown dropdown-app text-white">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="javascript:;"></a>
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">


									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large text-white">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown">

								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">

									</a>
									<div class="header-notifications-list">

									</div>

								</div>
							</li>
							<li class="nav-item dropdown dropdown-large text-white">

								<div class="dropdown-menu dropdown-menu-end">

									<div class="header-message-list">


									</div>

								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown px-3 ms-auto">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-8.png" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0"><?php echo $_SESSION['admin_name'] ?></p>
								<p class="designattion mb-0">
								<?php echo isset($user_type) ? $user_type : "User type not found"; ?>

							</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>

							<!-- <li>
								<div class="dropdown-divider mb-0"></div>
							</li> -->
							<li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<div class="page-wrapper">
			<div class="page-content">