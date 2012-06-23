<?php
$userID= $_POST["userID"];
$orderID= $_POST["orderID"];
$questionID= $_POST["questionID"];


include ("db_connect.php");

mysql_query("INSERT INTO questionOrder ( userID, orderID, questionID) VALUES ('" . $userID . "', '" . $orderID . "', '" . $questionID . "')") ;

$URL="participant_details.php?id=". $userID;

header ("Location: $URL");
?>


