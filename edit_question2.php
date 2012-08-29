<?php
$questionID= $_POST["questionNumber"];
$questionText= $_POST["questionText"];
$questionWebsite= $_POST["questionWebsite"];


include ("db_connect.php");

mysql_query("UPDATE questions SET questionWebsite= '" . $questionWebsite . "',
questionText='" . $questionText . "'
WHERE questionID = '" . $questionID . "'");

$result = mysql_query("SELECT * FROM question_data");
while($row = mysql_fetch_array($result))
{
  	$value[$counter] = $row['q_data_ID'];
  	$counter++;
}


foreach($value as $test)
{
	$test2 = "\$_POST[\"".$test."\"]";
	eval("\$test3 = $test2".";");
	
	$checker = 0;
	$result = mysql_query("SELECT * FROM question_data_information where q_data_ID='" . $test . "' AND question_ID = '" . $questionID . "'");
	while($row = mysql_fetch_array($result))
	{
		mysql_query("UPDATE question_data_information SET q_data_value='" . $test3 . "' WHERE q_data_ID='" . $test . "' AND question_ID = '" . $questionID . "'");
		$checker = 1; 
	}
	if ($checker==0)
	{
		mysql_query("INSERT INTO question_data_information (q_data_value, q_data_ID, question_ID) VALUES ('" . $test3 . "','" . $test . "', '" . $questionID . "'   )");
	}
}

$URL="question_information.php?id=". $questionID;

header ("Location: $URL");
?>