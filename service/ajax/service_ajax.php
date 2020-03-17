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
service        : 2020
************************************************************
*/
?>

<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";

	if ($_POST["id"] != '') {

	$id     = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));


    $service         = trim(htmlspecialchars(stripslashes(cl($_POST["service"]))));
		$detail         = trim(htmlspecialchars(stripslashes(cl($_POST["detail"]))));


    $query = mysqli_query($mysqli, "UPDATE service SET service='$service',detail='$detail' WHERE id='$id'");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK : ".$id;
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
} else {


    $service         = trim(htmlspecialchars(stripslashes(cl($_POST["service"]))));
    $detail = trim(htmlspecialchars(stripslashes(cl($_POST["detail"]))));

	$query = mysqli_query($mysqli, "INSERT service (service,detail) VALUES ('$service'.'$detail')");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

}


?>
