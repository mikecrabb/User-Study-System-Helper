<?php 
//MySQL Configuration
//DB Host (Normally 'localhost')
$dbhost = 'xxx';
//DB Database Username
$dbusername = 'xxx';
//DB Database User Password
$dbpassword = 'xxx';
//DB Database Name
$dbname = 'xxx';
//mysql_connect function
$conn=mysql_connect($dbhost, $dbusername, $dbpassword);
if(!$conn) :
   die('Could not connect: ' . mysql_error());
endif;
$db=mysql_select_db($dbname, $conn);
if(!$db) :
   die ('Cant connect to database : ' . mysql_error());
endif;
?>