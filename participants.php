<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<? $order=$_GET["order"]; ?>
<table id="participanttable">
	<thead>
		<th>Participant Name</th>
		<th>User ID</th>
		<th>Database Number</th>
		<th>Gf<a href="participants.php?order=1"><img src="images/up.png"></a><a href="participants.php?order=2"><img src="images/down.png"></a></th>
		<th>Ps<a href="participants.php?order=3"><img src="images/up.png"></a><a href="participants.php?order=4"><img src="images/down.png"></a></th>
		<th>Gsm<a href="participants.php?order=5"><img src="images/up.png"></a><a href="participants.php?order=6"><img src="images/down.png"></a></th>
		<th>Glr<a href="participants.php?order=7"><img src="images/up.png"></a><a href="participants.php?order=8"><img src="images/down.png"></a></th>
		<th>iU<a href="participants.php?order=9"><img src="images/up.png"></a><a href="participants.php?order=10"><img src="images/down.png"></a></th>
		<th>iC<a href="participants.php?order=11"><img src="images/up.png"></a><a href="participants.php?order=12"><img src="images/down.png"></a></th>
	</thead>
	<tbody>
	
<? 
switch ($order)
{
case 1:
  $result = mysql_query("SELECT * FROM participants ORDER BY fluidLevel ASC");
  break;
case 2:
  $result = mysql_query("SELECT * FROM participants ORDER BY fluidLevel DESC");
  break;
case 3:
  $result = mysql_query("SELECT * FROM participants ORDER BY processingSpeed ASC");
  break;
case 4:
  $result = mysql_query("SELECT * FROM participants ORDER BY processingSpeed DESC");
  break;
  case 5:
  $result = mysql_query("SELECT * FROM participants ORDER BY shortMemory ASC");
  break;
case 6:
  $result = mysql_query("SELECT * FROM participants ORDER BY shortMemory DESC");
  break;
  case 7:
  $result = mysql_query("SELECT * FROM participants ORDER BY longMemory ASC");
  break;
case 8:
  $result = mysql_query("SELECT * FROM participants ORDER BY longMemory DESC");
  break;
  case 9:
  $result = mysql_query("SELECT * FROM participants ORDER BY intUsage ASC");
  break;
case 10:
  $result = mysql_query("SELECT * FROM participants ORDER BY intUsage DESC");
  break;
  case 11:
  $result = mysql_query("SELECT * FROM participants ORDER BY crystallizedlevel ASC");
  break;
case 12:
  $result = mysql_query("SELECT * FROM participants ORDER BY crystallizedLevel DESC");
  break;
default:
  $result = mysql_query("SELECT * FROM participants ORDER BY userID ASC");
}

//$result = mysql_query("SELECT * FROM participants ORDER BY '" . $value . "' ASC");
while($row = mysql_fetch_array($result))
  {
  $id = $row['userID'];
  $name = $row['userName'];
  $displayedname = "xxxxxx";
  $namelength = strlen($name);
  $databaseno = $row['userDatabaseNumber'];
  $CMD = $row['CMDate'];
  $CMC = $row['CMComplete'];
  $SD = $row['SDate'];
  $SDC = $row['SComplete'];
  $fluid = $row['fluidLevel'];
  $intConf = $row['crystallizedLevel'];
  $processing = $row['processingSpeed'];
  $shortMem = $row['shortMemory'];
  $longMem = $row['longMemory'];
  $intUsage = $row['intUsage'];

?>		
		<tr>
			<td><a href="participant_details.php?id=<? echo $id; ?>"><? echo $displayedname ; ?></a></td>
			<td><? echo $id ; ?></td>
			<td><? echo $databaseno ; ?></td>
			<td><? echo $fluid ; ?></td>
			<td><? echo $processing ; ?></td>
			<td><? echo $shortMem ; ?></td>
			<td><? echo $longMem ; ?></td>
			<td><? echo $intUsage ; ?></td>
			<td><? echo $intConf ; ?></td>


		</tr>
<? } ?>
	</tbody>
</table>
<p><a href="new_participant.php">Add Participant...</a></p>