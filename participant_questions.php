<?php include ("db_connect.php"); ?>

<table id="participanttable">
	<thead>
		<th>ID</th>
		<th colspan=2>Question</th>
		<th>Website</th>
	</thead>
	<tbody>
	
<? $result = mysql_query("SELECT questions.questionID as qID, questions.questionWebsite as website, questions.questionText as question, questionOrder.userID, questionOrder.questionOrderID as qoID, questionOrder.orderID as oID FROM questions, questionOrder WHERE questions.questionID = questionOrder.questionID AND userID = '".$userID."' ORDER BY orderID ASC");

$nextquestionorder = 1;
while($row = mysql_fetch_array($result))
  {
  $qID = $row['qID'];
  $oID = $row['oID'];
  $website = $row['website'];
  $question = $row['question'];
  $nextquestionorder = $nextquestionorder+1;
?>		
		<tr>
			<td width ="10%"><? echo $qID ; ?></td>
			<?
			$result2 = mysql_query("SELECT * FROM questionnaires where userID = '".$userID ."'AND questionID = '" . $qID . "'");
			$row = mysql_fetch_array($result2); 
			$num_results = mysql_num_rows($result2); 
			//echo $num_results;
			if ($num_results > 0)
			{ 
			?> <td width ="2%"><a href="participant_details.php?id=<? echo $userID; ?>&qID=<? echo $qID; ?>"><img src="images/info2.png"></a></td> <?
			}
			else
			{ 
			echo "<td></td>"; 
			} 
			
			?>
			<td><? echo $question ; ?></td>
			<td><? echo $website ; ?></td>
			<td width ="2%"><a href="changeup.php?oID=<? echo $oID; ?>&uID=<? echo $userID; ?>"><img src="images/up.png"></a></td>
			<td width ="2%"><a href="changedown.php?oID=<? echo $oID; ?>&uID=<? echo $userID; ?>"><img src="images/down.png"></a></td>
			<td width ="2%"><a href="deleteparticipantquestion.php?oID=<? echo $oID; ?>&uID=<? echo $userID; ?>"><img src="images/cross.png"></a></td>

		</tr>
<? } ?>
	</tbody>
</table>
<form action="add_questions_to_participant.php" method="post">
<select name="questionID">

<? $result = mysql_query("SELECT * FROM questions");

while($row = mysql_fetch_array($result))
  {
  $questionID= $row['questionID'];
  $text = $row['questionText'];

  
?>
<option value="<? echo $questionID; ?>">Q<? echo $questionID; ?>: <? echo $text; ?></option>
<? } ?>
</select>
<input type="hidden" name="userID" value="<? echo $userID ?>">
<input type="hidden" name="orderID" value="<? echo $nextquestionorder ?>">
<input type="submit" class="submitbutton" value="Add Question">

</form>