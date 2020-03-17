
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Jamavar IndianKitchen</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="/ip/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="/ip/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="/ip/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="/ip/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="/ip/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="/ip/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="/ip/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="/ip/css/style.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


  <!-- Favicons -->
  <link href="img/favicon.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/ip/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/ip/css/style.css" rel="stylesheet">
</head>

<body>
<header id="header">
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 ml-5">
				<div class="row">
					<div class="col-lg-2"><img src="img/LOGO.jpg" style="width:100%"/></div>
					<div class="col-lg-10 mt-3"><h1><a href="#intro" class="scrollto">Jamavar Indian Kitchen</a></h1></div>
				<!-- Uncomment below if you prefer to use an image logo -->
				</div>
			</div>


		<div class="col-lg-6 mt-3">
		  <nav id="nav-menu-container">
			<ul class="nav-menu">
			  <li class="menu-active"><a href="#intro">Home</a></li>
			  <li><a href="#about">About Us</a></li>
			  <li><a href="#services">Services</a></li>
			  <!--This link will be shown only if an authorized user is Administrator whose role_id is 1-->
				<?php
				if ($_SESSION['role_id']== "1")
					{
						
$_SESSION['alogin']=$_POST['email'];
 $_SESSION['login']=$_POST['email'];
				?>
				 <li><a href="/ip/admin_dashboard.php">Admin</a> </li> 
                <?php
				} 
				?>
			  <li><a href="#portfolio">Dishes</a></li>

			  <li class="menu-has-children"><a href="">Menu</a>
				<ul>
				  <li><a href="all.php">All</a></li>
				  <li><a href="entrees.php">Entrees</a></li>
				  <li><a href="mains.php">Mains</a></li>
				  <li><a href="seafood.php">Seafood</a></li>
				</ul>
			  </li>
			  <li><a href="#contact">Contact</a></li>



		  
		   <?php
				if (isset($_SESSION['role_id'])) {
				?>
				<!--Logout link will be shown only if a user is authorized   ($_SESSION['role_id'] is not empty)-->
				 <li><a  href="\ip\logout.php">Logout</a></li>
				 	
                <?php
				}
				else {
				?>	
				<!--Login  link will be shown only if a user is unauthorized ($_SESSION['role_id'] is empty)-->
				 <li><a  href="#" data-toggle="modal" data-target="#exampleModalCenter">Login</a></li>
				<?php
				}
				?>
								</ul>
      </nav><!-- #nav-menu-container -->

		</div>

		</div>




      <div id="logo" class="pull-left">


    </div>
  </header><!-- #header -->
  
</body>
</html>
