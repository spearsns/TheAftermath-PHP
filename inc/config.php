<?php 
   
   $conn = mysqli_connect("http://ls-125625ace81829be7cbb4c6219b35ce546aa2021.czzqnjjvwmrc.us-east-1.rds.amazonaws.com", 'dbmasteruser', 'drJs1th6c90S?[VCFY5&)V7oPknSLA+{', "aftermath");
   if(! $conn )
   {
     die('Could not connect: ' . mysql_error());
   }

?>