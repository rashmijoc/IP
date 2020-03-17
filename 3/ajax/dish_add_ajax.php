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

    $dishtype_id      = trim(htmlspecialchars(stripslashes(cl($_POST["dishtype_id"]))));
    $dish         = trim(htmlspecialchars(stripslashes(cl($_POST["dish"]))));
    $price = trim(htmlspecialchars(stripslashes(cl($_POST["price"]))));
    $detail    = trim(htmlspecialchars(stripslashes(cl($_POST["detail"]))));

	$query = mysqli_query($mysqli, "INSERT dish (price,dishtype_id,dish,detail) VALUES ('$price','$dishtype_id','$dish','$detail')");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
