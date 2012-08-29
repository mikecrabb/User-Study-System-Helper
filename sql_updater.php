<?
include ("db_connect.php");

echo "<table border = 1>";
echo "<tr><th>QuestionID</th><th>UserID</th><th>orderID</th><th>DOB</th><th>Sex</th><th>fluidLevel</th><th>processingSpeed</th><th>shortTermMemory</th><th>longTermMemory</th><th>internetUsage</th><th>internetExperience</th><th>cogMeasureDate</th><th>studyDate</th><th>preQuestionInterest</th><th>preQuestionEase</th><th>preVisitSite</th><th>postFeelLost</th><th>postFeelCircles</th><th>postFindPrevious</th><th>postNavigation</th><th>postDesiredLocation</th><th>postDisoriented</th><th>poostNoIdea</th><th>postLearningSite</th><th>postSkilfulEasy</th><th>postEasyNav</th><th>postConfDirection</th><th>postRightPath</th><th>postBackForward</th><th>postCurrentPlace</th><th>postFindPage</th>";
$headerstuff= mysql_query("SELECT * FROM website_characteristics order by characteristicID ASC");
while($row = mysql_fetch_array($headerstuff))
{
	echo "<th>" . $row['characteristicName'] . "</th>";
}
echo "</tr>";

$result = mysql_query("SELECT * FROM question_information order by userID ASC, questions_questionID ASC, urlID ASC");
while($row = mysql_fetch_array($result))
{




	$userID = $row['userID'];
	$questionID = $row['questions_questionID'];
	$urlID = $row['urlID'];
	$tableID = $row['tableID'];
	
				echo "<tr>";
				echo "<td>" . $questionID . "</td>";
				echo "<td>" . $userID . "</td>";
	$participantresult = mysql_query("SELECT * FROM participant_information WHERE userID = '". $userID ."' and questionID = '". $questionID ."'");
	while($row = mysql_fetch_array($participantresult))
	{
		echo "<td>" . $row['orderID'] . "</td>";
		echo "<td>" . $row['DOB'] . "</td>";
		echo "<td>" . $row['Sex']. "</td>";
		echo "<td>" . $row['fluid'] . "</td>";
		echo "<td>" . $row['processing'] . "</td>";
		echo "<td>" . $row['shortMem'] . "</td>";
		echo "<td>" . $row['longMem'] . "</td>";
		echo "<td>" . $row['intUsage'] . "</td>";
		echo "<td>" . $row['intExperience'] . "</td>";
		echo "<td>" . $row['cogMeasureDate'] . "</td>";
		echo "<td>" . $row['studyDate'] . "</td>";
		echo "<td>" . $row['preQuestionInterest'] . "</td>";
		echo "<td>" . $row['preQuestionEase'] . "</td>";
		echo "<td>" . $row['preVisitSite'] . "</td>";
		echo "<td>" . $row['postFeelLost'] . "</td>";
		echo "<td>" . $row['postFeelCircles'] . "</td>";
		echo "<td>" . $row['postFindPrevious'] . "</td>";
		echo "<td>" . $row['postNavigation'] . "</td>";
		echo "<td>" . $row['postDesiredLocation'] . "</td>";
		echo "<td>" . $row['postDisoriented'] . "</td>";
		echo "<td>" . $row['postNoIdea'] . "</td>";
		echo "<td>" . $row['postLearningSite'] . "</td>";
		echo "<td>" . $row['postSkilfulEasy'] . "</td>";
		echo "<td>" . $row['postEasyNav'] . "</td>";
		echo "<td>" . $row['postConfDirection'] . "</td>";
		echo "<td>" . $row['postRightPath'] . "</td>";
		echo "<td>" . $row['postBackForward'] . "</td>";
		echo "<td>" . $row['postCurrentPlace'] . "</td>";
		echo "<td>" . $row['postFindPage'] . "</td>";
		
	}
	
	
	$result2 = mysql_query("SELECT * FROM website_characteristics order by characteristicID ASC");
	while($row = mysql_fetch_array($result2))
	{
		$characteristicID = $row['characteristicID'];
		$nextresult = mysql_query("SELECT * FROM page_characteristics where tableID = '".$tableID."' and  characteristicID = '".$characteristicID."'");
		while ($row = mysql_fetch_array($nextresult))
			{
				$characteristicValue = $row['characteristicValue'];
				echo "<td>" . $characteristicValue . "</td>";
				//echo "<td>" . $characteristicID . "</td>";
				flush();
				ob_flush();	
			}

	}
			echo "</tr>";
}
echo "</table>";
?>
    