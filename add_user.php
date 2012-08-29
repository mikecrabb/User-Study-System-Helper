<?php
include ("db_connect.php");
//Initialise all variables
$checker=0;

//SQL injection protect fields
$password = mysql_real_escape_string($_POST["password"]);
$username = mysql_real_escape_string($_POST["username"]);
$passwordcheck = mysql_real_escape_string($_POST["passwordcheck"]);

//Check that a username has been entered
if ($username=="")
{
$checker=1;
}

//Check that a password has been entered
if ($password=="")
{
$checker=1;
}

//Check that a password has been entered
if ($passwordcheck=="")
{
$checker=1;
}

//check passwords match
if ($password!=$passwordcheck)
{
$checker=1;
}


//Check that username matches password
$result = mysql_query("SELECT * FROM systemusers WHERE username= '".$username."'");
while($row = mysql_fetch_array($result))
{
	$checker = 1;
}

//Page Redirect
header ("Location: $URL");
if ($checker==1)
{
$URL="manage_users.php?id=1";
}
else
{
$password = md5($password);
$URL="manage_users.php";
mysql_query("INSERT INTO systemusers (username,password) VALUES ('" . $username . "', '" . $password . "')");
}

header ("Location: $URL");
?>
