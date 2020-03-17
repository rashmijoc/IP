detail/*
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

    load_data();

    function load_data(page) {
        $.ajax({
            url: 'ajax/dish_list_ajax.php',
            method: "POST",
            data: {
                page: page
            },
            success: function(data) {
                $('#dish_data').html(data);
            }
        })
    }

    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("page_id");
        load_data(page);
    });

    $('.only_integers_allowed').on('keyup keypress', function(e) {
        if (e.keyCode == 8 || e.keyCode == 46) {} else {
            var letters = '1234567890';
            return (letters.indexOf(String.fromCharCode(e.which)) != -1);
        }
    });

    $(document).on('click', '.dish_edit', async function() {

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();

        if (action == "edit") {
            $.ajax({
                type: 'post',
                url: 'ajax/dish_record_ajax.php',
                data: 'id=' + id,
                success: function(response) {
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show');
                }
            });
        }

        if (action == "update") {

            var dishtype_id = $('#dishtype_id').val().trim();
            var dishtype_string = $("#dishtype_id option:selected").text();
            var dish = $('#dish').val().trim();
            var price = $('#price').val().trim();
var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        var ext = getFileExtension($(this).val());
        var id = $(this).attr('data-id').trim();
        var image_name = getRandomInt(1, 99999999999999999999);

        var form_data = new FormData();
        var file_data = $('#fileImage_' + id).prop('files')[0];
        form_data.append('file', file_data);
        form_data.append('id', id);
        form_data.append('image_name', image_name);

            if ($('#detail').prop('checked')) {
                var detail = 1;
            } else {
                var detail = 0;
            }

            if (detail == 0) {
                var pdetail = "No";
            } else {
                var pdetail = "Yes";
            }

            pError = false;

            if (dishtype_id == "0") {
                $('#dishtype_id_warning_message').html('[Dishtype] should be selected');
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
                $('#price_warning_message').html('[price] should be filled');
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
                    dish: dish,
                    price: price,
                    detail: detail
                },
                success: function(result) {
                    if (result.resultOK == true) {
                        $('#recorddishtype_' + id).html(dishtype_string);
                        $('#recorddish_' + id).html(dish);
                        $('#recordprice_' + id).html(price);
                        $('#recorddetail_' + id).html(pdetail);
                        $('#myModal').modal('hide');
                    } else {
                        $("#message").switchClass("d-none", "d-block");
                        $('#message').html(result.message);
                    }
                }
            });
        }
    });

});
