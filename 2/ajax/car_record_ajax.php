<?php
/*
************************************************************
Long name  : Internet programming classes - Offline package
Short name : IPC - Offline package
Author     : Alexey Abramov
E-mail     : abramov.developer@gmail.com
LinkedIn   : https://www.linkedin.com/in/alexey-abramov-kz/
City       : Christchurch / NewZealand 
Year       : 2020
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
	 
	
	$SQLText = "SELECT * from car where id = $project_id";
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
          <h4 class='modal-title'>Car Details</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
		<div class='modal-body'>
			<div class='card-body'>
                 <form  class='car_action_form'>

                    <div class='form-group'>
                        <div id='message' class='alert alert-danger mt-1 d-none align-middle text-center'></div>
                    </div>

	                    <div class='form-group row'>
                        <label for='make_id' class='col-md-4 col-form-label text-md-right '>Make</label>
                        <div class='col-md-6'>

                            <select class='form-control' name='make_id' id='make_id'>
                                <option value='0'>=== Select MAKE ===</option>
							";
											$query = $mysqli->query("SELECT id,make FROM make");
											while($row = mysqli_fetch_assoc($query)) {
												$selected = ($row['id'] == $project_data['make_id']) ? ' selected' : '';
												echo "<option ".$selected." value=".$row['id'].">".$row['make']."</option>";
											}
							echo "						
							
                            </select>

                            <div id='make_id_warning_message' class='text-danger mt-1 d-none'></div>

                        </div>
					<div id='uniquename'  style=display:".$actionshow.";>

						     <div class='custom-control custom-checkbox mt-2'  id='myDIV' >
                                <input type='checkbox' class='custom-control-input' id='make_id_search' >
                                <label class='custom-control-label' for='make_id_search'></label>
                            </div>
							 </div>	
                    </div>

			       <div class='form-group row'>
                        <label for='year' class='col-md-4 col-form-label text-md-right'>Year</label>
                        <div class='col-md-6'>
                            <input type='text' id='year' class='form-control only_integers_allowed only_defined_integers_allowed' name='year' value='$project_data[year]'>
                            <div id='year_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
					<div id='uniquename'  style=display:".$actionshow.";>
					<div class='custom-control custom-checkbox mt-2'>
                                <input type='checkbox' class='custom-control-input' id='year_search' >
                                <label class='custom-control-label' for='year_search'></label>
                            </div>
                    </div>
			</div>
			
			       <div class='form-group row'>
                        <label for='plate_number' class='col-md-4 col-form-label text-md-right'>Plate number</label>
                        <div class='col-md-6'>
                            <input type='text' id='plate_number' class='form-control' name='plate_number' value='$project_data[plate_number]'>
                            <div id='plate_number_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
						<div id='uniquename'  style=display:".$actionshow.";>
						<div class='custom-control custom-checkbox mt-2'>
                                <input type='checkbox' class='custom-control-input' id='plate_number_search' >
                                <label class='custom-control-label' for='plate_number_search'></label>
                            </div>	
							</div>
                    </div>
 
				

				    
					 	 
            </div>
		</div>
        <div class='modal-footer'>
		  <button type='button'  onclick='myFunction()' class='btn btn-success car' data-id=".$id." data-action='".$action."'>".$name_of_a_button."</button>
          <button type='button' onclick='javascript:window.location.reload()' class='btn btn-danger' data-dismiss='modal'>Close</button>
        </div>
      </div>
	
        ";
 
?>

