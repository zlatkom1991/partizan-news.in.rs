<?php
$title = "Kontakt";
$og_title = $title;
$og_description = "Kontaktirajte nas";
$og_image ="";
include('includes/header.php');

?>

<div class="container w-100 p-3" style="background-image:url('https://i.pinimg.com/originals/e5/d3/e9/e5d3e9b401d835852063a082175f8487.jpg')">

<div class="row w-100 p-3" style="background-color:white">

    <div class="col-md-8 col-md-offset-2">

        <h1>Kontakt</h1>

        <p class="lead"></p>

        <!-- We're going to place the form here in the next step -->
        <form id="contact-form" method="post"  role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Vaše ime *</label>
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Molimo vas unesite vaše ime *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Vaše prezime *</label>
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Molimo vas unesite vaše prezime  *" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Molimo vas unesite vaš email  *" required="required" data-error="Molimo vas unesite validan email.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_need">Molimo vas izaberite razlog kontaktiranja *</label>
                    <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                        <option value=""></option>
                        <option value="Request quotation">Sugestije/pohvale/kritike na naš rad</option>
                        <option value="Request order status">Reklamiranje</option>
                        <option value="Other">Drugi razlog</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Poruka *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Unesite vašu poruku *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Pošalji poruku">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted">
                    <strong>*</strong> Morate popuniti sva polja
            </div>
        </div>
    </div>

</form>

    </div>

</div>

</div>
<script>
$(function () {

// init the validator
// validator files are included in the download package
// otherwise download from http://1000hz.github.io/bootstrap-validator

$('#contact-form').validator();


// when the form is submitted
$('#contact-form').on('submit', function (e) {

    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
        var url = "includes/contact.php";

        // POST values in the background the the script URL
        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize(),
            success: function (data)
            {
                // data = JSON object that contact.php returns

                // we recieve the type of the message: success x danger and apply it to the 
                var messageAlert = 'alert-' + data.type;
                var messageText = data.message;

                // let's compose Bootstrap alert box HTML
                var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                
                // If we have messageAlert and messageText
                if (messageAlert && messageText) {
                    // inject the alert to .messages div in our form
                    $('#contact-form').find('.messages').html(alertBox);
                    // empty the form
                    $('#contact-form')[0].reset();
                }
            }
        });
        return false;
    }
})
});

</script>
<?php

include('includes/footer.php');

?>