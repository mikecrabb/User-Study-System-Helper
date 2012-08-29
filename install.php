
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
<h1>Usability Study System</h1>
<h2>Quick Setup</h2>
<ul id="nav">

</ul>
</header>

<div class="main_content">
<h1>Step 1:</h1>
<p>Open <strong>db_connect.php</strong> and put in your database details.</p>
<h1>Step 2:</h1>
<p>Fill in the below form:</p>


<form class="box2" name="participantform" action="install2.php" method="post">


<label>Main Account Username</label>
<input type="text" tabindex="1" name="username" required>
<label>Main Account Password</label>
<input type="password" tabindex="2" name="password" required>
<label>Study Title</label>
<input type="text" tabindex="3" name="study_title" required>
<label>Study Subtitle</label>
<input type="text" tabindex="4" name="study_sub" required>

<input type="submit" class="btnLogin2" value="Continue">
</form>

</div>



</body>