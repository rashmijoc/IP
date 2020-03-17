user<?php
/*
************************************************************
Long name   : Internet programming classes - Offline package
Short name  : IPC - Offline package
Online view : http://ipc.alexeyabramov.info/
Author      : Alexey Abramov
E-mail      : abramov.developer@gmail.com
LinkedIn    : https://www.linkedin.com/in/alexey-abramov-kz/
City        : Christchurch / NewZealand
fullname        : 2020
************************************************************
*/
?>

<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";

    $role_id      = trim(htmlspecialchars(stripslashes(cl($_POST["role_id"]))));
    $fullname         = trim(htmlspecialchars(stripslashes(cl($_POST["fullname"]))));
    $email = trim(htmlspecialchars(stripslashes(cl($_POST["email"]))));
		$password = trim(htmlspecialchars(stripslashes(cl($_POST["email"]))));

	$query = mysqli_query($mysqli, "INSERT user (email,role_id,fullname,password) VALUES ('$email','$role_id','$fullname','$password')");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
