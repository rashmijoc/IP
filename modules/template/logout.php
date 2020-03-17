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

<?php
	//Delete all the session variables which we got from login action
	unset($_SESSION['password']);
	unset($_SESSION['email']); 
	unset($_SESSION['user_id']);
	unset($_SESSION['role']);
	unset($_SESSION['role_id']);
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=/'></head></html>");
?>
