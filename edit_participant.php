<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>

<? $userID=$_GET["id"] ?>
<? $qID=$_GET["qID"] ?>

<div class="main_content">
	<div id="details">
	
<form name="participantform" action="edit_participant2.php" method="post">	
<input type="hidden" name="userID" value="<? echo $userID ?>">

<?
$result = mysql_query("SELECT * FROM participant where participant_ID = '" . $userID . "'");
while($row = mysql_fetch_array($result))
{
$userName = $row['participant_name'];
}
?>
<h1>Participant ID: <? echo $userID ?></h1>
<h1><input id="pname" type="text" name="pname" size="15" value="<? echo $userName ?>"/></h1>	

	</div>
  
  	<div id="chart">
  
	<table id="detailstable">
	
<?
$result = mysql_query("SELECT * FROM participant_data");
$counter = 1;
while($row = mysql_fetch_array($result))
{
  	$value[$counter] = $row['data_ID'];
  	$counter++; 
}

	if ($value != 0)
	{
foreach($value as $test)
{
		$result = mysql_query("SELECT * FROM participant_data where data_ID = '" . $test . "'");
		while($row = mysql_fetch_array($result))
		{
			echo "<tr><td><strong>" . $row['data_name'] . "</strong></td><td>";
		}
		$result2 = mysql_query("SELECT * FROM participant_data_information where participant_ID = '" . $userID . "' && data_ID = '" . $test . "'");
	
		$datavalue = "";
		$dataID = "";
		while($row2 = mysql_fetch_array($result2))
		{
			$datavalue = $row2['data_value'];
		}

		?><input type="text" value = "<? echo $datavalue; ?>" name="<? echo $test;?>">
		<?
		echo "</td></tr>";
}
}

?>


</table>
	<input type="submit" class="submitbutton" value="Submit">
	</div>
	
</div>