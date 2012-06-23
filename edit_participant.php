<? $userID=$_GET["id"] ?>
<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>


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
  $databaseNumber = $row['userDatabaseNumber'];
  $CMD = $row['CMDate'];
  $CMC = $row['CMComplete'];
  $SD = $row['SDate'];
  $SDC = $row['SComplete'];
  }
?>

<div id="details">
<form name="participantform" action="edit_participant2.php" method="post">
<input type="hidden" name="userID" value="<? echo $userID ?>">
<h1>Participant Name: <input id="pname" type="text" name="pname" size="15" value="<? echo $userName ?>"/></h1>
<h2>Database No: <input id="pnumber" type="text" name="pnumber" size="3" value="<? echo $databaseNumber ?>"/></h2>
<p><strong>Cognitive Measures Date</strong>: <input type="text" name="CMD" size="7" value="<?echo $CMD ?>"/></p>
<p><strong>Study Date</strong>: <input type="text" name="SD" size="7" value="<?echo $SD ?>"/></p>

  </div>
  
  <div id="chart">
  <?
//Show Google Chart
  echo "<img src=\"http://chart.apis.google.com/chart?chxl=0:|Fluid|Processing|Short+Term|Long+Term|Net+Use|Net+Conf&chxt=x,y&chs=300x300&cht=r&chco=FF0000&chd=t:" . $fluid. "," . $processing. "," . $shortMem. "," . $longMem. "," . $intUsage. "," . $crystallized. "," . $fluid. "&chdlp=l&chg=-1,0,0,4&chls=1.333&chm=B,FF000098,0,0,0&chtt=User+Details\" width=\"300\" height=\"300\" alt=\"User Details\" />";   
?>
<table id="detailstable">
	<tbody>
		<tr>
			<th>Fluid Intelligence</th>
			<td><input type="text" name="fluid" size="3" value="<?echo $fluid ?>"/></td>

		</tr>
		
		<tr>
			<th>Processing Speed</th>
			<td><input type="text" name="processing" size="3" value="<?echo $processing ?>"/></td>
		</tr>
		<tr>
			<th>Short Term Memory</th>
			<td><input type="text" name="shortmem" size="3" value="<?echo $shortMem ?>"/></td>
		</tr>
		<tr>
			<th>Long Term Memory</th>
			<td><input type="text" name="longmem" size="3" value="<?echo $longMem ?>"/></td>
		</tr>
		<tr>
			<th>Internet Usage</th>
			<td><input type="text" name="intusage" size="3" value="<?echo $intUsage ?>"/></td>
		</tr>
		<tr>
			<th>Internet Confidence</th>
			<td><input type="text" name="crystallized" size="3" value="<?echo $crystallized ?>"/></td>

		</tr>
	</tbody>
</table>

<input type="submit" class="submitbutton" value="Submit">
</form>

</div>