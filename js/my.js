/*
************************************************************
Long name  : Internet Project Framework
Short name : IPF
Author     : Alexey Abramov
E-mail     : abramov.developer@gmail.com
LinkedIn   : https://www.linkedin.com/in/alexey-abramov-kz/
City       : Christchurch / NewZealand
Year       : 2020
************************************************************
*/

$(document).ready(function() {
	//Function which helps to validate an email on a front-end side
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

	//Function which is executed when you click on a login button
    $('#submit_login').click(function() {

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var email = $('#email1').val().trim();;
        var password = $('#password').val().trim();
        pError = false;

		//If an email field is empty then we show a message below it
        if (email == "") {
            $('#email_warning_message').html('The email field must be filled');
            $("#email_warning_message").switchClass("d-none", "d-block");
            pError = true;
		//If an email field has an invalid format then we show a message below it
        } else if (!validateEmail(email)) {
            $('#email_warning_message').html('The email field must be valid');
            $("#email_warning_message").switchClass("d-none", "d-block");
            pError = true;
		//If there are no mistakes then we hide a message below it
        } else {
            $("#email_warning_message").switchClass("d-block", "d-none");
        }

		//If a password field is empty then we show a message below it
        if (password == "") {
            $('#password_warning_message').html('The password field must be filled');
            $("#password_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
			//If there are no mistakes then we hide a message below it
            $("#password_warning_message").switchClass("d-block", "d-none");
        }

		//In case we have a mistakes then we make a stop
        if (pError == true) {
            return false;
        }

        $("#message").switchClass("d-block", "d-none");

		//We use ajax to send the variables as a parameters to '/ajax/user_login_ajax.php' file and return response
        $.ajax({
            type: 'POST',
            url: '/ip/ajax/user_login_ajax.php',
            data: $('.login_form').serialize(),
            success: function(result) {
                if (result.resultOK == true) {
					//In case we found user inside of a database we refresh the page
                    document.location.href = "/ip/index.php";
                } else {
					//In case we didn't find user inside of a database we show a message above
                    $("#message").switchClass("d-none", "d-block");
                    $('#message').html(result.message);
                }
            }
        });
    });


});
