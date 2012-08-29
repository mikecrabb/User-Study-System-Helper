<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>

<? $userID=$_GET["id"] ?>
<? $qID=$_GET["qID"] ?>

<div class="main_content">
	<div id="details">
	<?
$result = mysql_query("SELECT * FROM participant where participant_ID = '" . $userID . "'");
while($row = mysql_fetch_array($result))
{
$userName = $row['participant_name'];
}
?>
		<h1>Participant ID: <? echo $userID ?></h1>
		<h1><? echo $userName; ?></h1>

<?php 

if (isset($qID))
{
include ("participant_question_info.php");
}
else
{
include ("participant_questions.php");
}

?>

	</div>
  
  	<div id="chart">
  
	<table id="detailstable">
	
	<?
$result = mysql_query("SELECT * FROM participant_data");
$counter = 0;
$x = 1;
while($row = mysql_fetch_array($result))
{
$result2 = mysql_query("SELECT * FROM participant_data_information where participant_ID = '" . $userID . "' && data_ID = 	'" . $row['data_ID'] . "'");
echo "<tr><td><strong>" . $row['data_name'] . "</strong></td><td>";
while($row2 = mysql_fetch_array($result2))
{
 echo $row2['data_value'];
}
echo "</td></tr>";
}	
?>
</table>
	<p><a href="edit_participant.php?id=<? echo $userID; ?>">Edit...</a></p>
	</div>
</div>