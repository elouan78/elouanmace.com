<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "contact@elouanmace.com"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "ELOUANMACE - Formulaire de contact :  $name";
$body = "Vous avez reçu un nouveau message d'un client par le biais de votre formulaire de contact.\n\n"."Voici les détails:\n\nNom Prénom: $name\n\nEmail: $email\n\nTéléphone: $phone\n\nMessage:\n$message";
$header = "From: noreply@elouanmace.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);


if(mail($to, $subject, $body, $header))
  http_response_code(200);


// Using the ini_set()
ini_set("SMTP", "mail.elouanmace.com");
ini_set("sendmail_from", "contact@elouanmace.com");
ini_set("smtp_port", "465");

?>



