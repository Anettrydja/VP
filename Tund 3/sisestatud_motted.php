<?php

	$username = "Anett Rüdja";
	
   //var_dump($_POST);
   require("../../../config.php");
   $database = "if20_anett_ry_1";
   //kui on idee sisestatud ja nuppu vajutatud, salvestame selle andmebassi
   if(isset($_POST["ideasubmit"]) and !empty($_POST["ideainput"])){
	   $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
	   //valmistan ette SQL käsu
	   $stmt = $conn->prepare("INSERT INTO myideas (idea) VALUES(?)");
	   echo $conn->error;
	   //seome käsuga pärisandmed
	   //i - integer, d - decimal, s - string
	   $stmt->bind_param("s", $_POST["ideainput"]);
	   $stmt->execute();
	   $stmt->close();
	   $conn->close();
   } 
   
   //loen lehele kõik olemasolevad mõtted
   $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
   $stmt = $conn->prepare("SELECT idea FROM myideas");
   echo $conn->error;
   //seome tulemuse muutujaga
   $stmt->bind_result($ideafromdb);
   $stmt->execute();
   $ideahtml = "";
   while($stmt->fetch()){
	   $ideahtml .= "<p>" .$ideafromdb ."</p>";
   }
   $stmt->close();
   $conn->close();
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">  
  <title><?php echo $username; ?> programmeerib veebi</title>
  
</head>
<html>
 <body>
  <h1>Sisestatud mõtted:</h1>
  <hr>
  <?php echo $ideahtml; ?>
  <button><a href="home.php">Tagasi avalehele</button>
 </body>
</html>