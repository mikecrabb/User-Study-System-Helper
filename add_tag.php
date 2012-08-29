<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>

<? $order=$_GET["order"]; ?>
<div class="main_content">
<table id="participanttable">
	<thead>
		<th></th>
		<th>Participant Name</th>
		
<?
$result = mysql_query("SELECT * FROM participant_data");
$counter = 0;
$x = 1;
while($row = mysql_fetch_array($result))
{
	echo "<th>". $row['data_name'] . "  <a href=\"delete_tag.php?id=". $row['data_ID']  . "\"><img src=\"images/cross.png\"</a> </th>";
  	$value[$counter] = $row['data_ID'];
  	$counter++;
}		
?>
<th><form name="input" action="add_metric.php" method="post">
<input type="text" name="tag" /><input class="submitbutton2" type="submit" value="Add Tag"/></th>
</thead><tr> <?
$result2 = mysql_query("SELECT * FROM participant");
while($row2 = mysql_fetch_array($result2))	
{
	$participant_ID = $row2['participant_ID'];
	$participant_name = $row2['participant_name'];
	?>
	<td><? echo $x; ?></td>
	<td><a href="participant_details.php?id=<? echo $participant_ID; ?>"><? echo $row2['participant_name'] ; ?></a></td>
	<?
	if ($value != 0)
	{
	foreach($value as $test)
	{

		$result3 = mysql_query("SELECT * FROM participant_data_information where participant_ID = '" . $participant_ID . "' && data_ID = 	'" . $test . "'");
		echo "<td>";
		while($row3 = mysql_fetch_array($result3))
		{
			echo $row3['data_value'];
		}
		echo "</td>";
	}
	}
	?></tr><?
	$x++;
}	
?>
	</tbody>
</table>
<p id="lower"><a href="new_participant.php">Add Participant…</a></p>
</div>
