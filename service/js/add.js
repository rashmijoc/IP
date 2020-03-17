/*
************************************************************
Long name   : Internet programming classes - Offline package
Short name  : IPC - Offline package
Online view : http://ipc.alexeyabramov.info/
Author      : Alexey Abramov
E-mail      : abramov.developer@gmail.com
LinkedIn    : https://www.linkedin.com/in/alexey-abramov-kz/
City        : Christchurch / NewZealand
service        : 2020
************************************************************
*/
//	alert("heelo");

    $(document).on('click', '.service_add', function() {



        var service = $('#service').val().trim();

        pError = false;


        if (service == "") {
            $('#service_warning_message').html('[service] should be filled');
            $("#service_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#service_warning_message").switchClass("d-block", "d-none");
        }
        if (detail == "") {
            $('#detail_warning_message').html('[service] should be filled');
            $("#detail_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#detail_warning_message").switchClass("d-block", "d-none");
        }

        if (pError == true) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: 'ajax/service_add_ajax.php',
            data: {

                service: service,
                detail:detail

            },
            success: function(result) {
                if (result.resultOK == true) {


                    $('#service').val('');


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
