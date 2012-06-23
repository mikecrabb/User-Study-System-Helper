<?php
$pname= $_POST["pname"];
$pnumber= $_POST["pnumber"];
$fluid= $_POST["fluid"];
$crystallized= $_POST["crystallized"];
$processing= $_POST["processing"];
$shortmem= $_POST["shortmem"];
$longmem= $_POST["longmem"];
$intusage= $_POST["intusage"];
$CMD= $_POST["CMD"];
$SD= $_POST["SD"];
$prepop= $_POST["prepop"];

include ("db_connect.php");

mysql_query("INSERT INTO participants ( userName, userDatabaseNumber, fluidLevel, crystallizedLevel, processingSpeed, shortMemory, longMemory, intUsage, CMDate, CMComplete, SDate, SComplete) VALUES ('" . $pname . "', '" . $pnumber . "', '" . $fluid . "', '" . $crystallized . "', '" . $processing . "', '" . $shortmem . "','" . $longmem . "','" . $intusage . "', '" . $CMD . "','No','" . $SD . "','No')") ;

if ($prepop=="yes")
{
	$orderID = 1;
	$result = mysql_query("SELECT * FROM participants WHERE userName = '". $pname . "'");
	while($row = mysql_fetch_array($result))
  {
	$userID= $row['userID'];
  }
		
	$result = mysql_query("SELECT * FROM questions ORDER by rand()");
while($row = mysql_fetch_array($result))
  {
  	$questionID= $row['questionID'];
	mysql_query("INSERT INTO questionOrder ( userID, orderID, questionID) VALUES ('" . $userID . "', '" . $orderID . "', '" . $questionID . "')") ;
	$orderID++;
  }
}


$URL="participants.php";

header ("Location: $URL");
?>


