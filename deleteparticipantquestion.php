<?php
$uID = $_GET["uID"];
$oID = $_GET["oID"];
$newOrderID= $oID - 1;

include ("db_connect.php");

mysql_query("DELETE FROM questionOrder WHERE userID = '" . $uID . "' AND orderID = '".$oID."'");

$URL="participant_details.php?id=". $uID;

header ("Location: $URL");
?>