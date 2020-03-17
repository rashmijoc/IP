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

    $('.only_integers_allowed').on('keyup keypress', function(e) {
        if (e.keyCode == 8 || e.keyCode == 46) {} else {
            var letters = '1234567890';
            return (letters.indexOf(String.fromCharCode(e.which)) != -1);
        }
    });

    $('.only_defined_integers_allowed').on('keyup keypress', function(e) {
        var id = $(this).attr('id').trim();
        var val = $('#' + id).val().trim();

        if (id == 'year') {
            if (val.length > 3) {
                return false;
            }
        }
    });

    $(document).on('click', '.car_add', function() {
		

        var make_id = $('#make_id').val().trim();
        var year = $('#year').val().trim();
        var plate_number = $('#plate_number').val().trim();

        if ($('#available').prop('checked')) {
            var available = 1;
        } else {
            var available = 0;
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
    });

});