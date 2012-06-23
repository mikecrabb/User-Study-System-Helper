<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>

<? $userID=$_GET["id"] ?>

<? $result = mysql_query("SELECT * FROM participants WHERE userID = '".$userID."'");
while($row = mysql_fetch_array($result))
  {

  $fluid = $row['fluidLevel'];
  $crystallized = $row['crystallizedLevel'];
  $processing = $row['processingSpeed'];
  $shortMem = $row['shortMemory'];
  $longMem = $row['longMemory'];
  $intUsage = $row['intUsage'];
  $userName = $row['userName'];
  $displayName = "xxxxxx";
  $databaseNumber = $row['userDatabaseNumber'];
  $CMD = $row['CMDate'];
  $CMC = $row['CMComplete'];
  $SD = $row['SDate'];
  $SDC = $row['SComplete'];
  
  $fluid2=$fluid / 30 * 100;
  $longMem2=$longMem / 20 * 100;
  $shortMem2=$shortMem / 14 * 100;
  $processing2=$processing / 96 * 100;
  
  }
?>
<div id="details">
<h1><? echo $displayName; ?></h1>
<h2>Database No: <? echo $databaseNumber ?></h2>
<p><strong>Cognitive Measures Date</strong>: <? echo $CMD ?></p>
<p><strong>Study Date</strong>: <? echo $SD ?></p>

<?php include ("participant_questions.php"); ?>
  </div>
  
  <div id="chart">
  <?
//Show Google Chart
  echo "<img src=\"http://chart.apis.google.com/chart?chxl=0:|Fluid|Processing|Short+Term|Long+Term|Net+Use|Net+Conf&chxt=x,y&chs=300x300&cht=r&chco=FF0000&chd=t:" . $fluid2. "," . $processing2. "," . $shortMem2. "," . $longMem2. "," . $intUsage. "," . $crystallized. "," . $fluid2. "&chdlp=l&chg=-1,0,0,4&chls=1.333&chm=B,FF000098,0,0,0&chtt=User+Details\" width=\"300\" height=\"300\" alt=\"User Details\" />";  
?>
<table id="detailstable">
	<tbody>
		<tr>
			<th>Fluid Intelligence</th>
			<td><? echo $fluid; ?> / 30</td>

		</tr>
		
		<tr>
			<th>Processing Speed</th>
			<td><? echo $processing; ?> / 96</td>
		</tr>
		<tr>
			<th>Short Term Memory</th>
			<td><? echo $shortMem; ?> / 14</td>
		</tr>
		<tr>
			<th>Long Term Memory</th>
			<td><? echo $longMem; ?> / 20</td>
		</tr>
		<tr>
			<th>Internet Usage</th>
			<td><? echo $intUsage; ?></td>
		</tr>
		<tr>
			<th>Internet Confidence</th>
			<td><? echo $crystallized; ?></td>

		</tr>
	</tbody>
</table>

<p><a href="edit_participant.php?id=<? echo $userID; ?>">Edit...</a></p>
</div>