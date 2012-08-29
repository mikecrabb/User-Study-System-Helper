<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<div class="main_content">
<? $questionID=$_GET["id"] ?>
<? $result = mysql_query("SELECT * FROM questions WHERE questionID = '".$questionID."'");
while($row = mysql_fetch_array($result))
  {
  $questionWebsite = $row['questionWebsite'];
  $questionText = $row['questionText'];
  }
?>
<div id="details">
<form name="questionform" action="edit_question2.php" method="post">
<input name="questionNumber" type="hidden" value="<? echo $questionID ?>">

<h2>Question: <input id="pnumber" type="text" name="questionText" size="40" value="<? echo $questionText ?>" required></h2>
<h3>Website: <input id="pweb" type="text" name="questionWebsite" size="20" value="<? echo $questionWebsite ?>" required></h3>

<?php //include ("question_data.php"); ?>

  </div>
  
  <div id="chart">
  
	<table id="detailstable">
	
	<?
	$result = mysql_query("SELECT * FROM question_data");
	$counter = 1;
while($row = mysql_fetch_array($result))
{
  	$value[$counter] = $row['q_data_ID'];
  	$counter++; 
}

	if ($value != 0)
	{
foreach($value as $test)
{
		$result = mysql_query("SELECT * FROM question_data where q_data_ID = '" . $test . "'");
		while($row = mysql_fetch_array($result))
		{
			echo "<tr><td><strong>" . $row['q_data_name'] . "</strong></td><td>";
		}
		$result2 = mysql_query("SELECT * FROM question_data_information where question_ID = '" . $questionID . "' && q_data_ID = '" . $test . "'");
	
		$datavalue = "";
		$dataID = "";
		while($row2 = mysql_fetch_array($result2))
		{
			$datavalue = $row2['q_data_value'];
		}

		?><input type="text" value = "<? echo $datavalue; ?>" name="<? echo $test;?>">
		<?
		echo "</td></tr>";
}
}

?>


</table>
	<input type="submit" class="submitbutton" value="Submit">
	</div>
	
</div>