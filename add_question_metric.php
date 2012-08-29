<?php

include ("db_connect.php");

$tag= $_POST["tag"];

mysql_query("INSERT INTO question_data (q_data_name) VALUES ('" . $tag . "')");

$URL="questions.php";

header ("Location: $URL");
?>
