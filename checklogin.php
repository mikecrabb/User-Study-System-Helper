<?php
//Start Session and database connection
session_start();
unset($_SESSION['username']);
include ("db_connect.php");

//Initialise all variables
$checker=0;

//SQL injection protect fields
$password = mysql_real_escape_string($_POST["password"]);
$username = mysql_real_escape_string($_POST["username"]);
$password = md5($password);
if ($username=="")
{
$checker=1;
}

//Check that a password has been entered
if ($password=="")
{
$checker=1;
}

//Check that username matches password
$result = mysql_query("SELECT * FROM systemusers WHERE userName= '".$username."'");
while($row = mysql_fetch_array($result))
{
$checker=1;
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
header ("Location: $URL");
if ($checker==1)
{
$URL="login.php?log=1";
}
elseif ($checker==2)
{
	$_SESSION['username']=$username;
	$URL="index.php";
}
header ("Location: $URL");
?>
