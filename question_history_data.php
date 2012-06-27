<?php include ("db_connect.php");
$blank = $_POST['blank'];
$userID = $_POST['userID'];
$webaddress = $_POST['webaddress'];

if (!empty($webaddress))
{
$pid[1]=10;
$pid[2]=15;
$pid[3]=16;
$pid[4]=1001;
$pid[5]=1002;
$x2=1;
$y2=6;
while ($x2<$y2)
{
echo "Participant " . $pid[$x2] . "<br/>";
$result = mysql_query("SELECT * FROM participant_data WHERE url like '%" . $webaddress ."%' and userID = '" . $pid[$x2] . "' ORDER BY visitTime ASC");
$x = 0;
while($row = mysql_fetch_array($result))
  {
  $url[$x] = $row['url'];
  $visitTime[$x] = $row['visitTime'];
  $x++;
  }
$y=0;
$z=1;  
echo "<table border = 1>";
$totaltime=0;
while($y < $x)
{
$timeonpage[$y] = $visitTime[$z] - $visitTime[$y];
  echo "<tr>";
  echo "<td>" . $url[$y] . "</td>"; 

  if ($y+1==$x)
  {
      echo "<td> Total Time: ". round($totaltime/1000000, 2) . "s</td>";
  }
  else
  {
    $totaltime= $totaltime + $timeonpage[$y];
    echo "<td>" . round($timeonpage[$y]/1000000, 2) . "</td>";
  }

  echo "</tr>";
  $y++;
  $z++;
  }
  
 echo "</table>";
 $x2++;
 }
$counter = mysql_query("SELECT DISTINCT `userID` FROM `participant_data` WHERE url like '%" . $webaddress ."%'");
$part_number = 0;
while($row = mysql_fetch_array($counter))
{
$part_number++;
}
echo "A total of " . $part_number . " participants answered this question</br>";
}
?>
<form name="input" action="question_history_data.php" method="post">
User ID: <input type="text" name="userID" />
Web Address: <input type="text" name="webaddress" />
<input type="submit" value="Submit" />
</form>

