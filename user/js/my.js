/*
************************************************************
Long name   : Internet programming classes - Offline package
Short name  : IPC - Offline package
Online view : http://ipc.alexeyabramov.info/
Author      : Alexey Abramov
E-mail      : abramov.developer@gmail.com
LinkedIn    : https://www.linkedin.com/in/alexey-abramov-kz/
City        : Christchurch / NewZealand
fullname        : 2020
************************************************************
*/
$(document).ready(function() {

	var searchSqlString='';

    load_data();

    function load_data(page,searchSqlString) {
        $.ajax({
            url: 'ajax/user_list_ajax.php',
            method: "POST",
            data: {
                page: page,
				searchSqlString: searchSqlString
            },
            success: function(data) {
                $('#user_data').html(data);
            }
        })
    }

    

    $(document).on('click', '.user', async function() {

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();
 //alert(action);
        if ((action == "edit") || (action == "add") || (action == "search")) {
            $.ajax({
                type: 'post',
                url: 'ajax/user_record_ajax.php',
                data: { id: id,action:action},
                success: function(response) {
					//alert(response);
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show');
                }
            });
        }
        if (action == "update") {

            var role_id = $('#role_id').val().trim();
            var make_string = $("#role_id option:selected").text();
            var fullname = $('#fullname').val().trim();
            var email = $('#email').val().trim();




            pError = false;

            if (role_id == "0") {
                $('#role_id_warning_message').html('[Make] should be selected');
                $("#role_id_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#role_id_warning_message").switchClass("d-block", "d-none");
            }

            if (fullname == "") {
                $('#fullname_warning_message').html('[fullname] should be filled');
                $("#fullname_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#fullname_warning_message").switchClass("d-block", "d-none");
            }

						if (password== "") {
								$('#password_warning_message').html('[fullname] should be filled');
								$("#password_warning_message").switchClass("d-none", "d-block");
								pError = true;
						} else {
								$("#password_warning_message").switchClass("d-block", "d-none");
						}
            if (email == "") {
                $('#email_warning_message').html('[Plate number] should be filled');
                $("#email_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#email_warning_message").switchClass("d-block", "d-none");
            }

            if (pError == true) {
                return false;
            }

            $.ajax({
                type: 'POST',
                url: 'ajax/user_ajax.php',
                data: {
                    id: id,
                    action: action,
                    role_id: role_id,
                    fullname: fullname,
                    email: email,
                    password:password
                },
                success: function(result) {
                    if (result.resultOK == true) {
                        $('#recordrole_' + id).html(make_string);
                        $('#recordfullname_' + id).html(fullname);
                        $('#recordemail_' + id).html(email);
                        $('#recordpassword_' + id).html(ppassword);
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
            var role_id = $('#role_id').val().trim();
            var fullname = $('#fullname').val().trim();
            var email = $('#email').val().trim();
						  var password = $('#password').val().trim();



            pError = false;

            if (role_id == "0") {
                $('#role_id_warning_message').html('[Make] should be selected');
                $("#role_id_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#role_id_warning_message").switchClass("d-block", "d-none");
            }

            if (fullname == "") {
                $('#fullname_warning_message').html('[fullname] should be filled');
                $("#fullname_warning_message").switchClass("d-none", "d-block");
                pError = true;
            }  else {
                $("#fullname_warning_message").switchClass("d-block", "d-none");
            }

            if (email == "") {
                $('#email_warning_message').html('[Plate number] should be filled');
                $("#email_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#email_warning_message").switchClass("d-block", "d-none");
            }
						if (password == "") {
                $('#password_warning_message').html('[Plate number] should be filled');
                $("#password_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#password_warning_message").switchClass("d-block", "d-none");
            }

            if (pError == true) {

                return false;
            }

               $.ajax({
            type: 'POST',
            url: 'ajax/user_add_ajax.php',
            data: {
                role_id: role_id,
                fullname: fullname,
                email: email,
                password:password
            },
            success: function(result) {
                if (result.resultOK == true) {

                    $('#role_id').val('0');
                    $('#fullname').val('');
                    $('#email').val('');
										  $('#password').val('');


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

            var role_id = $('#role_id').val().trim();
            var password=$('#password').val().trim();
            var fullname = $('#fullname').val().trim();
            var email = $('#email').val().trim();



            pError = false;
            pChecked = false;

            $("#role_id_warning_message").switchClass("d-block", "d-none");
            $("#fullname_warning_message").switchClass("d-block", "d-none");
            $("#email_warning_message").switchClass("d-block", "d-none");
						$("#password_warning_message").switchClass("d-block", "d-none");

            if ($('#role_id_search').prop('checked')) {

                if (role_id == "0") {
                    $('#role_id_warning_message').html('[Make] should be selected');
                    $("#role_id_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#role_id_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and user.role_id=" + role_id + ' ';
                    pChecked = true;
                }
            } else {

            }

            if ($('#fullname_search').prop('checked')) {
                if (fullname == "") {
                    $('#fullname_warning_message').html('[fullname] should be filled');
                    $("#fullname_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#fullname_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and user.fullname=" + fullname + ' ';
                    pChecked = true;
                }
            } else {

            }

            if ($('#email_search').prop('checked')) {
                if (email == "") {
                    $('#email_warning_message').html('[Plate number] should be filled');
                    $("#email_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                } else {
                    $("#email_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and user.email like '" + email + '\' ';
                    pChecked = true;
                }
            } else {

            }

						if (password == "") {
								$('#password_warning_message').html('[Plate number] should be filled');
								$("#password_warning_message").switchClass("d-none", "d-block");
								pError = true;
						} else {
								$("#password_warning_message").switchClass("d-block", "d-none");
								searchSqlString = searchSqlString + " and user.password like '" + password + '\' ';
								pChecked = true;
						}
				} else {

				}

            if (pError == true) {
                return false;
            }

            if (pChecked == false) {
                return false;
            }

            $.ajax({
                url: 'ajax/user_list_ajax.php',
                method: "POST",
                data: {
                    searchSqlString: searchSqlString
                },
                success: function(data) {
                    $('#myModal').hide();
                    $('.modal-backdrop').hide();
                    $('#user_data').html(data);

                }
            });

    }


    });



});
