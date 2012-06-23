<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<table id="participanttable">
	<thead>
		<th>Question No.</th>
		<th>Website</th>
		<th>Question</th>
	</thead>
	<tbody>
	
<? $result = mysql_query("SELECT * FROM questions");
while($row = mysql_fetch_array($result))
  {
  $qNo = $row['questionID'];
  $website = $row['questionWebsite'];
  $question = $row['questionText'];
?>		
		<tr>
			<td width="10%"><a href="question_information.php?qno=<? echo $qNo ; ?>"><? echo $qNo ; ?></a></td>
			<td><? echo $website ; ?></td>
			<td><? echo $question ; ?></td>


		</tr>
<? } ?>
	</tbody>
</table>
<p><a href="add_questions.php">Add Questions...</a></p>