<?php
session_start();
error_reporting(0);
include('includes/config.php');
{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
  <meta charset="utf-8">
  <title>Jamavar IndianKitchen</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


	<title>Jamavar IndianKitchen</title>

  <!-- Favicons -->
  <link href="img/favicon.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <div class="col-10 text-left">
    <link href="img/1.png" rel="icon">

    </div>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <!-- Favicons -->
  <link href="img/favicon.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>
<style>
body {
  background-color: black;

}
</style>
<body>

  <!--==========================
    Header
  ============================-->
   <header id="header">
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 ml-5">
				<div class="row">
					<div class="col-lg-2" ><a href="#intro"><img src="img/LOGO.jpg" class="fusion-web"/></div>
					<div class="col-lg-10 mt-3"><h1><a href="#intro" class="scrollto">Jamavar Indian Kitchen</a><h1></div>
				<!-- Uncomment below if you prefer to use an image logo -->
				</div>
			</div>


		<div class="col-lg-6 mt-3">
		  <nav id="nav-menu-container">
			<ul class="nav-menu">
          <li class="menu-active"><a href="/ip/index.php">Home</a></li>



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
  </header><!-- #header -->
<br>
</br>
<br>
</br><br>
</br>
<br>
</br>
<div class="ts-main-content">
	<?php ?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-black">
												<div class="stat-panel text-center">
<?php
$sql ="SELECT id from user ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>
								 <thead>
      <tr>
        <th>

     <img src="images/img_avatar.png" alt="Avatar" class="avatar">
    					<div class="stat-panel-number h1 "><?php echo htmlentities($regusers);?></div>
													<div    class="stat-panel-title text-uppercase ">Users</div>
												</div>
											<b>
											</b>
											</div>
											<a href="\ip\user\index.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-black">
											</th><div class="stat-panel text-center">


												<?php
													$sql1 ="SELECT id from service ";
													$query1 = $dbh -> prepare($sql1);;
													$query1->execute();
													$results1=$query1->fetchAll(PDO::FETCH_OBJ);
													$totalservices=$query1->rowCount();
												?>
													<th><img src="images/services.png" alt="Avatar" class="avatar">
													<div class="stat-panel-number h1 "><?php echo htmlentities($totalservices);?></div>
													<div class="stat-panel-title text-uppercase ">Listed services</div>
												</div>
											</div>
											<a href="\ip\service\index.php" class="block-anchor panel-footer text-center ">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-black">
												<div class="stat-panel text-center">
</th>
<th>



	<?php
	$sql ="SELECT id from dishtype ";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$regusers=$query->rowCount();
	?>
									 <thead>
	      <tr>
	        <th>

	     <img src="images/dishtype.png" alt="Avatar" class="avatar">
	    					<div class="stat-panel-number h1 "><?php echo htmlentities($regusers);?></div>
														<div    class="stat-panel-title text-uppercase ">Dishtype</div>
													</div>
												<b>
												</b>
												</div>
												<a href="\ip\dishtype\index.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-success text-black">
												</th><div class="stat-panel text-center">




													<?php
													$sql ="SELECT id from car ";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results=$query->fetchAll(PDO::FETCH_OBJ);
													$regusers=$query->rowCount();
													?>
																					 <thead>
																<tr>
																	<th>

															 <img src="images/dishtype.png" alt="Avatar" class="avatar">
																				<div class="stat-panel-number h1 "><?php echo htmlentities($regusers);?></div>
																										<div    class="stat-panel-title text-uppercase ">Car</div>
																									</div>
																								<b>
																								</b>
																								</div>
																								<a href="\ip\2\index.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
																							</div>
																						</div>
																						<div class="col-md-3">
																							<div class="panel panel-default">
																								<div class="panel-body bk-success text-black">
																								</th><div class="stat-panel text-center">




	<?php
	$sql ="SELECT id from dish ";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$regusers=$query->rowCount();
	?>
									 <thead>
	      <tr>
	        <th>

	     <img src="images/dish.png" alt="Avatar" class="avatar">
	    					<div class="stat-panel-number h1 "><?php echo htmlentities($regusers);?></div>
														<div    class="stat-panel-title text-uppercase ">Dishes</div>
													</div>
												<b>
												</b>
												</div>
												<a href="\ip\dish\index.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-success text-black">
												</th><div class="stat-panel text-center">


<?php
$sql2 ="SELECT id from booking ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>
<img src="images/booking.png" alt="Avatar" class="avatar">
													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
													<div class="stat-panel-title text-uppercase">Total Bookings</div>
												</div>
											</div>
											<a href="\ip\booking\index.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

<!--
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
</th>
<th>
<?php
$sql4 ="SELECT id from tblsubscribers ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$subscribers=$query4->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($subscribers);?></div>
													<div class="stat-panel-title text-uppercase">Subscibers</div>
												</div>
											</div>
											<a href="manage-subscribers.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div> -->
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-black">
												<div class="stat-panel text-center">
</th>
<th>
		<?php
$sql6 ="SELECT id from contact_us ";
$query6 = $dbh -> prepare($sql6);;
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$contactus=$query6->rowCount();
?>
													<img src="images/img_avatar2.png" alt="Avatar" class="avatar">
												<div class="stat-panel-number h1 "><?php echo htmlentities($contactus);?></div>
													<div class="stat-panel-title text-uppercase">Queries</div>
												</div>
											</div>
											<a href="manage-messages.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

		<!--
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">


</th>
<th>
<?php
$sql5 ="SELECT id from tbltestimonial ";
$query5= $dbh -> prepare($sql6);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$testimonials=$query5->rowCount();
?>

													<div class="stat-panel-number h1 "><?php echo htmlentities($testimonials);?></div>
													<div class="stat-panel-title text-uppercase">Testimonials</div>
												</div>
											</div>
											<a href="testimonials.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>









			</div>
		</div>
	</div>
	</th>
 </tr>
					</thead> -->



	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

	<script>

	window.onload = function(){

		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});

		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>
