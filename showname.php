<?php
include ("header.php");
include ("db_connect.php");
$userID = $_POST["userID"];
?>
<br/><br/>
<div class="warning">You are about to reveal a participants name, this must ONLY be done if REALLY REALLY needed</div>

<div class="info">Participant information is to be kept confidential, this function only exists in order to follow up on any information obtained within a study. The participants name will be shown on the understanding that it not be directly linked to the data that was gathered during the study.</div>

<? if ($_GET["valid"]=="M9wK6th8JN36DwFkmZ6tg8TPCUySwVhLC5TeaQqVexxV5GD7yCbPGA37WZDL2ac8")
{
$userID = $_GET["id"];
$result = mysql_query("SELECT * FROM participants WHERE userID = '".$userID."'");
while($row = mysql_fetch_array($result))
  {
  $displayName = $row['userName'];
  }
?>
<div class="error">This participant is <? echo $displayName ?><br/><strong>DO NOT LEAVE THIS WINDOW OPEN FOR ANY LENGTH OF TIME</strong></div>
<?
}
else
{
?>

<p>To show participant name, please enter your system password</p>
<form name="showname" action="showname2.php" method="post">
<input name="userID" type="hidden" value="<? echo $userID ?>">
<input name="password" type="password">
<input type="submit" class="submitbutton2" value="Submit">
<? } ?>


