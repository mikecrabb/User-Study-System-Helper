<?php
$uID = $_GET["uID"];
$oID = $_GET["oID"];
$newOrderID= $oID + 1;

include ("db_connect.php");

mysql_query("UPDATE questionOrder SET orderID = 99 WHERE userID = '" . $uID . "' AND orderID = '".$newOrderID."'");
mysql_query("UPDATE questionOrder SET orderID = '".$newOrderID."' WHERE userID = '" . $uID . "' AND orderID = '".$oID."'");
mysql_query("UPDATE questionOrder SET orderID = '".$oID."' WHERE userID = '" . $uID . "' AND orderID = 99");

$URL="participant_details.php?id=". $uID;

header ("Location: $URL");
?>



