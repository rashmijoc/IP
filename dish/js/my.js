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
$(document).ready(function() {

	var searchSqlString='';

    load_data();

    function load_data(page,searchSqlString) {
        $.ajax({
            url: 'ajax/dish_list_ajax.php',
            method: "POST",
            data: {
                page: page,
				searchSqlString: searchSqlString
            },
            success: function(data) {
                $('#dish_data').html(data);
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

    $(document).on('click', '.dish', async function() {

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();
 //alert(action);
        if ((action == "edit") || (action == "add") || (action == "search")) {
            $.ajax({
                type: 'post',
                url: 'ajax/dish_record_ajax.php',
                data: { id: id,action:action},
                success: function(response) {
					//alert(response);
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show');
                }
            });
        }
        if (action == "update") {

            var dishtype_id = $('#dishtype_id').val().trim();
            var dishtype_string = $("#dishtype_id option:selected").text();
            var dish = $('#dishname').val().trim();
            var price = $('#price').val().trim();


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

            if (dishtype_id == "0") {
                $('#dishtype_id_warning_message').html('[dishtype] should be selected');
                $("#dishtype_id_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#dishtype_id_warning_message").switchClass("d-block", "d-none");
            }

            if (dish == "") {
                $('#dish_warning_message').html('[dish] should be filled');
                $("#dish_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else if (dish.length < 4 || dish.length > 4) {
                $('#dish_warning_message').html('[dish] should contain 4 digits');
                $("#dish_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#dish_warning_message").switchClass("d-block", "d-none");
            }

            if (price == "") {
                $('#price_warning_message').html('[Plate number] should be filled');
                $("#price_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#price_warning_message").switchClass("d-block", "d-none");
            }

            if (pError == true) {
                return false;
            }

            $.ajax({
                type: 'POST',
                url: 'ajax/dish_ajax.php',
                data: {
                    id: id,
                    action: action,
                    dishtype_id: dishtype_id,
                    dishname: dish,
                    price: price,
                    available: available
                },
                success: function(result) {
                    if (result.resultOK == true) {
                        $('#recorddishtype_' + id).html(dishtype_string);
                        $('#recorddish_' + id).html(dish);
                        $('#recordprice_' + id).html(price);
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
            var dishtype_id = $('#dishtype_id').val().trim();
            var dishtype_string = $("#dishtype_id option:selected").text();
            var dish = $('#dish').val().trim();
            var price = $('#price').val().trim();


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

            if (dishtype_id == "0") {
                $('#dishtype_id_warning_message').html('[dishtype] should be selected');
                $("#dishtype_id_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#dishtype_id_warning_message").switchClass("d-block", "d-none");
            }

            if (dish == "") {
                $('#dish_warning_message').html('[dish] should be filled');
                $("#dish_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else if (dish.length < 4 || dish.length > 4) {
                $('#dish_warning_message').html('[dish] should contain 4 digits');
                $("#dish_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#dish_warning_message").switchClass("d-block", "d-none");
            }

            if (price == "") {
                $('#price_warning_message').html('[Plate number] should be filled');
                $("#price_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#price_warning_message").switchClass("d-block", "d-none");
            }

            if (pError == true) {

                return false;
            }

               $.ajax({
            type: 'POST',
            url: 'ajax/dish_add_ajax.php',
            data: {
                dishtype_id: dishtype_id,
                dish: dish,
                price: price,
                available: available
            },
            success: function(result) {
                if (result.resultOK == true) {

                    $('#dishtype_id').val('0');
                    $('#dish').val('');
                    $('#price').val('');
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

            var dishtype_id = $('#dishtype_id').val().trim();
            var dishtype_string = $("#dishtype_id option:selected").text();
            var dish = $('#dish').val().trim();
            var price = $('#price').val().trim();

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

            $("#dishtype_id_warning_message").switchClass("d-block", "d-none");
            $("#dish_warning_message").switchClass("d-block", "d-none");
            $("#price_warning_message").switchClass("d-block", "d-none");

            if ($('#dishtype_id_search').prop('checked')) {

                if (dishtype_id == "0") {
                    $('#dishtype_id_warning_message').html('[dishtype] should be selected');
                    $("#dishtype_id_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#dishtype_id_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and dish.dishtype_id=" + dishtype_id + ' ';
                    pChecked = true;
                }
            } else {

            }

            if ($('#dish_search').prop('checked')) {
                if (dish == "") {
                    $('#dish_warning_message').html('[dish] should be filled');
                    $("#dish_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else if (dish.length < 4 || dish.length > 4) {
                    $('#dish_warning_message').html('[dish] should contain 4 digits');
                    $("#dish_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#dish_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and dish.dish=" + dish + ' ';
                    pChecked = true;
                }
            } else {

            }

            if ($('#price_search').prop('checked')) {
                if (price == "") {
                    $('#price_warning_message').html('[Plate number] should be filled');
                    $("#price_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#price_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and dish.price like '" + price + '\' ';
                    pChecked = true;
                }
            } else {

            }

            if ($('#available_search').prop('checked')) {
                searchSqlString = searchSqlString + " and dish.available = " + available + ' ';
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
                url: 'ajax/dish_list_ajax.php',
                method: "POST",
                data: {
                    searchSqlString: searchSqlString
                },
                success: function(data) {
                    $('#myModal').hide();
                    $('.modal-backdrop').hide();
                    $('#dish_data').html(data);

                }
            });

    }


    });



});
