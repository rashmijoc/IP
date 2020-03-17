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

if($_POST['id']) {
	$id      = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));
	$query = $mysqli->query("SELECT * FROM dish WHERE id=".$id);
	$myrow = $query->fetch_assoc();

        echo "
		<div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Edit a record with id: $myrow[id]</h4>
          <button type='button'  onclick='javascript:window.location.reload()' class='close' data-dismiss='modal'>&times;</button>
        </div>

        <div class='modal-body'>
				<div class='card-body'>
                <form class='car_action_form'>

                    <div class='form-group'>
                        <div id='message' class='alert alert-danger mt-1 d-none align-middle text-center'></div>
                    </div>

	                    <div class='form-group row'>
                        <label for='dishtype_id' class='col-md-4 col-form-label text-md-right '>Dishtype</label>
                        <div class='col-md-6'>

                            <select class='form-control' name='dishtype_id' id='dishtype_id'>
                                <option value='0'>=== Select dishtype ===</option>
							";
											$query = $mysqli->query("SELECT id,dishtype FROM dishtype");
											while($row = mysqli_fetch_assoc($query)) {
												$selected = ($row['id'] == $myrow['dishtype_id']) ? ' selected' : '';
												echo "<option ".$selected." value=".$row['id'].">".$row['dishtype']."</option>";
											}
							echo "

                            </select>

                            <div id='dishtype_id_warning_message' class='text-danger mt-1 d-none'></div>

                        </div>
                    </div>

			       <div class='form-group row'>
                        <label for='dish' class='col-md-4 col-form-label text-md-right'>Dish</label>
                        <div class='col-md-6'>
                            <input type='text' id='dish' class='form-control' name='dish' value='$myrow[dish]'>
                            <div id='dish_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
                    </div>
										<div class='form-group row'>
									 						<label for='dish' class='col-md-4 col-form-label text-md-right'>Dish</label>
									 						<div class='col-md-6'>
									 								<input type='text' id='dish' class='form-control' name='dish' value='$myrow[dish]'>
									 								<div id='dish_warning_message' class='text-danger mt-1 d-none'></div>
									 						</div>
									 				</div>

			       <div class='form-group row'>
                        <label for='price' class='col-md-4 col-form-label text-md-right'>Price</label>
                        <div class='col-md-6'>
                            <input type='text' id='price' class='form-control' name='price' value='$myrow[price]'>
                            <div id='price_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
                    </div>




                    <div class='form-group row'>
                        <label for='available' class='col-md-4 col-form-label text-md-right'>Photo</label>
                        <div class='col-md-6'>
                         	<div class='custom-file '>
						<input type='file' id='fileImage_" . $row['id'] . "' data-id='".$row['id']."' class='btnUpload' name='myfile' class='form-control-file form-control-sm p-1 mr-sm-2 btn-sm my-2 custom-file-input my-sm-0' >

					</div>

                        </div>
                    </div>

			        </form>
            </div>

		</div>
        <div class='modal-footer'>
		  <button type='button' onclick='javascript:window.location.reload()'class='btn btn-success dish_edit' data-id='$myrow[id]' data-action='update'>Update</button>
          <button type='button' onclick='javascript:window.location.reload()' class='btn btn-danger' data-dismiss='modal'>Close</button>
        </div>
      </div>
        ";
}

?>
