Dishtype<?php
session_start();
error_reporting(0);
include('\ip\ajax\manage-users-ajax.php');

include('includes/config.php');


 ?>
<!doctype html>
<html lang="en" class="no-js">

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
  <link href="css/style.css" rel="stylesheet">
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
					<div class="col-lg-2"><img src="img/LOGO.jpg" style="width:100%"/></div>
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

	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">


						<!-- Zero Configuration Table -->
						<div class="panel panel-primary">
							<div class="panel-heading text-white"">Users</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover text-white"" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Dishtype </th>
											


											<th>Action</th>
										</tr>
									</thead>

									<tbody>

									<?php $sql = "SELECT dishtype.id,dishtype.dishtype from  dishtype  ";
										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{				?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->id);?></td>
											<td><?php echo htmlentities($result->dishtype);?></td>

											<td><a href="edit-hairstylist.php?id=<?php echo $result->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-hairstylists.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>

									</tbody>
								</table>



							</div>
						</div>



					</div>
		 	</div>

			</div>



					</div>

					</div>
				<div class="ts-main-content">
 <div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title text-white"">Create Dishtype</h2>


								<div class=" col-4 bg-default panel panel-default">

									<div class="panel-body">
										<form align="left" method="post" name="createsubmit" id="createsubmit" class="form-horizontal" onSubmit="retur click();">


  	        	  <?php if($error1){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error1); ?> </div><?php }
				else if($msg1){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg1); ?> </div><?php }?>


												


										 	<div class="form-group">
												<label class="control-label  text-white"">Dishtype</label>
												<div class="col-sm-24">
													<input type="text" class="form-control" name="Dishtype" id="dishtype" required>
												</div>
											</div>



											<div class="hr-dashed"></div>

											<div class="form-group">
												<div class="col-sm-6 col-sm-offset-4">

																						</div>
													<button class="btn btn-warning  text-white align=right" name="submit" type="submit">Submit</button>
												</div>
											</div>

										</form>

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
	<!-- Loading Scripts -->
	<script src="/ip/js/jquery.min.js"></script>
	<script src="/ip/js/bootstrap-select.min.js"></script>
	<script src="/ip/js/bootstrap.min.js"></script>
	<script src="/ip/js/jquery.dataTables.min.js"></script>
	<script src="/ip/js/dataTables.bootstrap.min.js"></script>
	<script src="/ip/js/Chart.min.js"></script>
	<script src="/ip/js/fileinput.js"></script>
	<script src="/ip/js/chartData.js"></script>
	<script src="/ip/js/main.js"></script>
	<script src="/ip/js/my1.js"></script>
</body>
</html>
