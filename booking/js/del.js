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
            url: 'ajax/booking_list_ajax.php',
            method: "POST",
            data: {
                page: page
            },
            success: function(data) {
                $('#booking_data').html(data);
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

    $(document).on('click', '.booking_delete', function() {

        var id = $(this).attr('data-id').trim();

        Swal.fire({
            title: 'Are you sure you want to delete record with id:' + id + '?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: 'POST',
                    url: 'ajax/booking_ajax_del.php',
                    data: {
                        id: id
                    },

                    success: function(result) {
                        if (result.resultOK == true) {
                            //document.location.href = "/?page=booking"; //First option of removing element by refreshing all the page
                            $("#record_" + id).remove(); //Second option of removing element by removing an element with particular id
                            location.reload(true);
							return false;
                        } else {

                        }

                    }
                });

            }
        })
    });

});
