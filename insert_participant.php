<?php

include ("db_connect.php");

$tag= $_POST["tag"];

mysql_query("INSERT INTO participant (participant_name) VALUES ('" . $tag . "')");

$URL="participants.php";

header ("Location: $URL");
?>

