<?php 
//MySQL Configuration
//DB Host (Normally 'localhost')
$dbhost = 'db418019806.db.1and1.com';
//DB Database Username
$dbusername = 'dbo418019806';
//DB Database User Password
$dbpassword = 'pass123!';
//DB Database Name
$dbname = 'db418019806';
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