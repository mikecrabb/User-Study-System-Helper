<?php
include ("db_connect.php");
//SQL injection protect fields
$password = mysql_real_escape_string($_POST["password"]);
$password = md5($password);
$userID = $_POST["userID"];

//Check that username matches password
$result = mysql_query("SELECT * FROM systemusers WHERE password= '".$password."'");
while($row = mysql_fetch_array($result))
{
	if ($password == $row['password'])
	{
	$checker=2;
	}
	else
	{
	$checker=1;
	}
}

//Page Redirect
$URL="index.php";
if ($checker==2)
{
$URL="showname.php?id=".$userID."&valid=M9wK6th8JN36DwFkmZ6tg8TPCUySwVhLC5TeaQqVexxV5GD7yCbPGA37WZDL2ac8";
}
header ("Location: $URL");
?>
