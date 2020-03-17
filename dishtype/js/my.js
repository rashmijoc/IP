/*
************************************************************
Long name   : Internet programming classes - Offline package
Short name  : IPC - Offline package
Online view : http://ipc.alexeyabramov.info/
Author      : Alexey Abramov
E-mail      : abramov.developer@gmail.com
LinkedIn    : https://www.linkedin.com/in/alexey-abramov-kz/
City        : Christchurch / NewZealand
dishtype        : 2020
************************************************************
*/
$(document).ready(function() {

	var searchSqlString='';

    load_data();

    function load_data(page,searchSqlString) {
        $.ajax({
            url: 'ajax/dishtype_list_ajax.php',
            method: "POST",
            data: {
                page: page,
				searchSqlString: searchSqlString
            },
            success: function(data) {
                $('#dishtype_data').html(data);
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

    $(document).on('click', '.dishtype', async function() {

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();
 //alert(action);
        if ((action == "edit") || (action == "add") || (action == "search")) {
            $.ajax({
                type: 'post',
                url: 'ajax/dishtype_record_ajax.php',
                data: { id: id,action:action},
                success: function(response) {
					//alert("response");
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show');
                }
            });
        }
        if (action == "update") {


            var dishtype = $('#dishtype').val().trim();



            if (dishtype == "") {
                $('#dishtype_warning_message').html('[dishtype] should be filled');
                $("#dishtype_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#dishtype_warning_message").switchClass("d-block", "d-none");
            }


            $.ajax({
                type: 'POST',
                url: 'ajax/dishtype_ajax.php',
                data: {
                    id: id,
                    action: action,
                    dishtype: dishtype
                },
                success: function(result) {
                    if (result.resultOK == true) {

                        $('#recorddishtype_' + id).html(dishtype);

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

            var dishtype = $('#dishtype').val().trim();





            if (dishtype == "") {
                $('#dishtype_warning_message').html('[dishtype] should be filled');
                $("#dishtype_warning_message").switchClass("d-none", "d-block");
                pError = true;
            }  else {
                $("#dishtype_warning_message").switchClass("d-block", "d-none");
            }

               $.ajax({
            type: 'POST',
            url: 'ajax/dishtype_add_ajax.php',
            data: {

                dishtype: dishtype
            },
            success: function(result) {
                if (result.resultOK == true) {


                    $('#dishtype').val('');


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


            var dishtype = $('#dishtype').val().trim();





            $("#dishtype_warning_message").switchClass("d-block", "d-none");




            if ($('#dishtype_search').prop('checked')) {
                if (dishtype == "") {
                    $('#dishtype_warning_message').html('[dishtype] should be filled');
                    $("#dishtype_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                }  else {
                    $("#dishtype_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and dishtype.dishtype=" + dishtype + ' ';
                    pChecked = true;
                }
            } else {

            }


            $.ajax({
                url: 'ajax/dishtype_list_ajax.php',
                method: "POST",
                data: {
                    searchSqlString: searchSqlString
                },
                success: function(data) {
                    $('#myModal').hide();
                    $('.modal-backdrop').hide();
                    $('#dishtype_data').html(data);

                }
            });

    }


    });



});
