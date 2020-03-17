$(document).ready(function()

 {

    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }
	$('#createsubmit').click(function() {


        var fname = $('#fname').val().trim();
		 var lastname = $('#lname').val().trim();
        var doj = $('#doj').val().trim();
        var desgination = $('#desgination').val().trim();
        pError = false;

		if (fname == "") {
            $('#firstname_warning_message').html('The firstname field must be filled');
           $("#firstname_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
           $("#firstname_warning_message").switchClass("d-block", "d-none");
        }
        if (pError == true) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '/ip/ajax/manage-hairstylists-ajax.php',
            data: $(fname:fname),
            success: function(result) {
                if (result.resultOK == true) {
                   // document.location.href = "/";
				   alert(result.message);
				   $('.createsubmit').slideUp(1000);
                } else {
                    $("#message").switchClass("d-none", "d-block");
                    $('#message').html(result.message);
                }
            }
        });

    
