<?php 
  include("../inc/config.php");
  session_start();

	$sql = 
	"SELECT DISTINCT ID, GameName, Description, PlayerPassword, Locked, StorytellerActive, StorytellerID, Finished FROM games";
	    
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $playerTarget = 'playerLogin.php?'. $row['GameName'];
      $reference = $row['ID'];

      $sql2 = "SELECT COUNT(PlayerActive) FROM game_participants WHERE GameID = " . $reference . " AND PlayerActive = 1";
      $result2 = mysqli_query($conn, $sql2);
      $active = mysqli_fetch_array($result2);
      $activePlayers = $active[0];

        $sql3 = "SELECT DISTINCT Username FROM users WHERE ID = " . $row['StorytellerID'];
        $result3 = mysqli_query($conn, $sql3);
        $logged = mysqli_fetch_assoc($result3);
        
        if( empty($logged) ){
          $storyteller = 'Anonymous';
        } 
        else $storyteller = $logged['Username']; 
      
      if ($row['Locked'] == 0 && $row['StorytellerActive'] == 0 && $row['Finished'] == 0){
        echo "
        <div class='row black py-1'>
          <div class='order-6 order-sm-5 order-md-1 col-6 col-sm-4 col-md-2'>
            <button class='btn btn-success btn-lg btn-block border playBtn py-2 my-1' data-target='". $playerTarget ."' data-reference='". $reference ."'>PLAY</a>
          </div>

          <div class='order-1 order-md-2 col-12 col-md-3 py-1'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='order-4 order-md-3 col-6 col-md-2'>
            <div class='input-group input-group-lg'>
              <button class='btn btn-light btn-lg btn-block border descriptionBtn my-1' data-reference='". $reference ."'>DETAILS</a>
            </div>
          </div>

          <div class='order-2 d-md-none col-3 col-md-1 py-2'>
            <img src='img/graffiti/pop.png' class='img-fluid h-100 mx-auto d-block' />
          </div>

          <div class='order-3 order-md-4 col-3 col-md-1 py-1'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $activePlayers ."' readonly />
            </div>
          </div>
          
          <div class='order-7 order-md-5 col-6 col-sm-4 col-md-2'>
            <button class='btn btn-info btn-lg btn-block border tellBtn my-1' data-target='storytellerLogin.php?". $row['GameName'] ."' data-reference='". $reference ."'>TELL</a>
          </div>

          <div class='order-5 order-sm-6 order-md-6 col-12 col-sm-4 col-md-2'>
            <button class='btn btn-secondary btn-lg btn-block border adminBtn my-1' data-target='". $row['GameName'] ."' data-reference='". $reference ."'>ADMIN</a>
          </div>
        </div>
        <hr class='hr-white my-0 d-block d-md-none' />
        ";
      } 

      if ($row['Locked'] == 0 && $row['StorytellerActive'] == 1 && $row['Finished'] == 0) {

        echo "
        <div class='row black py-1'>
          <div class='col-12 order-7 col-md-2 order-md-1'>
            <button class='btn btn-success btn-lg btn-block border playBtn py-2 my-1' data-target='". $playerTarget ."' data-reference='". $reference ."'>PLAY</a>
          </div>

          <div class='order-1 order-md-2 col-12 col-md-3 py-1'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='order-6 order-md-3 col-6 col-md-2'>
            <div class='input-group input-group-lg'>
              <button class='btn btn-light btn-lg btn-block border descriptionBtn my-1' data-reference='". $reference ."'>DETAILS</a>
            </div>
          </div>

          <div class='order-4 d-md-none col-3 col-md-1 py-2'>
            <img src='img/graffiti/pop.png' class='img-fluid h-100 mx-auto d-block' />
          </div>

          <div class='order-5 order-md-4 col-3 col-md-1 py-1'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $activePlayers ."' readonly />
            </div>
          </div>
          
          <div class='order-3 order-md-6 col-6 col-md-2 py-1'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $storyteller ."' readonly />
            </div>
          </div>

          <div class='order-2 order-md-5 col-6 col-md-2'> 
            <img src='img/graffiti/storyteller.png' class='img-fluid h-100 mx-auto d-block' />
          </div>
        </div>
        <hr class='hr-white my-0 d-block d-md-none' />
        ";
      } 

      if ($row['Locked'] == 1 && $row['StorytellerActive'] == 1 && $row['Finished'] == 0) {
        echo "
        <div class='row black py-1'>
          <div class='col-12 order-7 col-md-2 order-md-1'>
            <img src='img/misc/lockIcon.png' class='img-fluid h-100 mx-auto d-block' />
          </div>

          <div class='order-1 order-md-2 col-12 col-md-3 py-1'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='order-6 order-md-3 col-6 col-md-2'>
            <div class='input-group input-group-lg'>
              <button class='btn btn-light btn-lg btn-block border descriptionBtn my-1' data-reference='". $reference ."'>DETAILS</a>
            </div>
          </div>

          <div class='order-4 d-md-none col-3 col-md-1 py-2'>
            <img src='img/graffiti/pop.png' class='img-fluid h-100 mx-auto d-block' />
          </div>

          <div class='order-5 order-md-4 col-3 col-md-1 py-1'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $activePlayers ."' readonly />
            </div>
          </div>
          
          <div class='order-3 order-md-6 col-6 col-md-2 py-1'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $storyteller ."' readonly />
            </div>
          </div>

          <div class='order-2 order-md-5 col-6 col-md-2'> 
            <img src='img/graffiti/storyteller.png' class='img-fluid h-100 mx-auto d-block' />
          </div>
        </div>
        <hr class='hr-white my-0 d-block d-md-none' />
        ";
      }
    } 
  } else {
    echo "
    <div class='row black py-1'>
      <div class='col'></div>
      <div class='col'>
          <h5 class='text-center' style='color: white;'><strong>NO OPEN GAMES AT THE MOMENT, GO AHEAD AND BUILD ONE!</strong></h4>
      </div>
      <div class='col'></div>
    </div>
    ";
  }
?>