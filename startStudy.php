<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<? $userID=$_POST["userID"] ?>
<? $nextq=0; ?>

<?
if ($nextq=="0")
{
	$nextq++;
	mysql_query("INSERT INTO currentStudy ( userID, currentPosition) VALUES ('" . $userID . "', '$nextq')") ; ?> 
	<? mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType) VALUES ('" . $userID . "', '" . time() . "', 'start')") ; ?>
	<h2>Study In Progress</h2>
	<? $result = mysql_query("SELECT questions.questionID as qID, questions.questionWebsite as website, questions.questionText as question, questionOrder.userID, questionOrder.questionOrderID as qoID, questionOrder.orderID as oID FROM questions, questionOrder WHERE questions.questionID = questionOrder.questionID AND userID = '".$userID."' AND questionOrder.orderID = '1'");
	?> <h3>Current Question</h3> <?
	while($row = mysql_fetch_array($result))
  { ?>
  <p><? echo $row['question']; ?></p>
  <p><? echo $row['website']; ?></p>
<? } 
?>
<form action="studyInProgress.php" method="post">
<input type="hidden" name="userID" value="<? echo $userID ?>">
<input type="hidden" name="nextq" value="<? echo $nextq ?>">
<input type="submit" class="submitbutton2" value="Next Question">
<?
}
?>
