<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<? $result = mysql_query("TRUNCATE TABLE `currentStudy`"); ?>
<h3>Study Reset</h3>