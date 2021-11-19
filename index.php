<?php
  session_start();
  include('inc/config.php');

  if(isset($_SESSION['gameID'])){

    $ID = $_SESSION['ID'];
    $gameID = $_SESSION['gameID'];
     
    $GPUpdateSQL =
      "UPDATE game_participants
      SET PlayerActive = 0
      WHERE GameID = '$gameID' AND UserID = '$ID'
      ";

    $result1 = mysqli_query($conn, $GPUpdateSQL) or die(mysqli_error($conn));

    $gamesUpdateSQL =
      "UPDATE games
      SET StorytellerActive = 0,
          Locked = 0
      WHERE ID = '$gameID' AND StorytellerID = '$ID'
      ";

    $result2 = mysqli_query($conn, $gamesUpdateSQL) or die(mysqli_error($conn));
  }
  
    unset($_SESSION['gameID']);
    unset($_SESSION['gameName']);
?>

<!doctype html>
<html lang='en' dir='ltr'>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Nicholas Spears">
      <meta name="description" content="
      The Aftermath is a 'old-school' chat based Role Playing Game (RPG) system that focuses on streamlining storytelling and realism rather than excessive reliance upon
      dice rolls.  While highly versatile, it premiers with the backstory on a possible interpretation of the 'Mayan Apocalypse' that was set to occur on December 23rd 2012.
      This post apocalyptic RPG is built to take place either during or after massive earthquakes not only ravage the pacific ring of fire, but also cause super-eruptions of
      Earth's supervolcanoes.  Shortly thereafter, the Nuclear Option is deployed as the opening move that initiates World War III...Extensive research and carefully written
      fiction have been combined to bring everyone a more realistic post apocalyptic vision.  Enjoy!
      ">
      <title>Welcome to the Aftermath</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="css/styles.css" />

      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/home.js"></script>
    </head>

  <body class='px-0'>
    <div class="container-fluid black" id='contentWrap'>
      <?php 
        include('header.php');
        include('modals/adminModal.php');
        include('modals/adminLoginModal.php');
        include('modals/confirmationModal.php');
        include('modals/onlineModal.php');
        include('modals/descriptionModal.php');
        include('modals/notificationModal.php');
      ?>

      <div class='row metal border-bottom-0 py-2'>

        <div class='col-6 col-sm-6 col-md-3 order-1 order-md-1 py-1'>
          <a href='newCharacter.php#start' role='button' class="btn btn-warning btn-lg btn-block border px-0">NEW CHARACTER</a>
        </div>

        <div class='col-6 col-sm-6 col-md-3 order-3 order-md-2 py-1'>
          <a href='apocalypse.php#start' role='button' class='btn btn-dark btn-lg btn-block border px-0'>THE APOCALYPSE</a>
        </div>

        <div class='col-6 col-sm-6 col-md-3 order-4 order-md-3 py-1'>
          <a href='info.php#headingOne' role="button" class="btn btn-dark btn-lg btn-block border px-0">USER MANUAL</a>
        </div>
        
        <div class='col-6 col-sm-6 col-md-3 order-2 order-md-4 py-1'>
          <a href='characterSelect.php#start' role='button' class="btn btn-warning btn-lg btn-block border px-0">CHARACTER MGMT</a>
        </div>

      </div>

      <div class='row metal border-top-0 py-2'>

        <div class='col-6 order-1 col-sm-6 col-md-2 py-1'>
          <button type="button" class="btn btn-light btn-lg btn-block border px-0" id='onlineBtn'>ONLINE</button>
        </div>

        <div class='col-12 order-3 col-md-3 order-md-2 py-1'>
          <img src='img/graffiti/games.png' class='img-fluid h-100 mx-auto d-block' />
        </div>

        <div class='col-12 order-4 col-md-2 order-md-3 py-1 d-none d-md-block'>
          <img src='img/graffiti/description.png' class='img-fluid h-100 mx-auto d-block' />
        </div>

        <div class='col-12 order-5 col-md-1 order-md-4 py-1 d-none d-md-block'>
          <img src='img/graffiti/pop.png' class='img-fluid h-100 mx-auto d-block' />
        </div>

        <div class='col-6 order-2 col-sm-6 col-md-2 order-md-5 offset-md-2 py-1'>
          <a href='newGame.php#start' role='button' class="btn btn-danger btn-lg btn-block border px-0">NEW GAME</a>
        </div>

      </div>

      <div id='gameList'></div>
      
      <script src='js/instantMessage.js'></script>
      <script type="text/javascript" src="js/navigation.js"></script>
      <script src='node_modules/socket.io-client/dist/socket.io.js'></script>
      <?php include('footer.php'); ?>
    </div> 
  </body>
</html>