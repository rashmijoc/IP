<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  
</head>
<body class="loader-active">

<!--== Contact Page Area Start ==-->
<div class="contact-page-wrao section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <h1 class="text-center mb-3">Enquiry Form</h1>
                <div class="contact-form">
                    <form id="frm_addEnquiry">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="name-input">
                                    <input type="text" placeholder="Full Name" name="fullname" id="fullname" data-rule-required="true" data-msg-required="*">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="email-input">
                                    <input type="email" placeholder="Email Address" name="email" id="email" data-rule-required="true" data-msg-required="*">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="website-input">
                                    <input type="number" placeholder="Mobileno" name="mobileno" id="mobileno" data-rule-required="true" data-msg-required="*">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="subject-input">
                                    <input type="text" placeholder="Enquiry For" name="enquiryfor" id="enquiryfor" data-rule-required="true" data-msg-required="*">
                                </div>
                            </div>
                        </div>

                        <div class="message-input">
                            <textarea cols="30" rows="10" placeholder="Message" name="message" id="message" data-rule-required="true" data-msg-required="*"></textarea>
                        </div>

                        <div class="input-submit">
                            <button type="button" onclick="addEnquiry()">Submit Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Contact Page Area End ==-->
<?php include 'Footer.php'; ?>
</body>
</html>
