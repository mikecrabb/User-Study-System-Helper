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
</ul>
</header>
<body>
<h3>Login</h3>

<? 
$log = $_GET["log"];
if ($log==1)
				{
				?>
				<div class="error">Incorrect login details provided</div>
				<?
				}

				?>
<form name="login table" action="checklogin.php" method="post">
<table id="detailstable">
	<tbody>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"/></td>

		</tr>
		
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"/></td>
		</tr>
		</tbody>
</table>

<input type="submit" class="submitbutton2" value="Submit">

</body>