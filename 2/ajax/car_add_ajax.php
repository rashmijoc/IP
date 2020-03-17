<?php
/*
************************************************************
Long name   : Internet programming classes - Offline package
Short name  : IPC - Offline package
Online view : http://ipc.alexeyabramov.info/
Author      : Alexey Abramov
E-mail      : abramov.developer@gmail.com
LinkedIn    : https://www.linkedin.com/in/alexey-abramov-kz/
City        : Christchurch / NewZealand 
Year        : 2020
************************************************************
*/
?>

<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";

    $make_id      = trim(htmlspecialchars(stripslashes(cl($_POST["make_id"]))));
    $year         = trim(htmlspecialchars(stripslashes(cl($_POST["year"]))));
    $plate_number = trim(htmlspecialchars(stripslashes(cl($_POST["plate_number"])))); 
    
	$query = mysqli_query($mysqli, "INSERT car (plate_number,make_id,year) VALUES ('$plate_number','$make_id','$year')");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>