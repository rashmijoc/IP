
<!-- this will execute the login system and will allow the user to get an access to the application
  and database once the required credentials are met. The access will depend on the given rights to the
  user. -->
<?php

if(isset($_POST['login']))
{
	
$email=$_POST['email'];
$password=($_POST['password']);
$sql ="SELECT EmailId,Password, FullName FROM users WHERE EmailId=:email and Password=:password and userrole='1' ";
$sql1 ="SELECT EmailId,Password, FullName FROM users WHERE EmailId=:email and Password=:password and userrole='2' ";
$sql2 ="SELECT EmailId,Password, FullName FROM users WHERE EmailId=:email and Password=:password and userrole='3' ";
$query= $dbh -> prepare($sql);
$query1= $dbh -> prepare($sql1);
$query2= $dbh -> prepare($sql2);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
 $query1-> bindParam(':email', $email, PDO::PARAM_STR);
$query1-> bindParam(':password', $password, PDO::PARAM_STR);
 $query2-> bindParam(':email', $email, PDO::PARAM_STR);
$query2-> bindParam(':password', $password, PDO::PARAM_STR);
 $query-> execute(); 
$query1-> execute(); 
$query2-> execute(); 
$results=$query->fetchAll(PDO::FETCH_OBJ);
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
 
{  
$_SESSION['alogin']=$_POST['email'];
 $_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'forbidden.html'</script>";
} 
	if($query1->rowCount() > 0)
 
  
{  
$_SESSION['alogin']=$_POST['email'];
 $_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'admin_dashboard.php'</script>";
} 
	if($query2->rowCount() > 0)
 
{  
$_SESSION['alogin']=$_POST['email'];
 $_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'staff_dashboard.php'</script>";
} 
 else{
  
  echo "<script >alert('Login and Password is Invalid');</script>"; 

}

}

?>


 
     <script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	 <html lang="en">
	 <head>
	 <script src='https://www.google.com/recaptcha/api.js'></script>
	 
</head>
	<body> 

	<!-- <p> <?php echo $error; $error; $msg; ?> </p> -->

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Login</h3>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
               
              <form  method="post" name="login" onSubmit="return submit_login();">
                <div class="form-group"> 
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email address*" required="required">
                </div>
		 
                <div class="form-group">
                  <input type="password" class="form-control" name="password" data-rule-required="true" placeholder="Password*" required="required" >
                </div>
			 
                <div class="form-group checkbox">
                  
               
                </div>
               
				<div class="g-recaptcha" id="myField" data-sitekey="6Lf6YbcUAAAAAB8WxmWjlHF381RobW9BQFs1hm9p" data-callback="recaptcha_callback" ></div>
				 <div class="form-group">
				 
                  <input type="submit" name="login" id="login" value="Login" class="btn-primary">
                </div>
				<span id='errorContainer'></span>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
	   
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div> 
<script type="text/javascript">
       function recaptcha_callback() {
       $('#submit_login').removeAttr('disabled');
        };                                  
 </script>
	</script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lf6YbcUAAAAAB8WxmWjlHF381RobW9BQFs1hm9p', {action: 'homepage'}).then(function(token) {
        console.log(token);
        });
    });
