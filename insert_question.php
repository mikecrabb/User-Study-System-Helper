<?php
$qt= $_POST["questionText"];
$qn= $_POST["questionNumber"];
$qw= $_POST["questionWebsite"];
$pn= $_POST["primaryNav"];
$sn= $_POST["secondaryNav"];
$np= $_POST["navPlacement"];
$nc= $_POST["navConsistancy"];
$sm= $_POST["siteMap"];
$searchybox= $_POST["searchyBox"];
$bc= $_POST["breadcrumbs"];
$ra= $_POST["readability"];
$wh= $_POST["w3cvalidhtml"];
$wc= $_POST["w3cvalidcss"];

include ("db_connect.php");

mysql_query("INSERT INTO questions ( questionID, questionWebsite, questionText, primaryNavigation, secondaryNavigation, navPlacement, navStructure, siteMap, breadcrumbs, w3cvalidhtml, w3cvalidcss, readability, searchbox) VALUES ('" . $qn . "', '" . $qw . "', '" . $qt . "', '" . $pn . "', '" . $sn . "', '" . $np . "', '" . $nc . "','" . $sm . "','" . $bc . "', '" . $wh . "','". $wc ."','" . $ra . "','" . $searchybox . "')") ;

$URL="questions.php";

header ("Location: $URL");
?>


