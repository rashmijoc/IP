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


        var action = $(this).attr('data-action').trim();

        if (action == "user_start_search") {
            $.ajax({
                type: 'post',
                url: 'ajax/user_record_ajax.php',
                success: function(response) {
                    $('.modal-dialog').html(response);
                    $('#search').modal('show');
                }
            });
        }

        if (action == "user_finish_search") {

			if (searchSqlString !=''){
				searchSqlString='';
			}

            var role_id = $('#role_id').val().trim();
            var role_string = $("#role_id option:selected").text();
            var fullname = $('#fullname').val().trim();
            var email = $('#email').val().trim();


            pError = false;
            pChecked = false;

            $("#role_id_warning_message").switchClass("d-block", "d-none");
            $("#fullname_warning_message").switchClass("d-block", "d-none");
            $("#email_warning_message").switchClass("d-block", "d-none");

            if ($('#role_id_search').prop('checked')) {
                if (role_id == "0") {
                    $('#role_id_warning_message').html('[role] should be selected');
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
                }  else {
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



            $.ajax({
                url: 'ajax/user_list_ajax.php',
                method: "POST",
                data: {
                    searchSqlString: searchSqlString
                },
                success: function(data) {
                    $('#search').hide();
                    $('.modal-backdrop').hide();
                    $('#user_data').html(data);
                }
            });

        }
    });

});
