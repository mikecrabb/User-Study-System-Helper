<?php include 'db_connect.php'; ?>
<link rel="stylesheet" href="stylesheet.css" />


<?
$result = mysql_query("SELECT * FROM currentStudy");
while($row = mysql_fetch_array($result))
  {
  	$userID = $row['userID'];
  	$currentPosition = $row['currentPosition'];
  }
if (empty($userID))
  	{
  		?><h1>No study is currently active</h1><?
 	 }
else
 	 {
  	 	$result = mysql_query("SELECT questions.questionID as qID, questions.questionWebsite as website, questions.questionText as question, questionOrder.userID, questionOrder.questionOrderID as qoID, questionOrder.orderID as oID FROM questions, questionOrder WHERE questions.questionID = questionOrder.questionID AND userID = '".$userID."' AND questionOrder.orderID = '".$currentPosition."'");
  while($row = mysql_fetch_array($result))
  	{ ?>
  	<? $qID= $row['qID']; ?>
  			<h1><? echo $row['question']; ?><h1>
  			<h2><? echo $row['website']; ?><h2>
  			<? mysql_query("INSERT INTO studyTimestamps ( userID, questionID, timestamp, stampType) VALUES ('" . $userID . "', '" . $qID . "', '" . time() . "', 'popup')") ; ?>
	<? } 
	

	
 	 }
?>

