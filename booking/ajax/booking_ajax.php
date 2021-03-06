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
booking        : 2020
************************************************************
*/
?>

<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";

	if ($_POST["id"] != '') {

	$id     = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));


	$name         = trim(htmlspecialchars(stripslashes(cl($_POST["name"]))));
	$address         = trim(htmlspecialchars(stripslashes(cl($_POST["address"]))));
	$phonenumber         = trim(htmlspecialchars(stripslashes(cl($_POST["phonenumber"]))));
	$date         = trim(htmlspecialchars(stripslashes(cl($_POST["date"]))));
	$time         = trim(htmlspecialchars(stripslashes(cl($_POST["time"]))));
	$pax         = trim(htmlspecialchars(stripslashes(cl($_POST["pax"]))));




    $query = mysqli_query($mysqli, "UPDATE booking SET name='$name',address='$address',phonenumber='$phonenumber',date='$date',time='$time,pax='$pax' WHERE id='$id'");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK : ".$id;
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
} else {


    $booking         = trim(htmlspecialchars(stripslashes(cl($_POST["booking"]))));
    $detail = trim(htmlspecialchars(stripslashes(cl($_POST["detail"]))));

		$query = mysqli_query($mysqli, "INSERT booking (name,address,phonenumber,date,time,pax) VALUES ('$name','$address','$phonenumber','$date','$time','$pax')");


    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

}


?>
