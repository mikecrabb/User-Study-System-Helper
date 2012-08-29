<?php
include ("db_connect.php");
include ("scripts/design_information.php");
?>
<!DOCTYPE html><!-- HTML 5 -->

<html dir="ltr" lang="en-US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name = "viewport" content = "user-scalable = no">
	<link rel="stylesheet" href="sitestyle.css" />
	<link rel="stylesheet" href="reset.css" />
</head>
<header class="mainheader">
<h1><? echo get_main_title(); ?></h1>
<h2><? echo get_sub_title(); ?></h2>
<ul id="nav">

</ul>
</header>

<div class="main_content">
<h1>Congratulations</h1>
<h2>All back end operations are now installed and you are ready to go</h2>
<p>Sorry it wasn't more difficult.</p></br>
<h3><a href="login.php">Go to login screen</a></h3>

</div>


</body>