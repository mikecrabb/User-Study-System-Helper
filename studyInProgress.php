<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<? $userID=$_POST["userID"] ?>
<? $nextq=$_POST["nextq"] ?>
<? $switcher=$_POST["switcher"] ?>

<?
$x=1; //this probably does nothing, but I'm leaving it in just in case I've done something stupid






$result = mysql_query("SELECT * FROM currentStudy");
while($row = mysql_fetch_array($result))
  {
  	$currentPosition = $row['currentPosition'];
  }
  	 	
$result = mysql_query("SELECT questions.questionID as qID, questions.questionWebsite as website, questions.questionText as question, questionOrder.userID, questionOrder.questionOrderID as qoID, questionOrder.orderID as oID FROM questions, questionOrder WHERE questions.questionID = questionOrder.questionID AND userID = '".$userID."' AND questionOrder.orderID = '".$currentPosition."'");
  while($row = mysql_fetch_array($result))
  	{ 
		$qID= $row['qID'];
	} 

switch ($switcher)
{
case 1:
	// QUESTION COMPLETED SUCCESSFULLY
  	mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType, questionID) VALUES ('" . $userID . "', '" . time() . "', 'success', '" . $qID . "')") ;
  	$nextq++;
	mysql_query("UPDATE currentStudy SET userID= '" . $userID . "', currentPosition='" . $nextq . "'");
	$result = mysql_query("SELECT * FROM currentStudy");
	while($row = mysql_fetch_array($result))
  	{
  		$currentPosition = $row['currentPosition'];
  	}
  	$result = mysql_query("SELECT questions.questionID as qID, questions.questionWebsite as website, questions.questionText as question, questionOrder.userID, questionOrder.questionOrderID as qoID, questionOrder.orderID as oID FROM questions, questionOrder WHERE questions.questionID = questionOrder.questionID AND userID = '".$userID."' AND questionOrder.orderID = '".$currentPosition."'");
  while($row = mysql_fetch_array($result))
  	{ 
		$qID= $row['qID'];
	} 
	mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType, questionID) VALUES ('" . $userID . "', '" . time() . "', 'q_loaded', '" . $qID . "')") ;
  break;
case 2:
	// QUESTION PASSED
  	mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType, questionID) VALUES ('" . $userID . "', '" . time() . "', 'passed', '" . $qID . "')") ;
  	$nextq++;
	mysql_query("UPDATE currentStudy SET userID= '" . $userID . "', currentPosition='" . $nextq . "'");
	$result = mysql_query("SELECT * FROM currentStudy");
	while($row = mysql_fetch_array($result))
  	{
  		$currentPosition = $row['currentPosition'];
  	}
  	$result = mysql_query("SELECT questions.questionID as qID, questions.questionWebsite as website, questions.questionText as question, questionOrder.userID, questionOrder.questionOrderID as qoID, questionOrder.orderID as oID FROM questions, questionOrder WHERE questions.questionID = questionOrder.questionID AND userID = '".$userID."' AND questionOrder.orderID = '".$currentPosition."'");
  while($row = mysql_fetch_array($result))
  	{ 
		$qID= $row['qID'];
	} 
	mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType, questionID) VALUES ('" . $userID . "', '" . time() . "', 'q_loaded', '" . $qID . "')") ;
  break;
case 3:
	// BACK
	  	mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType, questionID) VALUES ('" . $userID . "', '" . time() . "', 'backfrom', '" . $qID . "')") ;
  	$nextq--;
	mysql_query("UPDATE currentStudy SET userID= '" . $userID . "', currentPosition='" . $nextq . "'");
	$result = mysql_query("SELECT * FROM currentStudy");
	while($row = mysql_fetch_array($result))
  	{
  		$currentPosition = $row['currentPosition'];
  	}
  	$result = mysql_query("SELECT questions.questionID as qID, questions.questionWebsite as website, questions.questionText as question, questionOrder.userID, questionOrder.questionOrderID as qoID, questionOrder.orderID as oID FROM questions, questionOrder WHERE questions.questionID = questionOrder.questionID AND userID = '".$userID."' AND questionOrder.orderID = '".$currentPosition."'");
  while($row = mysql_fetch_array($result))
  	{ 
		$qID= $row['qID'];
	} 
	mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType, questionID) VALUES ('" . $userID . "', '" . time() . "', 'q_loaded', '" . $qID . "')") ;
  break;  
  case 4:
  // SEARCH USED
	mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType, questionID) VALUES ('" . $userID . "', '" . time() . "', 'search', '" . $qID . "')") ; 
  break;
  
  case 5:
  // QUESTIONNAIRE START
	mysql_query("INSERT INTO studyTimestamps ( userID, timestamp, stampType, questionID) VALUES ('" . $userID . "', '" . time() . "', 'q_start', '" . $qID . "')") ; 
  break;
  
}
?>

<h2>Study In Progress</h2>
	<? $result = mysql_query("SELECT questions.questionID as qID, questions.questionWebsite as website, questions.questionText as question, questionOrder.userID, questionOrder.questionOrderID as qoID, questionOrder.orderID as oID FROM questions, questionOrder WHERE questions.questionID = questionOrder.questionID AND userID = '".$userID."' AND questionOrder.orderID = '".$nextq."'");

	while($row = mysql_fetch_array($result))
  { ?>
  <h3>Current Question (No.<? echo $nextq; ?>) (Q.<? echo $row['qID']; ?>)</h3>
  <p><? echo $row['question']; ?></p>
  <p><? echo $row['website']; ?></p>
<? } ?>



<table width = "100%">
<tr height = "60px">
  <td>
  <form action="studyInProgress.php" method="post">
<input type="hidden" name="userID" value="<? echo $userID ?>">
<input type="hidden" name="switcher" value="1">
<input type="hidden" name="nextq" value="<? echo $nextq ?>">
<input type="submit" class="submitbutton2" value="Question Completed">
</form>
  </td>
  <td>
  <form action="studyInProgress.php" method="post">
<input type="hidden" name="userID" value="<? echo $userID ?>">
<input type="hidden" name="switcher" value="2">
<input type="hidden" name="nextq" value="<? echo $nextq ?>">
<input type="submit" class="submitbutton2" value="Question Passed">
</form>
  </td>
</tr>
<tr>
  <td>
  <form action="studyInProgress.php" method="post">
<input type="hidden" name="userID" value="<? echo $userID ?>">
<input type="hidden" name="switcher" value="4">
<input type="hidden" name="nextq" value="<? echo $nextq ?>">
<input type="submit" class="submitbutton2" value="Search Box Used">
</form>
  </td>
    <td>
  <form action="studyInProgress.php" method="post">
<input type="hidden" name="userID" value="<? echo $userID ?>">
<input type="hidden" name="switcher" value="5">
<input type="hidden" name="nextq" value="<? echo $nextq ?>">
<input type="submit" class="submitbutton2" value="Questionnaire Start">
</form>
  </td>
  <td>
  <form action="studyInProgress.php" method="post">
<input type="hidden" name="userID" value="<? echo $userID ?>">
<input type="hidden" name="switcher" value="3">
<input type="hidden" name="nextq" value="<? echo $nextq ?>">
<input type="submit" class="submitbutton2" value="Previous Question">
</form>
  </td>
</tr>
</table>