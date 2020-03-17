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


    $(document).on('click', '.user_add', function() {


        var role_id = $('#role_id').val().trim();
        var fullname = $('#fullname').val().trim();
        var password = $('#password').val().trim();
        var email = $('#email').val().trim();



        pError = false;

        if (role_id == "0") {
            $('#role_id_warning_message').html('[role] should be selected');
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

        if (password == "") {
            $('#password_warning_message').html('[Plate number] should be filled');
            $("#password_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#password_warning_message").switchClass("d-block", "d-none");
        }
        if (email == "") {
            $('#email_warning_message').html('[Email] should be filled');
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
            url: 'ajax/user_add_ajax.php',
            data: {
                role_id: role_id,
                fullname: fullname,
                password: password,
                available: available
            },
            success: function(result) {
                if (result.resultOK == true) {

                    $('#role_id').val('0');
                    $('#fullname').val('');
                    $('#password').val('');
                    $('#email').val('');

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
    });

});
