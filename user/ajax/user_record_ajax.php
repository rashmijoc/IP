<?php
/*
************************************************************
Long name  : Internet programming classes - Offline package
Short name : IPC - Offline package
Author     : Alexey Abramov
E-mail     : abramov.developer@gmail.com
LinkedIn   : https://www.linkedin.com/in/alexey-abramov-kz/
City       : Christchurch / NewZealand
fullname       : 2020
************************************************************
*/
?>

<script type="text/javascript" language="JavaScript"><!--
function HideContent(d) {
document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
document.getElementById(d).style.display = "block";
}
function ReverseDisplay(d) {
if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; }
else { document.getElementById(d).style.display = "none"; }
}
//--></script>




<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";
	$project_id = $_POST['id'];


	$SQLText = "SELECT * from user where id = $project_id";
	$query = $mysqli->query($SQLText);
	$project_data = mysqli_fetch_array($query);
	//echo $_POST['action'];

	if ($_POST['action']=='edit')
	{
		$id = $project_id;
		$action = "update";
		$name_of_a_button = "Update";
		$actionshow="none";
	}
	if ($_POST['action']=='add')
	{
		$id ="0";
		$action = "insert";
		$name_of_a_button="Add";
			$actionshow="none";
	}
	if ($_POST['action']=='search')
	{
		$id ="0";
		$action = "fetch";
		$name_of_a_button="Search";
			$actionshow="block";
	}
		if ($_POST['action']=='delete')
	{
		$id ="0";
		$action = "delete";
		$name_of_a_button="Delete";
			$actionshow="none";
	}
	echo "
		<div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>user Details</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
		<div class='modal-body'>
			<div class='userd-body'>
                 <form  class='user_action_form'>

                    <div class='form-group'>
                        <div id='message' class='alert alert-danger mt-1 d-none align-middle text-center'></div>
                    </div>

	                    <div class='form-group row'>
                        <label for='role_id' class='col-md-4 col-form-label text-md-right '>role</label>
                        <div class='col-md-6'>



                            <div id='role_id_warning_message' class='text-danger mt-1 d-none'></div>

                        </div>
					<div id='uniquename'  style=display:".$actionshow.";>

						     <div class='custom-control custom-checkbox mt-2'  id='myDIV' >
                                <input type='checkbox' class='custom-control-input' id='role_id_search' >
                                <label class='custom-control-label' for='role_id_search'></label>
                            </div>
							 </div>
                    </div>

			       <div class='form-group row'>
                        <label for='fullname' class='col-md-4 col-form-label text-md-right'>fullname</label>
                        <div class='col-md-6'>
                            <input type='text' id='fullname' class='form-control only_integers_allowed only_defined_integers_allowed' name='fullname' value='$project_data[fullname]'>
                            <div id='fullname_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
					<div id='uniquename'  style=display:".$actionshow.";>
					<div class='custom-control custom-checkbox mt-2'>
                                <input type='checkbox' class='custom-control-input' id='fullname_search' >
                                <label class='custom-control-label' for='fullname_search'></label>
                            </div>
                    </div>
			</div>

			       <div class='form-group row'>
                        <label for='password' class='col-md-4 col-form-label text-md-right'>Plate number</label>
                        <div class='col-md-6'>
                            <input type='text' id='password' class='form-control' name='password' value='$project_data[password]'>
                            <div id='password_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
						<div id='uniquename'  style=display:".$actionshow.";>
						<div class='custom-control custom-checkbox mt-2'>
                                <input type='checkbox' class='custom-control-input' id='password_search' >
                                <label class='custom-control-label' for='password_search'></label>
                            </div>
							</div>
                    </div>


										<div class='form-group row'>
															 <label for='email' class='col-md-4 col-form-label text-md-right'>Plate number</label>
															 <div class='col-md-6'>
																	 <input type='text' id='password' class='form-control' name='email' value='$project_data[password]'>
																	 <div id='email_warning_message' class='text-danger mt-1 d-none'></div>
															 </div>
									 <div id='uniquename'  style=display:".$actionshow.";>
									 <div class='custom-control custom-checkbox mt-2'>
																			 <input type='checkbox' class='custom-control-input' id='emailsearch' >
																			 <label class='custom-control-label' for='email_search'></label>
																	 </div>
										 </div>
													 </div>




            </div>
		</div>
        <div class='modal-footer'>
		  <button type='button'  onclick='myFunction()' class='btn btn-success user' data-id=".$id." data-action='".$action."'>".$name_of_a_button."</button>
          <button type='button' onclick='javascript:window.location.reload()' class='btn btn-danger' data-dismiss='modal'>Close</button>
        </div>
      </div>

        ";

?>
