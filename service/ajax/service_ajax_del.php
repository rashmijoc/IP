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

	$id     = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));

    $query = mysqli_query($mysqli, "DELETE FROM service WHERE id='$id'");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
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
