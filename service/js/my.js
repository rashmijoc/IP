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

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();
 //alert(action);
        if ((action == "edit") || (action == "add") || (action == "search")) {
            $.ajax({
                type: 'post',
                url: 'ajax/service_record_ajax.php',
                data: { id: id,action:action},
                success: function(response) {
					//alert("response");
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show');
                }
            });
        }
        if (action == "update") {


            var service = $('#service').val().trim();
						var detail = $('#detail').val().trim();



            if (service == "") {
                $('#service_warning_message').html('[service] should be filled');
                $("#service_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#service_warning_message").switchClass("d-block", "d-none");
            }

						if (detail == "") {
								$('#detail_warning_message').html('[detail] should be filled');
								$("#detail_warning_message").switchClass("d-none", "d-block");
								pError = true;
						} else {
								$("#detail_warning_message").switchClass("d-block", "d-none");
						}
            $.ajax({
                type: 'POST',
                url: 'ajax/service_ajax.php',
                data: {
                    id: id,
                    action: action,
                    service: service,
										detail: detail
                },
                success: function(result) {
                    if (result.resultOK == true) {

                        $('#recordservice_' + id).html(service);
												$('#recorddetail_' + id).html(detail);

                        $('#myModal').modal('hide');

                    } else {
                        $("#message").switchClass("d-none", "d-block");
                        $('#message').html(result.message);
                    }
                }
            });
        }
		  if (action == "insert") {
 //alert(action);

            var service = $('#service').val().trim();
						var detail = $('#detail').val().trim();



            if (service == "") {
                $('#service_warning_message').html('[service] should be filled');
                $("#service_warning_message").switchClass("d-none", "d-block");
                pError = true;
            }  else {
                $("#service_warning_message").switchClass("d-block", "d-none");
            }

												if (detail == "") {
														$('#detail_warning_message').html('[detail] should be filled');
														$("#detail_warning_message").switchClass("d-none", "d-block");
														pError = true;
												} else {
														$("#detail_warning_message").switchClass("d-block", "d-none");
												}
               $.ajax({
            type: 'POST',
            url: 'ajax/service_add_ajax.php',
            data: {

                service: service
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
        }
		//search
		  if (action == "fetch") {
			if (searchSqlString !=''){
		//	alert("heelo");
				searchSqlString='';
			}


            var service = $('#service').val().trim();
						var detail = $('#detail').val().trim();





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

						if ($('#detail_search').prop('checked')) {
								if (detail == "") {
										$('#detail_warning_message').html('[service] should be filled');
										$("#detail_warning_message").switchClass("d-none", "d-block");
										pError = true;
								}  else {
										$("#detail_warning_message").switchClass("d-block", "d-none");
										searchSqlString = searchSqlString + " and service.detail=" + detail + ' ';
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
                    $('#myModal').hide();
                    $('.modal-backdrop').hide();
                    $('#service_data').html(data);


                }
            });

    }


    });



});
