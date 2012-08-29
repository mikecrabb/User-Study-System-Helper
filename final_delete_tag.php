<?php include ("db_connect.php"); ?>
<?
$dataID=$_POST["tagID"];
$type=$_POST["type"];

switch ($type)
{
case 1:
mysql_query("DELETE FROM participant_data WHERE data_ID='" . $dataID . "'") ;
$URL="participants.php";

break;

case 2:
mysql_query("DELETE FROM question_data WHERE q_data_ID='" . $dataID . "'") ;
$URL="questions.php";

break;

case 3:
mysql_query("DELETE FROM participant WHERE participant_ID='" . $dataID . "'") ;
$URL="participants.php";

break;

case 4:
mysql_query("DELETE FROM questions WHERE questionID='" . $dataID . "'") ;
$URL="questions.php";

break;

case 5:
mysql_query("DELETE FROM systemusers WHERE username='" . $dataID . "'") ;
$URL="manage_users.php";

break;
}





header ("Location: $URL");
?>