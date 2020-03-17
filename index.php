
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
	//Include config.php file to read some instructions
	include $_SERVER['DOCUMENT_ROOT'] . "/ip/modules/template/config.php";

	if($_GET) {
		foreach ($_GET as $k=>$v) {
			$_GET[$k] = htmlspecialchars(strip_tags(mysqli_real_escape_string($mysqli,str_replace("'","",$v))));
			}
	}

	if($_POST) {
		foreach ($_POST as $k=>$v) {
			$_POST[$k] = htmlspecialchars(strip_tags(str_replace("'","",$v)));
		}
	}


if (empty($_GET)) {
	$title = 'Home';
	$description = '';
	$keywords = ' ';
	$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/template/index_page.php";
} else {

	switch(cleanData($_GET['page'])){

			case 'login':
				$title = 'Autorization';
				$description = 'User autorization';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/template/login.php";
			break;

			case 'page1':

				if ($_SESSION['role_id'] != 1 ){
					$access_denided_message = 'Sorry, but you can\'t see Page 1 page because you are not administrator.';
					$fileBody = $fileAccessDenied;
					break;
				}

				$title = 'Page 1';
				$description = 'Page 1';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/page1.php";
			break;

			case 'page2':

				if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 2 ){
					$access_denided_message = 'Sorry, but you can\'t see Test 2 page because you are not staff or administrator.';
					$fileBody = $fileAccessDenied;
					break;
				}

				$title = 'Page 2';
				$description = 'Page 2';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/page2.php";
			break;

			case 'page3':

				if ($_SESSION['role_id'] != 3 ){
					$access_denided_message = 'Sorry, but you can\'t see Test 2 page because you are not customer.';
					$fileBody = $fileAccessDenied;
					break;
				}

				$title = 'Page 3';
				$description = 'Page 3';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/page3.php";
			break;


			case 'page4':

				if ($_SESSION['role_id'] != 3 ){
					$access_denided_message = 'Sorry, but you can\'t see Test 2 page because you are not customer.';
					$fileBody = $fileAccessDenied;
					break;
				}

				$title = 'Page 4';
				$description = 'Page 4';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/page4.php";
			break;


			case 'page5':

				if ($_SESSION['role_id'] != 2 ){
					$access_denided_message = 'Sorry, but you can\'t see Test 2 page because you are not staff.';
					$fileBody = $fileAccessDenied;
					break;
				}

				$title = 'Page 5';
				$description = 'Page 5';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/page5.php";
			break;


			case 'page6':

				if ($_SESSION['role_id'] != 3 ){
					$access_denided_message = 'Sorry, but you can\'t see Page 6 page because you are not customer.';
					$fileBody = $fileAccessDenied;
					break;
				}

				$title = 'Page 6';
				$description = 'Page 6';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/page6.php";
			break;

			case 'logout':

				if (!ISSET($_SESSION['role_id']) ){
					$access_denided_message = 'Sorry, but you can\'t logout because you are not still logged in.';
					$fileBody = $fileAccessDenied;
					break;
				}

				$title = 'Logout';
				$description = 'User logout';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/template/logout.php";
			break;


			break;

			default:
				$title = 'Home';
				$description = 'Home';
				$keywords = 'Home';
				$fileBody = $_SERVER['DOCUMENT_ROOT']."/ip/modules/template/index_page.php";
			break;
	}

}
	//Design a page
	include $fileTechHeader; //Predifined path to file which can be changed in a '\modules\template\config.php' file
	include $fileHeader;     //Predifined path to file which can be changed in a '\modules\template\config.php' file
	include $fileBody;       //Design of a file body page identified on a 'case level' above
	include $fileFooter;     //Predifined path to file which can be changed in a '\modules\template\config.php' file

?>
