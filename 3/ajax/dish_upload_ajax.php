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

    if ($_POST["id"] != '') {
		$src = $_FILES['file']['tmp_name'];
		$validextensions = array("jpeg", "jpg", "gif", "JPEG", "JPG", "GIF");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		//$targ = "images/".$_FILES['file']['name'];//Upload file with a name as it is
		//$targ = "../images/".$_POST['id'].".".$file_extension;
		$targ = "../images/".$_POST['image_name'].".".$file_extension;
		$id     = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));
		$image_name = $_POST['image_name'] ."." . $file_extension;

		if(in_array($file_extension, $validextensions))
		{
			if(move_uploaded_file($src, $targ))
			{
				$query = mysqli_query($mysqli, "UPDATE dish SET image_name='$image_name' WHERE id='$id'");
				echo "File Uploaded Successfully";
			}else{
				echo "Failed";
			}
		}else{
			echo "Only allowed jpeg,jpg and gif extension";
		}
} else {
		echo "Failed";
}

?>
