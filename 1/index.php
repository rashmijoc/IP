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
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="description" />
    <meta name="keywords" content="keywords" />
    <meta name="author" content="AlexeyAbramov">
    <title>Example 1</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/my.css" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
</head>

<body>

<div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-12 text-center">
                    <a class="blog-header-logo text-dark">How to insert a record into {Car} table</a>
                </div>
            </div>
        </header>
</div>

<main class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-body">
                <form class="car_action_form">

                    <div class="form-group">
                        <div id="message" class="alert alert-danger mt-1 d-none align-middle text-center"></div>
                    </div>

                    <div class="form-group row">
                        <label for="dishtype_id" class="col-md-4 col-form-label text-md-right">Dishtype</label>
                        <div class="col-md-6">

                            <select class="form-control" name="dishtype_id" id="dishtype_id">
                                <option value="0">=== Select Dishtype ===</option>
                                <?php
											$query = $mysqli->query("SELECT id,dishtype FROM dishtype");
											while($row = mysqli_fetch_assoc($query)) {
												$selected = ($row['id'] == $myrow['dishtype_id']) ? ' selected' : '';
												echo "<option ".$selected." value=".$row['id'].">".$row['dishtype']."</option>";
											}
							?>
                            </select>

                            <div id="dishtype_id_warning_message" class="text-danger mt-1 d-none"></div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dish" class="col-md-4 col-form-label text-md-right">Dishes</label>
                        <div class="col-md-6">
                            <input type="text" id="dish" class="form-control only_integers_allowed only_defined_integers_allowed" name="dish" value="<?=$myrow['dish'];?>">
                            <div id="dish_warning_message" class="text-danger mt-1 d-none"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                        <div class="col-md-6">
                            <input type="text" id="price" class="form-control" name="price" value="<?=$myrow['price'];?>">
                            <div id="price_warning_message" class="text-danger mt-1 d-none"></div>
                        </div>
                    </div>


										<div class="form-group row">
												<label for="detail" class="col-md-4 col-form-label text-md-right">Details</label>
												<div class="col-md-6">
														<input type="text" id="detail" class="form-control" name="detail" value="<?=$myrow['detail'];?>">
														<div id="detail_warning_message" class="text-danger mt-1 d-none"></div>
												</div>
										</div>



                    <div class="col-md-6 offset-md-4">
                        <button type="button" class="btn btn-success car">
                            Add
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</main>

<footer class="blog-footer">
    <a href="/" class="btn btn-secondary mb-3 fa fa-home"> Go back</a>
    <p>This example package was designed by <a href="mailto:Alexey.abramov@aspire2.ac.nz">Aspire2 International</a></p>
    <p>New Zealand, 2020</p>
</footer>

<script src="/js/jquery-3.1.0.min.js" type="text/javascript" ></script>
<script src="/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/js/jquery.form.js" type="text/javascript"></script>
<script src="/js/jquery-ui.js" type="text/javascript"></script>
<script src="/js/sweetalert2@8.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/my.js"></script>
</body>

</html>
