<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>

<? $order=$_GET["order"]; ?>
<div class="main_content">
<table id="participanttable">
	<thead>
		<th></th>
		<th>Question</th>
		<th>Question Website</th>
		
<?
$result = mysql_query("SELECT * FROM question_data");
$counter = 0;
$x = 1;
while($row = mysql_fetch_array($result))
{
	echo "<th>". $row['q_data_name'] . "  <a href=\"delete_tag.php?id=". $row['q_data_ID']  . "&type=2\"><img src=\"images/cross.png\"</a> </th>";
  	$value[$counter] = $row['q_data_ID'];
  	$counter++;
}		
?>
<th><form name="input" action="add_question_metric.php" method="post">
<input type="text" name="tag" /><input class="submitbutton2" type="submit" value="Add Tag"/></th>
</thead><tr> <?
$result2 = mysql_query("SELECT * FROM questions");
while($row2 = mysql_fetch_array($result2))	
{
	$question_ID = $row2['questionID'];
	$questiontext= $row2['questionText'];
	
	?>
	<td><? echo $x; ?></td>
	<td><a href="participant_details.php?id=<? echo $question_ID; ?>"><? echo $row2['questionText'] ; ?></a></td>
	<td><? echo $row2['questionWebsite']; ?></td>
	<?
	if ($value != 0)
	{
	foreach($value as $test)
	{

		$result3 = mysql_query("SELECT * FROM question_data_information where question_ID = '" . $question_ID . "' && q_data_ID = 	'" . $test . "'");
		echo "<td>";
		while($row3 = mysql_fetch_array($result3))
		{
			echo $row3['q_data_value'];
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
<p id="lower"><a href="new_participant.php">Add Participant...</a></p>
</div>