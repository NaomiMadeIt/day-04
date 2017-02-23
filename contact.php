<?php
  error_reporting( E_ALL & ~E_NOTICE );

  //parse the form if the user submitted it
  if( $_POST['did_send'] ){
    //extract all the data that was typed in
    //TODO: sanitize all data
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $reason         = $_POST['reason'];
    $message        = $_POST['message'];
    $newsletter     = $_POST['newsletter'];

    //TODO: validate each field
    //send the mail!
    $to = 'naomi.k.rodriguez@gmail.com, bluehorneddemon@gmail.com';
    $subject = 'A contact form submission form' . $name;

    $body = "Email Address: $email\n";
    $body .= "Phone Number: $phone\n";
    $body .= "Reason for contact me: $reason\n";
    $body .= "Subscripe to newsletter? $newsletter\n\n";
    $body .= "$message";

    $headers = "From: naomi.k.rodriguez@gmail.com\r\n";
    $headers .= "Reply-to: $email\r\n";
    $headers .= "Bcc: e.g.cartas@gmail.com";

    $mail_sent = mail($to, $subject, $body, $headers);

    //give the user feedback
    if($mail_sent){
      $class = 'success';
      $feedback = 'Thank you for contacting me, I will get back to you shortly.';
    }else{
      $class = 'error';
      $feedback = 'Something went wrong, your message could not be sent.';
    }

  } //end parser
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contact Me</title>
    <link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Contact Me</h1>

    <?php
      if( isset($feedback) ){
        echo '<div class="feedback ' . $class . '">';
        echo $feedback;

        //preview what the body of the email will look like
        echo '<pre>';
        echo $body;
        echo '</pre>';

        echo '</div>';
      }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <label for="the_name">Your Name</label>
      <input type="text" name="name" id="the_name" />

      <label for="the_email">Email Address</label>
      <input type="email" name="email" id="the_email" />

      <label for="the_phone">Phone Number</label>
      <input type="tel" name="phone" id="the_phone" />

      <label for="the_reason">How can I help You?</label>
      <select name="reason" id="the_reason">
        <option selected>Choose One</option>
        <option value="help">I need help</option>
        <option value="hi">I just wanted to say "Hi!"</option>
        <option value="bug">I found a bug in your code</option>
      </select>

      <label for="the_message">Message</label>
      <textarea name="message" id="the_message"></textarea>

      <!-- The label below doesn't need a for tag because what it's inbedded inside of it automatically links it -->
      <label>
        <input type="checkbox" name="newsletter" value="true" checked/>
        Yes! Sign me up for the awesome newsletter! I don't get enough emails, honestly.
      </label>

      <input type="submit" value="Send Message" />
      <input type="hidden" name="did_send" value="true" />

    </form>


  </body>
</html>
