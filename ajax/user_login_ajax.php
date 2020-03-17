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
//Start session
session_start();
//Include file to get connection to MySQL
include $_SERVER['DOCUMENT_ROOT'] . "/ip/modules/template/config.php";

//Check if 2 values email and a password are given
if ($_POST["email1"] != '' and $_POST["password"] != '') {
        
		//Declare 2 variables    
		$email    = cleanData($_POST["email1"]);
		$password = cleanData($_POST["password"]);
        
		//Create a query which helps us to check if there is a user in a database who tries to log in
        $query = $mysqli->query("SELECT * FROM user WHERE email='" . $email . "' AND password='" . $password . "'");
        $myrow = $query->fetch_assoc();
        
		//If there is no such a record inside of a database then we return 2 parameters resultOK=false and a message to my.js
        if (empty($myrow['id'])) {
            header('Content-type: application/json; charset=utf-8');
            $massiv_jasone['resultOK'] = false;
            $massiv_jasone['message']  = 'Autorization is not successfull! Email or password is incorrect!';
            $jason_encode              = json_encode($massiv_jasone);
            echo $jason_encode;
        } else {
			//If user is found then
			//we create 5 sessions and put values of a found user inside of it
            $_SESSION['fullname'] = $myrow['fullname'];
            $_SESSION['password'] = $myrow['password'];
            $_SESSION['email']    = $myrow['email'];
            $_SESSION['user_id']   = $myrow['id'];
            $_SESSION['role_id']  = $myrow['role_id'];
            
			//After we define what role does he have based on a value from 'role_id'
            $query            = $mysqli->query("SELECT id, role FROM role WHERE id = " . $myrow['role_id']);
            $myrow            = $query->fetch_assoc();
            $_SESSION['role'] = $myrow['role'];
            //We return 2 parameters resultOK=true and a message to my.js
            header('Content-type: application/json; charset=utf-8');
            $massiv_jasone['resultOK'] = true;
            $massiv_jasone['message']  = 'OK';
            $jason_encode              = json_encode($massiv_jasone);
            echo $jason_encode;
        }
} else {
	//We return 2 parameters resultOK=false and a message to my.js
    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = false;
    $massiv_jasone['message']  = 'ERROR';
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
}
?>