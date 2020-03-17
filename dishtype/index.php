<?php
session_start();
error_reporting(0);


 ?>
 <?php

	include $_SERVER['DOCUMENT_ROOT'] . "/ip/1/config.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";

?>


<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<meta name="pragma" content="no-cache" />
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

 <link rel="stylesheet" href="{% static 'simplemde/debug/simplemde.css' %}" />

  <!-- Favicons -->
  <link href="img/favicon.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <div class="col-10 text-left">
    <link href="img/1.png" rel="icon">

    </div>

  <!-- Google Fonts -->

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/my.css" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">

</head>
	<style>
body {
  background-color: black;
    background-image: url("paper.gif");
}
#content-wrapper {

  background: url(bg2.jpg);
  background-repeat: no-repeat;
  background-size: auto;
}
</style>
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

		</style>
<style>

.page-link {

  position: relative;

  display: block;

  padding: 0.5rem 0.75rem;

  margin-left: -1px;

  line-height: 1.25;

  color: #003C00;

  background-color: #D8EBEB;

  border: 1px solid #346767;

}

.page-item.disabled .page-link {

  color: #868e96;

  pointer-events: none;

  cursor: auto;

  background-color: #CEFFCE;

  border-color: #718393;

}

.page-item.active .page-link {

  z-index: 1;

  color: #fff;

  background-color: #003C00;

  border-color: #AEFF5E;

}

.page-link:focus, .page-link:hover {

  color: #000;

  text-decoration: none;

  background-color: #003C00;

  border-color: #AEFF5E;

}

</style>
</head>

<body>


  <!--==========================
    Header
  ============================-->
   <header id="header">
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 ml-5">
				<div class="row">
          <div class="col-lg-2"><a href="#intro"><img src="/ip/img/LOGO.jpg"class="fusion-web"/></div>
					<div class="col-lg-10 mt-3"><h1><a href="#intro" class="scrollto">Jamavar Indian Kitchen</a></h1></div>
				<!-- Uncomment below if you prefer to use an image logo -->
				</div>
			</div>


		<div class="col-lg-6 mt-3">
		  <nav id="nav-menu-container">
			<ul class="nav-menu">
          <li class="menu-active"><a href="/ip/index.php">Home</a></li>

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
        <header class="blog-header py-3">

        </header>
</div>

<main class="container">


	<div class="table-responsive" id="dishtype_data"></div>

</main>


<script src="/ip/js/jquery-3.1.0.min.js" type="text/javascript" ></script>
<script src="/ip/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/ip/js/jquery.form.js" type="text/javascript"></script>
<script src="/ip/js/jquery-ui.js" type="text/javascript"></script>
<script src="/ip/js/sweetalert2@8.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/my.js"></script>
<script src="js/upload.js"></script>
<script src="js/del.js"></script>
<script src="js/search.js"></script>
	<script src="/ip/js/bootstrap-select.min.js"></script>
	<script src="/ip/js/bootstrap.min.js"></script>
	<script src="/ip/js/jquery.dataTables.min.js"></script>
	<script src="/ip/js/dataTables.bootstrap.min.js"></script>
	<script src="/ip/js/Chart.min.js"></script>
	<script src="/ip/js/fileinput.js"></script>
</body>

</html>
