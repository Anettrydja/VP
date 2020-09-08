<?php
  $username = "Anett Rüdja";
  $fulltimenow = date ("d.m.Y H:i:s");
  $hournow = date("H");
  $partofday = "lihtsalt aeg";
  if($hournow < 6){	  
	  $partofday = "uneaeg";
  }//enne 6
  if($hournow >= 8 and $hournow <= 18) {
	  $partofday = "õppimise aeg";
  }
  
  //vaatame semestri kulgemist
  $semesterstart = new DateTime("2020-8-31");
  $semesterend = new DateTime("2020-12-13");
  $semesterduration = $semesterstart->diff($semesterend);
  $semesterdurationdays = $semesterduration->format("%r%a");
  $today = new DateTime("now");
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title><?php echo $username; ?>  programmeerib veebi</title>
  
</head>
<body>
  <h1><?php echo $username; ?> </h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See leht on loodud veebiprogrammeerimise kursusel aastal 2020 <a href="https://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
  <p>See on juurde lisatud lõik</p>
  <p>Lehe avamise hetk: <?php echo$fulltimenow; ?>.<p>
  <p><?php echo "praegu on " .$partofday ."."; ?></p>
</body>
</html>