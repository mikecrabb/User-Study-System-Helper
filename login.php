<? include ("scripts/design_information.php"); ?>
<? include ("db_connect.php"); ?>
<!DOCTYPE html><!-- HTML 5 -->

<html dir="ltr" lang="en-US">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name = "viewport" content = "user-scalable = no">
		<link rel="stylesheet" href="reset.css" />
	<link rel="stylesheet" href="sitestyle.css" />
	
</head>


<body>


<form class="box login" action="checklogin.php" method="post">

	<fieldset class="boxBody">
	<h1><? echo get_main_title(); ?></h1>
	<h2><? echo get_sub_title(); ?></h2>
	  <label>Username</label>
	  <input type="text" tabindex="1" name="username" required>
	  <label>Password</label>
	  <input type="password" tabindex="2" name="password" required>
	</fieldset>
	<footer>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
	
	<? $log = $_GET["log"]; if ($log==1) { ?> <div class="error">Incorrect login details provided</div> <? } ?>
</form>




</body>