<?php 
  include("../inc/config.php");
  session_start();

  $characterID = $_SESSION['characterID'];

  $sql =    "SELECT Picture
            FROM characters 
            WHERE ID = '$characterID' ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  	if($row = $result->fetch_assoc()) {
  		$data = $row['Picture'];
      if($data === null){
        $data = "../games/characters/default.png";
      }
    	echo $data;
    }
  } else {
      echo "../games/characters/default.png";
  }
?>