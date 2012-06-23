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
$userID = $_POST["userID"];

include ("db_connect.php");

mysql_query("UPDATE participants SET userName= '" . $pname . "', userDatabaseNumber='" . $pnumber . "', fluidLevel='" . $fluid . "', crystallizedLevel='" . $crystallized . "', processingSpeed='" . $processing . "', shortMemory='" . $shortmem . "', longMemory='" . $longmem . "', intUsage='" . $intusage . "', CMDate='" . $CMD . "', SDate='" . $SD . "' WHERE userID = '" . $userID . "'");

$URL="participant_details.php?id=". $userID;

header ("Location: $URL");
?>


