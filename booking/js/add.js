/*
************************************************************
Long name   : Internet programming classes - Offline package
Short name  : IPC - Offline package
Online view : http://ipc.alexeyabramov.info/
Author      : Alexey Abramov
E-mail      : abramov.developer@gmail.com
LinkedIn    : https://www.linkedin.com/in/alexey-abramov-kz/
City        : Christchurch / NewZealand
booking        : 2020
************************************************************
*/
//	alert("heelo");

    $(document).on('click', '.booking_add', function() {




        var name = $('#name').val().trim();
        var address = $('#address').val().trim();
        var phonenumber = $('#phonenumber').val().trim();
        var date = $('#date').val().trim();
        var time = $('#time').val().trim();
        var pax = $('#pax').val().trim();

        pError = false;


        if (name == "") {
            $('#name_warning_message').html('[booking] should be filled');
            $("#name_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#name_warning_message").switchClass("d-block", "d-none");
        }
        if (address == "") {
            $('#address_warning_message').html('[detail] should be filled');
            $("#address_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#address_warning_message").switchClass("d-block", "d-none");
        }

                    if (phonenumber == "") {
                        $('#phonenumbe_warning_message').html('[booking] should be filled');
                        $("#phonenumbe_warning_message").switchClass("d-none", "d-block");
                        pError = true;
                    } else {
                        $("#phonenumbe_warning_message").switchClass("d-block", "d-none");
                    }

                    if (date == "") {
                        $('#date_warning_message').html('[detail] should be filled');
                        $("#date_warning_message").switchClass("d-none", "d-block");
                        pError = true;
                    } else {
                        $("#date_warning_message").switchClass("d-block", "d-none");
                    }

                                if (time == "") {
                                    $('#time_warning_message').html('[booking] should be filled');
                                    $("#time_warning_message").switchClass("d-none", "d-block");
                                    pError = true;
                                } else {
                                    $("#time_warning_message").switchClass("d-block", "d-none");
                                }

                                if (pax == "") {
                                    $('#pax_warning_message').html('[detail] should be filled');
                                    $("#pax_warning_message").switchClass("d-none", "d-block");
                                    pError = true;
                                } else {
                                    $("#pax_warning_message").switchClass("d-block", "d-none");
                                }

        if (pError == true) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: 'ajax/booking_add_ajax.php',
            data: {

              name: name,
              address: address,
              phonenumber:phonenumber,
              date:date,
              time:time,
              pax:pax

            },
            success: function(result) {
                if (result.resultOK == true) {


                    $('#booking').val('');


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
