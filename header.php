<?php
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
</head>

<header>






<h1>UOASH<span id="number">2<span></h1>
<h2>Understanding Older Adults Search Habits <span id="number">2<span></h2>
<ul id="nav">
<li><a href="index.php">Home</a></li>
<li><a href="participants.php">Participants</a></li>
<li><a href="questions.php">Questions</a></li>
<li><a href="liveView.php">LiveView</a></li>
<li><a href="resetStudy.php">Reset Study</a></li>
<li><a href="insert_answers.php">Insert Answers</a></li>
<li><a href="export.php">Export Data</a></li>
<li><a href="logout.php">Log Out</a></li>
</ul>
</header>
