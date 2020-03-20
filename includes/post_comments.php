<?php

$comments = Comment::findByNewsId($_GET['id']);

?>
                    
                    
						<!-- article comments -->
						
						<div class="article-comments">
							<div class="section-title">
								<h2 class="title">Komentari</h2>
							</div>
								
							
							<?php
							
							if(!$comments){
								echo '
								<div class="media">
								<div class="media-left">
									<img src="img/user.png" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h5>Admin <span class="reply-time">Just now</span></h5>
									</div>
									<p>Jos uvek nema komentara...</p>				
									<a href="#" class="reply-btn">Reply</a>
								</div>
								</div>
								';
							}
							?>
							<!-- /comment -->
							<!-- comment -->
							

							<!-- comment -->
                            <?php foreach($comments as $comm) : ?>
							<div class="media">
								<div class="media-left">
									<img src="img/grobar.png" alt="">
								</div>
								<div class="media-body">
                                
									<div class="media-heading">
										<h5><?php echo $comm->author; ?> <span class="reply-time">
										<?php 
										// $t = strtotime($comm->create_time);
										// echo date('d/m/y H:i',$t);
										echo timeFormat(date($comm->create_time));
										// echo $comm->create_time; ?>
										</span></h5>
									</div>
									<p><?php echo $comm->comment; ?></p>			
									<a href="#" class="reply-btn">Reply</a>
									<hr>
									<?php if($session->isSignedIn()) {

										echo '<button class="btn btn-primary" value="'.$comm->id .'">Obrisi komentar</button>';
									} ?>
								</div>
                                <br>
							</div>
                            <?php endforeach; ?>
							<!-- /comment -->
						</div>
						<!-- /article comments -->
						
						<!-- reply form -->
						<div class="article-reply-form">
							<div class="section-title">
								<h2 class="title">Ostavite vaš komentar</h2>
							</div>
								
							<form id='comments'>
								<input class="input" placeholder="Vaše ime" type="text" name="author" id="author"
								 required  pattern="^[A-Za-z0-9]{5,15}(?:[ _-][A-Za-z0-9]+)*$" title="Vaš nadimak može sadržati između 5 i 15 karaktera. Dozvoljena su slova i brojevi kao i donja crta i razmak">
								<textarea class="input" placeholder="Komentar" name='comment' id="comment" rows="20" required></textarea>
                                <input type="submit" name='submit' class="input-btn" value="Postavi komentar" id="postavi_komentar">
							</form>
							<p><i class="fas fa-info-circle"></i>  Zadržavamo prava brisanja neprimerenih komentara</p>
						</div>
						<!-- /reply form -->
						


						<script>



var id= getUrlVars();
var request;
$("#comments").submit(function(event){

// Prevent default posting of form - put here to work in case of errors
event.preventDefault();

// Abort any pending request
if (request) {
	request.abort();
}
// setup some local variables
var $form = $(this);

// Let's select and cache all the fields
var $inputs = $form.find("input, select, button, textarea");

// Serialize the data in the form
var serializedData = $form.serialize();


// Let's disable the inputs for the duration of the Ajax request.
// Note: we disable elements AFTER the form data has been serialized.
// Disabled form elements will not be serialized.
$inputs.prop("disabled", true);

// Fire off the request to /form.php
request = $.ajax({
	url: "includes/add_comment.php?id=" +id['id'],
	type: "post",
	data: serializedData
});

// Callback handler that will be called on success
request.done(function (response, textStatus, jqXHR){
	// Log a message to the console
	location.reload(); 
});

// Callback handler that will be called on failure
request.fail(function (jqXHR, textStatus, errorThrown){
	// Log the error to the console
	console.error(
		"The following error occurred: "+
		textStatus, errorThrown
	);
});

// Callback handler that will be called regardless
// if the request failed or succeeded
request.always(function () {
	// Reenable the inputs
	$inputs.prop("disabled", false);
});

});


function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

//Za brisanje komentara

$("button").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "includes/delete_comment.php",
        data: { 
            id: $(this).val(), // < note use of 'this' here
            access_token: $("#access_token").val() 
        },
        success: function(result) {
            location.reload();
        },
        error: function(result) {
            alert('Komentar nije obrisan!');
        }
    });
});

</script>
