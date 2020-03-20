<?php
$title = "Kontakt";
$og_title = $title;
$og_description = "Kontaktirajte nas";
$og_image ="";
include('includes/header.php');

?>
<style>
    #forma{
        border: 1px solid #E8E8E8	;
        margin-top: 10px;
    }
</style>
<div class="container">

<div class="row">

    <div class="col-md-8 col-md-offset-2" id="forma">

        <h1>Kontakt</h1>

        <p class="lead"></p>

        <!-- We're going to place the form here in the next step -->
        <form id="contact-form" method="post" action="includes/send_mail.php" role="form">

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
                    <textarea id="form_message" name="message" class="form-control" placeholder="Unesite vašu poruku *" rows="15" required="required" data-error="Please, leave us a message."></textarea>
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

$('#contact-form').serialize();


// when the form is submitted
$('#contact-form').on('submit', function (e) {

          // show that something is loading
        $('#response').html("<b>Loading response...</b>");
         
        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
        $.ajax({
            type: 'POST',
            url: 'includes/send_mail.php', 
            data: $(this).serialize()
        })
        .done(function(data){
             
            // show the response
            $('#response').html(data);
            if(!alert("Vaša poruka je poslata, potrudićemo se da vam odgovorimo u najkraćem mogućem roku, hvala!")){window.location.reload();}
             
        })
        .fail(function() {
         
            // just in case posting your form failed
            alert( "Došlo je do greške prilikom slanja poruke, molimo pokušajte kasnije..." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    
})
});

</script>
<?php

include('includes/footer.php');

?>