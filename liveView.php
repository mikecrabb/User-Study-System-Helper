<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<? $userID=0; ?>
<? $userID=$_GET["id"] ?>
<div class="main_content">
<?php
if ($userID==0)
{ ?>
	<h2>Select Participant</h2>
<form action="liveView.php" method="get">
<p><select name="id">
<? $result = mysql_query("SELECT * FROM participants");

while($row = mysql_fetch_array($result))
  {
  $userID= $row['userID'];
  $userName = $row['userName'];

  
?>
<option value="<? echo $userID; ?>"><? echo $userName; ?></option>
<? } ?>
</select>
<input type="submit" class="submitbutton2" value="Submit"></p>
<?
}
else
{
	 $result = mysql_query("SELECT * FROM participants WHERE userID = '".$userID."'");

while($row = mysql_fetch_array($result))
  { ?>
  <h1><? echo $row['userName']; ?></h1>
  <? include ("participant_questions.php"); ?>
  
 <form action="startStudy.php" method="post">
<input type="hidden" name="userID" value="<? echo $userID ?>">
<input type="submit" class="submitbutton2" value="Start Study">
  

<? } 
}
?>
</div>

