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

    $('.only_integers_allowed').on('keyup keypress', function(e) {
        if (e.keyCode == 8 || e.keyCode == 46) {} else {
            var letters = '1234567890';
            return (letters.indexOf(String.fromCharCode(e.which)) != -1);
        }
    });

    $('.only_defined_integers_allowed').on('keyup keypress', function(e) {
        var id = $(this).attr('id').trim();
        var val = $('#' + id).val().trim();

    });

    $(document).on('click', '.dish_add', function() {

        var dishtype_id = $('#dishtype_id').val().trim();
        var dish = $('#dish').val().trim();
        var price = $('#price').val().trim();
        var detail = $('#detail').val().trim();

        //if ($('#detail').prop('checked')) {
          //  var detail = 1;
      //  } else {
          //  var detail = 0;
      //  }//

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
        }  else {
            $("#dish_warning_message").switchClass("d-block", "d-none");
        }

        if (price == "") {
            $('#price_warning_message').html('[Price] should be filled');
            $("#price_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#price_warning_message").switchClass("d-block", "d-none");
        }
        if (detail == "") {
            $('#detail_warning_message').html('[detail] should be filled');
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
            url: 'ajax/dish_add_ajax.php',
            data: {
                dishtype_id: dishtype_id,
                dish: dish,
                price: price,
                detail: detail
            },
            success: function(result) {
                if (result.resultOK == true) {

                    $('#dishtype_id').val('0');
                    $('#dish').val('');
                    $('#price').val('');
                      $('#detail').val('');
                    $("#detail").prop("checked", false);

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
