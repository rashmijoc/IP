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
$(document).ready(function() {
	
	var searchSqlString='';

    load_data();

    function load_data(page,searchSqlString) {
        $.ajax({
            url: 'ajax/car_list_ajax.php',
            method: "POST",
            data: {
                page: page,
				searchSqlString: searchSqlString
            },
            success: function(data) {
                $('#car_data').html(data);
            }
        })
    } 
	
    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("page_id");
        load_data(page,searchSqlString);
    });


    $('.only_integers_allowed').on('keyup keypress', function(e) {
        if (e.keyCode == 8 || e.keyCode == 46) {} else {
            var letters = '1234567890';
            return (letters.indexOf(String.fromCharCode(e.which)) != -1);
        }
    });

    $(document).on('click', '.car', async function() {

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();
 //alert(action);
        if ((action == "edit") || (action == "add") || (action == "search")) {
            $.ajax({
                type: 'post',
                url: 'ajax/car_record_ajax.php',
                data: { id: id,action:action},
                success: function(response) {
					//alert(response);
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show');
                }
            });
        }
        if (action == "update") {

            var make_id = $('#make_id').val().trim();
            var make_string = $("#make_id option:selected").text();
            var year = $('#year').val().trim();
            var plate_number = $('#plate_number').val().trim();


            if ($('#available').prop('checked')) {
                var available = 1;
            } else {
                var available = 0;
            }

            if (available == 0) {
                var pAvailable = "No";
            } else {
                var pAvailable = "Yes";
            }

            pError = false;

            if (make_id == "0") {
                $('#make_id_warning_message').html('[Make] should be selected');
                $("#make_id_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#make_id_warning_message").switchClass("d-block", "d-none");
            }

            if (year == "") {
                $('#year_warning_message').html('[Year] should be filled');
                $("#year_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else if (year.length < 4 || year.length > 4) {
                $('#year_warning_message').html('[Year] should contain 4 digits');
                $("#year_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#year_warning_message").switchClass("d-block", "d-none");
            }

            if (plate_number == "") {
                $('#plate_number_warning_message').html('[Plate number] should be filled');
                $("#plate_number_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#plate_number_warning_message").switchClass("d-block", "d-none");
            }

            if (pError == true) {
                return false;
            }

            $.ajax({
                type: 'POST',
                url: 'ajax/car_ajax.php',
                data: {
                    id: id,
                    action: action,
                    make_id: make_id,
                    year: year,
                    plate_number: plate_number,
                    available: available
                },
                success: function(result) {
                    if (result.resultOK == true) {
                        $('#recordMake_' + id).html(make_string);
                        $('#recordYear_' + id).html(year);
                        $('#recordPlate_number_' + id).html(plate_number);
                        $('#recordAvailable_' + id).html(pAvailable);
                        $('#myModal').modal('hide');
						
                    } else {
                        $("#message").switchClass("d-none", "d-block");
                        $('#message').html(result.message);
                    }
                }
            });
        }
		  if (action == "insert") {
 //alert(action);
            var make_id = $('#make_id').val().trim();
            var make_string = $("#make_id option:selected").text();
            var year = $('#year').val().trim();
            var plate_number = $('#plate_number').val().trim();


            if ($('#available').prop('checked')) {
                var available = 1;
            } else {
                var available = 0;
            }

            if (available == 0) {
                var pAvailable = "No";
            } else {
                var pAvailable = "Yes";
            }

            pError = false;

            if (make_id == "0") {
                $('#make_id_warning_message').html('[Make] should be selected');
                $("#make_id_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#make_id_warning_message").switchClass("d-block", "d-none");
            }

            if (year == "") {
                $('#year_warning_message').html('[Year] should be filled');
                $("#year_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else if (year.length < 4 || year.length > 4) {
                $('#year_warning_message').html('[Year] should contain 4 digits');
                $("#year_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#year_warning_message").switchClass("d-block", "d-none");
            }

            if (plate_number == "") {
                $('#plate_number_warning_message').html('[Plate number] should be filled');
                $("#plate_number_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#plate_number_warning_message").switchClass("d-block", "d-none");
            }

            if (pError == true) {
				
                return false;
            }

               $.ajax({
            type: 'POST',
            url: 'ajax/car_add_ajax.php',
            data: {
                make_id: make_id,
                year: year,
                plate_number: plate_number,
                available: available
            },
            success: function(result) {
                if (result.resultOK == true) {

                    $('#make_id').val('0');
                    $('#year').val('');
                    $('#plate_number').val('');
                    $("#available").prop("checked", false);

                    Swal.fire(
                        'Congradulations!',
                        'Record has just been inserted',
                        'success'
                    )

                } else {
                    $("#message").switchClass("d-none", "d-block");
                    $('#message').html(result.message);
                }
            }
        });
        }
		//search
		  if (action == "fetch") {
			if (searchSqlString !=''){
			//	alert("heelo");
				searchSqlString='';
			}

            var make_id = $('#make_id').val().trim();
            var make_string = $("#make_id option:selected").text();
            var year = $('#year').val().trim();
            var plate_number = $('#plate_number').val().trim();

            if ($('#available').prop('checked')) {
                var available = 1;
            } else {
                var available = 0;
            }

            if (available == 0) {
                var pAvailable = "No";
            } else {
                var pAvailable = "Yes";
            }

            pError = false;
            pChecked = false;

            $("#make_id_warning_message").switchClass("d-block", "d-none");
            $("#year_warning_message").switchClass("d-block", "d-none");
            $("#plate_number_warning_message").switchClass("d-block", "d-none");

            if ($('#make_id_search').prop('checked')) {
				
                if (make_id == "0") {
                    $('#make_id_warning_message').html('[Make] should be selected');
                    $("#make_id_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#make_id_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and car.make_id=" + make_id + ' ';
                    pChecked = true;
                }
            } else {

            }

            if ($('#year_search').prop('checked')) {
                if (year == "") {
                    $('#year_warning_message').html('[Year] should be filled');
                    $("#year_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else if (year.length < 4 || year.length > 4) {
                    $('#year_warning_message').html('[Year] should contain 4 digits');
                    $("#year_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#year_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and car.year=" + year + ' ';
                    pChecked = true;
                }
            } else {

            }

            if ($('#plate_number_search').prop('checked')) {
                if (plate_number == "") {
                    $('#plate_number_warning_message').html('[Plate number] should be filled');
                    $("#plate_number_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#plate_number_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and car.plate_number like '" + plate_number + '\' ';
                    pChecked = true;
                }
            } else {

            }

            if ($('#available_search').prop('checked')) {
                searchSqlString = searchSqlString + " and car.available = " + available + ' ';
                pChecked = true;
            } else {

            }

            if (pError == true) {
                return false;
            }

            if (pChecked == false) {
                return false;
            }

            $.ajax({
                url: 'ajax/car_list_ajax.php',
                method: "POST",
                data: {
                    searchSqlString: searchSqlString
                },
                success: function(data) {
                    $('#myModal').hide();
                    $('.modal-backdrop').hide();
                    $('#car_data').html(data);
					
                }
            });

    }
	
	
    });
 
 

});