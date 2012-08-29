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
<h2>Q<? echo $questionID ?>: <? echo $questionText; ?></h2>
<h3><a href="<? echo $questionWebsite; ?>"><? echo $questionWebsite; ?></a></h3>

<?php //include ("question_data.php"); ?>

  </div>
  
  <div id="chart">
  
	<table id="detailstable">
	
	<?
$result = mysql_query("SELECT * FROM question_data");


$counter = 0;
$x = 1;
while($row = mysql_fetch_array($result))
{
$result2 = mysql_query("SELECT * FROM question_data_information where question_ID = '" . $questionID . "' && q_data_ID = 	'" . $row['q_data_ID'] . "'");
echo "<tr><td><strong>" . $row['q_data_name'] . "</strong></td><td>";
while($row2 = mysql_fetch_array($result2))
{
 echo $row2['q_data_value'];
}
echo "</td></tr>";
}	
?>
</table>
	<p><a href="edit_question.php?id=<? echo $questionID; ?>">Edit...</a></p>
	</div>
</div>