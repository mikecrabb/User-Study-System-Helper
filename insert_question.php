<?php
$qt= $_POST["questionText"];
$qn= $_POST["questionNumber"];
$qw= $_POST["questionWebsite"];


include ("db_connect.php");

mysql_query("INSERT INTO questions (questionWebsite, questionText) VALUES ('" . $qw . "', '" . $qt . "')") ;

$URL="questions.php";

header ("Location: $URL");
?>


