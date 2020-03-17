/*
************************************************************
Long name   : Internet programming classes - Offline package
Short name  : IPC - Offline package
Online view : http://ipc.alexeyabramov.info/
Author      : Alexey Abramov
E-mail      : abramov.developer@gmail.com
LinkedIn    : https://www.linkedin.com/in/alexey-abramov-kz/
City        : Christchurch / NewZealand
dishtype        : 2020
************************************************************
*/
$(document).ready(function() {

	var searchSqlString='';

    load_data();

    function load_data(page,searchSqlString) {
        $.ajax({
            url: 'ajax/dishtype_list_ajax.php',
            method: "POST",
            data: {
                page: page,
				searchSqlString: searchSqlString
            },
            success: function(data) {
                $('#dishtype_data').html(data);
            }
        })
    }

    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("page_id");
        load_data(page,searchSqlString);
    });

    $('.only_integers_allowed').on('keyup keypress', function(e) {
        if (e.keyCode == 8 || e.keyCode == 46) {} else {
            var letters = '1234567890';
            return (letters.indexOf(String.fromCharCode(e.which)) != -1);
        }
    });

    $(document).on('click', '.dishtype', async function() {


        var action = $(this).attr('data-action').trim();

        if (action == "dishtype_start_search") {
            $.ajax({
                type: 'post',
                url: 'ajax/dishtype_record_ajax.php',
                success: function(response) {
                    $('.modal-dialog').html(response);
                    $('#search').modal('show');
                }
            });
        }

        if (action == "dishtype_finish_search") {

			if (searchSqlString !=''){
				searchSqlString='';
			}


            var dishtype = $('#dishtype').val().trim();





            $("#dishtype_warning_message").switchClass("d-block", "d-none");

            if ($('#dishtype_search').prop('checked')) {
                if (dishtype == "") {
                    $('#dishtype_warning_message').html('[dishtype] should be filled');
                    $("#dishtype_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                }  else {
                    $("#dishtype_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and dishtype.dishtype=" + dishtype + ' ';
                    pChecked = true;
                }
            } else {

            }



            $.ajax({
                url: 'ajax/dishtype_list_ajax.php',
                method: "POST",
                data: {
                    searchSqlString: searchSqlString
                },
                success: function(data) {
                    $('#search').hide();
                    $('.modal-backdrop').hide();
                    $('#dishtype_data').html(data);
                }
            });

        }
    });

});
