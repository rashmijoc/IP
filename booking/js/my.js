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
$(document).ready(function() {

	var searchSqlString='';

    load_data();

    function load_data(page,searchSqlString) {
        $.ajax({
            url: 'ajax/booking_list_ajax.php',
            method: "POST",
            data: {
                page: page,
				searchSqlString: searchSqlString
            },
            success: function(data) {
                $('#booking_data').html(data);
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

    $(document).on('click', '.booking', async function() {

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();
 //alert(action);
        if ((action == "edit") || (action == "add") || (action == "search")) {
            $.ajax({
                type: 'post',
                url: 'ajax/booking_record_ajax.php',
                data: { id: id,action:action},
                success: function(response) {
					//alert("response");
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show');
                }
            });
        }
        if (action == "update") {


            var name = $('#name').val().trim();
						var address = $('#address').val().trim();
						var phonenumber = $('#phonenumber').val().trim();
						var date = $('#date').val().trim();
						var time = $('#time').val().trim();
						var pax = $('#pax').val().trim();


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
            $.ajax({
                type: 'POST',
                url: 'ajax/booking_ajax.php',
                data: {
                    id: id,
                    action: action,
                    name: name,
										address: address,
										phonenumber:phonenumber,
										date:date,
										time:time,
										pax:pax
                },
                success: function(result) {
                    if (result.resultOK == true) {

                        $('#recordname_' + id).html(name);
												$('#recordaddress_' + id).html(address);
												$('#recordphonenumber_' + id).html(phonenumber);
												$('#recorddate_' + id).html(date);
												$('#recordtime_' + id).html(time);
												$('#recordpax_' + id).html(pax);

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

 var name = $('#name').val().trim();
 var address = $('#address').val().trim();
 var phonenumber = $('#phonenumber').val().trim();
 var date = $('#date').val().trim();
 var time = $('#time').val().trim();
 var pax = $('#pax').val().trim();


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
   $.ajax({
            type: 'POST',
            url: 'ajax/booking_add_ajax.php',
            data: {

                booking: booking
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
        }
		//search
		  if (action == "fetch") {
			if (searchSqlString !=''){
		//	alert("heelo");
				searchSqlString='';
			}


			var name = $('#name').val().trim();
			var address = $('#address').val().trim();
			var phonenumber = $('#phonenumber').val().trim();
			var date = $('#date').val().trim();
			var time = $('#time').val().trim();
			var pax = $('#pax').val().trim();


$("#name_warning_message").switchClass("d-block", "d-none");
$("#address_warning_message").switchClass("d-block", "d-none");
$("#phonenumber_warning_message").switchClass("d-block", "d-none");
$("#date_warning_message").switchClass("d-block", "d-none");
$("#date_warning_message").switchClass("d-block", "d-none");
$("#pax_warning_message").switchClass("d-block", "d-none");




            if ($('#name_search').prop('checked')) {
                if (name == "") {
                    $('#name_warning_message').html('[booking] should be filled');
                    $("#name_warning_message").switchClass("d-none", "d-block");
                    pError = true;
                }  else {
                    $("#name_warning_message").switchClass("d-block", "d-none");
                    searchSqlString = searchSqlString + " and booking.name=" + name + ' ';
                    pChecked = true;
                }
            } else {

            }

						if ($('#address_search').prop('checked')) {
								if (booking == "") {
										$('#address_warning_message').html('[address] should be filled');
										$("#address_warning_message").switchClass("d-none", "d-block");
										pError = true;
								}  else {
										$("#address_warning_message").switchClass("d-block", "d-none");
										searchSqlString = searchSqlString + " and booking.address=" + address + ' ';
										pChecked = true;
								}
						} else {

						}
						if ($('#phonenumber_search').prop('checked')) {
								if (phonenumber == "") {
										$('#phonenumber_warning_message').html('[address] should be filled');
										$("#phonenumber_warning_message").switchClass("d-none", "d-block");
										pError = true;
								}  else {
										$("#phonenumber_warning_message").switchClass("d-block", "d-none");
										searchSqlString = searchSqlString + " and booking.phonenumber=" + phonenumber + ' ';
										pChecked = true;
								}
						} else {

						}
						if ($('#date_search').prop('checked')) {
								if (date == "") {
										$('#date_warning_message').html('[address] should be filled');
										$("#date_warning_message").switchClass("d-none", "d-block");
										pError = true;
								}  else {
										$("#date_warning_message").switchClass("d-block", "d-none");
										searchSqlString = searchSqlString + " and booking.date=" + date + ' ';
										pChecked = true;
								}
						} else {

						}

						if ($('#time_search').prop('checked')) {
								if (time == "") {
										$('#time_warning_message').html('[address] should be filled');
										$("#time_warning_message").switchClass("d-none", "d-block");
										pError = true;
								}  else {
										$("#time_warning_message").switchClass("d-block", "d-none");
										searchSqlString = searchSqlString + " and booking.time=" + time + ' ';
										pChecked = true;
								}
						} else {

						}

						if ($('#pax_search').prop('checked')) {
								if (pax == "") {
										$('#pax_warning_message').html('[address] should be filled');
										$("#pax_warning_message").switchClass("d-none", "d-block");
										pError = true;
								}  else {
										$("#pax_warning_message").switchClass("d-block", "d-none");
										searchSqlString = searchSqlString + " and booking.pax=" + pax + ' ';
										pChecked = true;
								}
						} else {

						}


            $.ajax({
                url: 'ajax/booking_list_ajax.php',
                method: "POST",
                data: {
                    searchSqlString: searchSqlString
                },
                success: function(data) {
                    $('#myModal').hide();
                    $('.modal-backdrop').hide();
                    $('#booking_data').html(data);


                }
            });

    }


    });



});
