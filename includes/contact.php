<?php


require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';

/*
*  CONFIGURE EVERYTHING HERE
*/

// an email address that will be in the From field of the email.
$fromEmail = 'zlajagrobar91@gmail.com';
$fromName = 'Demo contact form';

// an email address that will receive the email with the output of the form
$sendToEmail = 'zlajagrobar91@gmail.com';
$sendToName = 'Zlatko';

// subject of the email
$subject = 'New message from contact form';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message');

// message that will be displayed when everything is OK :)
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

$emailTextHtml = "<h1>You have a new message from your contact form</h1><hr>";
$emailTextHtml .= "<table>";

foreach ($_POST as $key => $value) {
    // If the field exists in the $fields array, include it in the email
    if (isset($fields[$key])) {
        $emailTextHtml .= "<tr><th>$fields[$key]</th><td>$value</td></tr>";
    }
}



$mail = new PHPMailer;

$mail->setFrom($fromEmail, $fromName,0);
$mail->addAddress($sendToEmail, $sendToName); // you can add more addresses by simply adding another line with $mail->addAddress();
// $mail->addReplyTo($from);


$mail->isHTML(true);

$mail->Subject = $subject;
$mail->msgHTML($emailTextHtml); // this will also create a plain-text version of the HTML email, very handy

if(!$mail->send()) {
    throw new \Exception('I could not send the email.' . $mail->ErrorInfo);
}


// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}

?>