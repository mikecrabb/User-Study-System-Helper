<?php

$userID = $_POST["userID"];
$pname = $_POST["pname"];

include ("db_connect.php");

$URL="participant_details.php?id=". $userID;

//header ("Location: $URL");

$result = mysql_query("SELECT * FROM participant_data");
while($row = mysql_fetch_array($result))
{
  	$value[$counter] = $row['data_ID'];
  	$counter++;
}


foreach($value as $test)
{
	$test2 = "\$_POST[\"".$test."\"]";
	eval("\$test3 = $test2".";"); 
	
		$checker = 0;
	$result = mysql_query("SELECT * FROM participant_data_information where data_ID='" . $test . "' AND participant_ID = '" . $userID . "'");
	while($row = mysql_fetch_array($result))
	{
	mysql_query("UPDATE participant_data_information SET data_value='" . $test3 . "' WHERE data_ID='" . $test . "' AND participant_ID = '" . $userID . "'"); 
		$checker = 1; 
	}
	if ($checker==0)
	{
		mysql_query("INSERT INTO participant_data_information (data_value, data_ID, participant_ID) VALUES ('" . $test3 . "','" . $test . "', '" . $userID . "'   )");
	}
	
	
	
	

}

	mysql_query("UPDATE participant SET participant_name='" . $pname . "' WHERE participant_ID = '" . $userID . "'"); 


$URL="participant_details.php?id=". $userID;

header ("Location: $URL");




?>