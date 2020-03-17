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
$(document).ready(function() {

	var searchSqlString='';

    load_data();

    function load_data(page,searchSqlString) {
        $.ajax({
            url: 'ajax/service_list_ajax.php',
            method: "POST",
            data: {
                page: page,
				searchSqlString: searchSqlString
            },
            success: function(data) {
                $('#service_data').html(data);
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

    $(document).on('click', '.service', async function() {


        var action = $(this).attr('data-action').trim();

        if (action == "service_start_search") {
            $.ajax({
                type: 'post',
                url: 'ajax/service_record_ajax.php',
                success: function(response) {
                    $('.modal-dialog').html(response);
                    $('#search').modal('show');
                }
            });
        }

        if (action == "service_finish_search") {

			if (searchSqlString !=''){
				searchSqlString='';
			}


            var service = $('#service').val().trim();





            $("#service_warning_message").switchClass("d-block", "d-none");

            if ($('#service_search').prop('checked')) {
                if (service == "") {
                    $('#service_warning_message').html('[service] should be filled');
                    $("#service_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                }  else {
                    $("#service_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and service.service=" + service + ' ';
                    pChecked = true;
                }
            } else {

            }



            $.ajax({
                url: 'ajax/service_list_ajax.php',
                method: "POST",
                data: {
                    searchSqlString: searchSqlString
                },
                success: function(data) {
                    $('#search').hide();
                    $('.modal-backdrop').hide();
                    $('#service_data').html(data);
                }
            });

        }
    });

});
