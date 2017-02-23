<?php
  error_reporting( E_ALL & ~E_NOTICE );
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Code Challenge - Day 4</title>
  </head>
  <body>
    <h2>Display the message if the user’s age is at least 21</h2>
    <?php
      $message = 'Hooray!  You are over 21';
      $age = $_GET['age'];

      if( $age >= 21 ) {
        echo $message;
      }else{
        echo 'Too young to drink, huh?';
      }
    ?>
    <form>
      <label for="age">What's your age, Homie?</label>
      <input type="numeric" name="age" />
      <input type="submit" value="This is my age!" />
    </form>

    <h2>Redirect the user to the file ‘secret-page.php’ if they are logged in.</h2>
    <p>The session variable ‘loggedin’ will be true if they are logged in.</p>
    <?php
      session_start();
      $logged_in = $_SESSION[‘loggedin’];

      if( $logged_in ) {
        header('location:secret_page.php');
      }
    ?>

    <h2>Display a success message if the score is higher than the high score. Otherwise, show an error message.</h2>
    <?php
      $score = $_COOKIE['score'];
      $high_score = 45,897,146,526;

      if( $score > $high_score ) {
        echo $feedback = 'You did it! You beat the highscore!';
      }else{
        echo $feedback = 'Well done! But you didn\'t beat the highscore!';
      }
    ?>

    <h2>Display a different message for each day of the week.</h2>
    <!-- ( use php.net to look up what date('w') means) -->
    <?php
      $day = date('w');
      switch ($day) {
        case 0:
          echo $message = 'Sunday Funday!'
          break;
        case 1:
          echo $message = 'And so the week begins...'
          break;
        case 2:
          echo $message = 'Taco Tuesday!'
          break;
        case 3:
          echo $message = 'Middle of the Week!'
          break;
        case 4:
          echo $message = 'Just one more day til the weekend!'
          break;
        case 5:
          echo $message = 'T.G.I.F!'
          break;
        case 6:
          echo $message = 'CELEBRATE! SATURDAY! CELEBRATE!'
          break;
      }
    ?>

    <h2></h2>
    <?php
      $vote = $_GET['vote'];
      $count = 0;
      $total = 0;

      if( $vote == 'yes' ) {
        $count ++;
        $total ++;
      }else{
        $total ++;
      }
    ?>

  </body>
</html>
