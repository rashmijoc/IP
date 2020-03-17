<?php
/*
************************************************************
Long name  : Internet programming classes - Offline package
Short name : IPC - Offline package
Author     : Alexey Abramov
E-mail     : abramov.developer@gmail.com
LinkedIn   : https://www.linkedin.com/in/alexey-abramov-kz/
City       : Christchurch / NewZealand
service       : 2020
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


	$SQLText = "SELECT * from service where id = $project_id";
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
          <h4 class='modal-title'>service Details</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
		<div class='modal-body'>
			<div class='serviced-body'>
                 <form  class='service_action_form'>

                    <div class='form-group'>
                        <div id='message' class='alert alert-danger mt-1 d-none align-middle text-center'></div>
                    </div>




			       <div class='form-group row'>
                        <label for='service' class='col-md-4 col-form-label text-md-right'>service</label>
                        <div class='col-md-6'>
                            <input type='text' id='service' class='form-control ' name='service' value='$project_data[service]'>
                            <div id='service_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
					<div id='uniquename'  style=display:".$actionshow.";>
					<div class='custom-control custom-checkbox mt-2'>
                                <input type='checkbox' class='custom-control-input' id='service_search' >
                                <label class='custom-control-label' for='service_search'></label>
                            </div>
                    </div>
			</div>



			<div class='form-group row'>
		 						<label for='detail' class='col-md-4 col-form-label text-md-right'>detail</label>
		 						<div class='col-md-6'>
		 								<input type='text' id='detail' class='form-control ' name='detail' value='$project_data[detail]'>
		 								<div id='detail_warning_message' class='text-danger mt-1 d-none'></div>
		 						</div>
		 <div id='uniquename'  style=display:".$actionshow.";>
		 <div class='custom-control custom-checkbox mt-2'>
		 										<input type='checkbox' class='custom-control-input' id='detail_search' >
		 										<label class='custom-control-label' for='detail_search'></label>
		 								</div>
		 				</div>
		 </div>




            </div>
		</div>
        <div class='modal-footer'>
		  <button type='button'  onclick='myFunction()' class='btn btn-success service' data-id=".$id." data-action='".$action."'>".$name_of_a_button."</button>
          <button type='button' onclick='javascript:window.location.reload()' class='btn btn-danger' data-dismiss='modal'>Close</button>
        </div>
      </div>

        ";

?>
