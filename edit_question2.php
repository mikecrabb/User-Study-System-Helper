<?php
$questionID= $_POST["questionNumber"];
$qt= $_POST["questionText"];
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

mysql_query("UPDATE questions SET questionWebsite= '" . $qw . "', questionText='" . $qt . "', primaryNavigation='" . $pn . "', secondaryNavigation='" . $sn . "', navPlacement='" . $np . "', navStructure='" . $nc . "', siteMap='" . $sm . "', breadcrumbs='" . $bc . "', w3cvalidhtml='" . $wh . "', w3cvalidcss='" . $wc . "', readability='" . $ra . "', searchbox='" . $searchybox . "' WHERE questionID = '" . $questionID . "'");

$URL="question_information.php?qno=". $questionID;

header ("Location: $URL");
?>


