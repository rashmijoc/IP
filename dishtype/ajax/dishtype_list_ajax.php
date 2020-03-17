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

<div class="modal fade" id="myModal">
	<div class='modal-dialog'>
	</div>
</div>



<br>




<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/ip/config.php";

		$mainSQL= "SELECT dishtype.id,dishtype.dishtype FROM dishtype ";


if ($_POST["searchSqlString"] != '') {
		$mainSQL = $mainSQL." ".$_POST["searchSqlString"]." order by dishtype.id DESC";
	} else {
		$mainSQL = $mainSQL." order by dishtype.id DESC";
	}

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
	<?php

echo " <div class='btn-group'>
				  <button type='button' class='btn btn-primary dishtype' id='add' data-id='".$row['id']."' data-action='add'>ADD</button>
				  </div>
				   ";


echo " <div class='btn-group'>
				  <button type='button' class='btn btn-primary dishtype' id='search' data-id='".$row['id']."' data-action='search'>SEARCH</button>
				  </div>
				   ";
	?>

<table class="table table-hover" id="dishtype">
  <thead>
    <tr class="table-info">
		<th scope="col">Edit</th>
	    <th scope="col">Delete</th>
		<th scope="col">ID</th>
      <th scope="col">Dishtype</th>

    </tr>
  </thead>
  <tbody>

<?php

$query = $mysqli->query($mainSQL." LIMIT $start_from, $record_per_page");
        while($row = mysqli_fetch_assoc($query)) {
			echo "<tr  class='table-info' id='record_".$row['id']."' >";

			echo "<td><div class='btn-group'>
				  <button type='button' class='btn btn-primary dishtype' id='edit_dishtype' data-id='".$row['id']."' data-action='edit'>Edit</button>
				  </div>
				  </td>";
					echo "<td><div class='btn-group'>
 				 <button type='button' class='btn btn-danger dishtype_delete' id='delete' data-id='".$row['id']."' data-action='delete'>Delete</button>
 				 </div>
 				 </td>";


echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['dishtype'] . "</td>";


			echo "</tr>";
        }
?>
 </tbody>
 </table>

<?php
	echo paginator($mainSQL,$record_per_page);
?>
