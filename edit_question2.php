<?php
$questionID= $_POST["questionNumber"];
$qt= $_POST["questionText"];
$qw= $_POST["questionWebsite"];
$pn= $_POST["primaryNavigation"];
$sn= $_POST["secondaryNavigation"];
$np= $_POST["navPlacement"];
$nc= $_POST["navStructure"];
$sm= $_POST["sitemap"];
$searchbox= $_POST["searchbox"];
$bc= $_POST["breadcrumbs"];
$fk= $_POST["fleshkincaid"];
$wh= $_POST["validhtml"];
$wc= $_POST["validcss"];
$sop= $_POST["sentenceonpage"];
$wop= $_POST["wordsonpage"];
$sop2= $_POST["syllablesonpage"];
$wps= $_POST["wordspersentence"];
$spw= $_POST["syllablesperword"];

include ("db_connect.php");

mysql_query("UPDATE questions SET questionWebsite= '" . $qw . "',
syllablesperword= '" . $spw . "',
sentenceonpage= '" . $sop . "',
wordsonpage= '" . $wop . "',
syllablesonpage= '" . $sop2 . "',
wordspersentence= '" . $wps . "',
questionText='" . $qt . "',
primaryNavigation='" . $pn . "',
secondaryNavigation='" . $sn . "',
navPlacement='" . $np . "',
navStructure='" . $nc . "',
siteMap='" . $sm . "',
breadcrumbs='" . $bc . "',
w3cvalidhtml='" . $wh . "',
w3cvalidcss='" . $wc . "',
fleshkincaid='" . $fk . "',
searchbox='" . $searchbox . "'
WHERE questionID = '" . $questionID . "'");


$URL="question_information.php?qno=". $questionID;

header ("Location: $URL");
?>


