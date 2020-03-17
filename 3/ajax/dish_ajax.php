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
dish        : 2020
************************************************************
*/
?>

<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";

	if ($_POST["id"] != '') {
	$src = $_FILES['file']['tmp_name'];
		$validextensions = array("jpeg", "jpg", "gif", "JPEG", "JPG", "GIF");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);

	$targ = "../images/".$_POST['image_name'].".".$file_extension;
	$image_name = $_POST['image_name'] ."." . $file_extension;
	$id     = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));

    $dishtype_id      = trim(htmlspecialchars(stripslashes(cl($_POST["dishtype_id"]))));
    $dish         = trim(htmlspecialchars(stripslashes(cl($_POST["dish"]))));
    $price = trim(htmlspecialchars(stripslashes(cl($_POST["price"]))));
    $detail    = trim(htmlspecialchars(stripslashes(cl($_POST["detail"]))));

    $query = mysqli_query($mysqli, "UPDATE dish SET price='$price',dishtype_id='$dishtype_id',dish='$dish',detail='$detail',image_name='$image_name' WHERE id='$id'");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK : ".$id;
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
} else {
    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = false;
    $massiv_jasone['message']  = "ERROR";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
}


?>
