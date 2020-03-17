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

<div class="modal fade" id="myModal">
	<div class='modal-dialog'>
	</div>
</div>

<br>
<div class="row">
<div class="col-md-6">
<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";

		$mainSQL= "SELECT dish.id,dishtype.dishtype,dish.dish,dish.price,dish.image_name, dish.detail FROM dish,dishtype WHERE dish.dishtype_id = dishtype.id order by dish.id ASC";

	$record_per_page = 3;

	if(isset($_POST["page"])){
		$page = $_POST["page"];
	}else{
		$page = 1;
	}
	$start_from = ($page - 1)*$record_per_page;

	echo paginator($mainSQL,$record_per_page);
?>
</div>
		</div>
<table class="table table-hover" id="dish">
  <thead>
    <tr class="table-info">
		<th scope="col">Edit</th>
	    <th scope="col">Delete</th>
		<th scope="col">ID</th>
      <th scope="col">Dishtype</th>
      <th scope="col">Dish</th>
      <th scope="col">Price</th>
			<th scope="col">Detail</th>
      <th scope="col">Choose File</th>

	  <th scope="col">Photo</th>
    </tr>
  </thead>
  <tbody>

<?php
$query = $mysqli->query($mainSQL." LIMIT $start_from, $record_per_page");
        while($row = mysqli_fetch_assoc($query)) {
			echo "<tr  class='table-info' id='record_".$row['id']."' >";

			echo "<td><div class='btn-group'>
				  <button type='button' class='btn btn-primary dish_edit' id='edit_dish' data-id='".$row['id']."' data-action='edit'>Edit</button>
				  </div>
				  </td>";


				  echo "<td><div class='btn-group'>
				  <button type='button' class='btn btn-danger dish' id='delete_dish' data-id='".$row['id']."' data-action='delete'>Delete</button>
				  </div>
				  </td>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['dishtype'] . "</td>";
			echo "<td>" . $row['dish'] . "</td>";
			echo "<td>" . $row['price'] . "</td>";
			echo "<td>" . $row['detail'] . "</td>";


			echo "<td>

					<div class='custom-file '>
						<input type='file' id='fileImage_" . $row['id'] . "' data-id='".$row['id']."' class='btnUpload' name='myfile' class='form-control-file form-control-sm p-1 mr-sm-2 btn-sm my-2 custom-file-input my-sm-0' >
						<label class='custom-file-label ' for='fileImage_" . $row['id'] . "' >Choose file</label>
					</div>

				  </td>";

			 if (empty($row['image_name'])) {
				 echo "<td>
						<img src='noimage.jpg' class='rounded img-thumbnail' alt='".$row['id']."' id='recordImage_".$row['id']."' width='150' height='100'>
					  </td>";
			 } else {
				 echo "<td>
						<img src='images/".$row['image_name']."' class='rounded img-thumbnail' alt='".$row['id']."' id='recordImage_".$row['id']."' width='150' height='100'>
					  </td>";
			 }
			echo "</tr>";
        }
?>
 </tbody>
 </table>

<?php
	echo paginator($mainSQL,$record_per_page);
?>
