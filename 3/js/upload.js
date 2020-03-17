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

    function getFileExtension(filename) {
        var ext = /^.+\.([^.]+)$/.exec(filename);
        return ext == null ? "" : ext[1];
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

    $(document).on('change', '.btnUpload', function() {

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

        $.ajax({
            url: 'ajax/dish_upload_ajax.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(output) {
                if (output == "File Uploaded Successfully") {
                    $('#recordImage_' + id).attr('src', 'images/' + image_name + '.' + ext);
                    return false;
                } else if (output == "Only allowed jpeg,jpg and png extension") {
                    Swal.fire(
                        'Oops...',
                        'File extension is not valid!',
                        'error'
                    )
                    return false;
                } else {
                    return false;
                }

            }
        });

    });

});
