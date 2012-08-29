<?php
include ("db_connect.php");
include ("scripts/design_information.php");
$URL="login.php";
  session_start();
if(isset($_SESSION['username']))
{}
else
{header ("Location: $URL");}

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
<div class="info">Running on <strong>TESTBED</strong> database</div>
<header class="mainheader">
<h1><? echo get_main_title(); ?></h1>
<h2><? echo get_sub_title(); ?></h2>
<ul id="nav">
<li><a href="index.php">Home</a></li>
<li><a href="participants.php">Participants</a></li>
<li><a href="questions.php">Questions</a></li>
<li><a href="liveView.php">LiveView</a></li>
<li><a href="admin.php">Admin</a></li>
<li><a href="logout.php">Log Out</a></li>
</ul>
</header>
