<? $userID=$_GET["id"] ?>
<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>



<div id="details">
<form name="participantform" action="insert_participant.php" method="post">
<h1>Participant Name: <input id="pname" type="text" name="pname" size="15" required /></h1>
<h2>Database No: <input id="pnumber" type="text" name="pnumber" size="3" /></h2>
<p><strong>Cognitive Measures Date</strong>: <input type="text" name="CMD" size="7" /></p>
<p><strong>Study Date</strong>: <input type="text" name="SD" size="7" /></p>
<p>Pre-populate Questions <input type="checkbox" name="prepop" value="yes" /></p>
  </div>
  
  <div id="chart">
  <?
//Show Google Chart
  echo "<img src=\"http://chart.apis.google.com/chart?chxl=0:|Fluid|Processing|Short+Term|Long+Term|Net+Use|Net+Conf&chxt=x,y&chs=300x300&cht=r&chco=FF0000&chd=t:0,0,0,0,0,0,0&chdlp=l&chg=-1,0,0,4&chls=1.333&chm=B,FF000098,0,0,0&chtt=User+Details\" width=\"300\" height=\"300\" alt=\"User Details\" />";  
?>
<table id="detailstable">
	<tbody>
		<tr>
			<th>Fluid Intelligence</th>
			<td><input type="text" name="fluid" size="3" /></td>

		</tr>
		
		<tr>
			<th>Processing Speed</th>
			<td><input type="text" name="processing" size="3" /></td>
		</tr>
		<tr>
			<th>Short Term Memory</th>
			<td><input type="text" name="shortmem" size="3" /></td>
		</tr>
		<tr>
			<th>Long Term Memory</th>
			<td><input type="text" name="longmem" size="3" /></td>
		</tr>
		<tr>
			<th>Internet Usage</th>
			<td><input type="text" name="intusage" size="3" /></td>
		</tr>
		<tr>
			<th>Internet Confidence</th>
			<td><input type="text" name="crystallized" size="3" /></td>

		</tr>
	</tbody>
</table>

<input type="submit" class="submitbutton" value="Submit">
</form>

</div>