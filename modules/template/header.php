<?php
/*
************************************************************
Long name  : Internet Project Framework
Short name : IPF
Author     : Alexey Abramov
E-mail     : abramov.developer@gmail.com
LinkedIn   : https://www.linkedin.com/in/alexey-abramov-kz/
City       : Christchurch / NewZealand
Year       : 2020
************************************************************
*/
?>


<header id="header">
  <div class="container-fluid">
  <div class="row">
    <div class="col-lg-5 ml-5">
    				<div class="row" >
    					<div class="col-lg-2" ><a href="#intro"><img src="img/LOGO.jpg" class="fusion-web"/></div>
    					<div class="col-lg-10 mt-3"><h1><a href="#intro" class="scrollto">Jamavar Indian Kitchen</a><h1></div>
    				<!-- Uncomment below if you prefer to use an image logo -->

      </div>
    </div>


  <div class="col-lg-6 mt-3">
    <nav id="nav-menu-container">
    <ul class="nav-menu">
      <li class="menu-active"><a href="#intro">Home</a></li>
      <li><a href="#about">About Us</a></li>
      <li><a href="#services">Services</a></li>

      <li><a href="#portfolio">Dishes</a></li>

  <!--	  <li class="menu-has-children"><a href="">Menu</a>
      <ul>
        <li><a href="all.php">All</a></li>
        <li><a href="entrees.php">Entrees</a></li>
        <li><a href="mains.php">Mains</a></li>
        <li><a href="seafood.php">Seafood</a></li>
      </ul>
    </li>-->
      <li><a href="#contact">Contact</a></li>


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
