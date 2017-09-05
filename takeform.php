<html>
<head>
<title>DANKE</title>
</head>
<script type="text/javascript">   
function Redirect() 
{  
window.location="http://amitis24.de"; 
} 
document.write("Vielen Dank . Wir haben Ihre Nachricht bekommen."); 
setTimeout('Redirect()', 3000);   
</script>
<body>
<?php
  // Change this to YOUR address
  $recipient = 'ivamaan@gmail.com';
  $email = $_POST['email'];
  $realName = $_POST['realname'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];
  # We'll make a list of error messages in an array
  $messages = array();
# Allow only reasonable email addresses
if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
$messages[] = "Die E-mail Adresse ist falsch.";
}
# Allow only reasonable real names
if (!preg_match("/^[\w\ \+\-\'\"]+$/", $realName)) {
$messages[] = "The real name field must contain only " .
"alphabetical characters, numbers, spaces, and " .
"reasonable punctuation. We apologize for any inconvenience.";
}
# CAREFUL: don't allow hackers to sneak line breaks and additional
# headers into the message and trick us into spamming for them!
$subject = preg_replace('/\s+/', ' ', $subject);
# Make sure the subject isn't blank afterwards!
if (preg_match('/^\s*$/', $subject)) {
$messages[] = "Bitte Schreiben Sie den Betreff";
}

$body = $_POST['body'];
# Make sure the message has a body
if (preg_match('/^\s*$/', $body)) {
$messages[] = "Bitte Schreibe Sie Ihre Text " .
"something?"; 
}
  if (count($messages)) {
    # There were problems, so tell the user and
    # don't send the message yet
    foreach ($messages as $message) {
      echo("<p>$message</p>\n");
    }
    echo("<p>Klicken Sie Back Und Koregieren Sie" .
      "Dann Drucken Sie LOS! nochmal</p>");
  } else {
    # Send the email - we're done
mail($recipient,
      $subject,
      $body,
      "From: $realName <$email>\r\n" .
      "Reply-To: $realName <$email>\r\n"); 
    echo("<p>Email ist schon gesendet . Vielen Dank .</p>\n");
  }
?>

</body>
</html>