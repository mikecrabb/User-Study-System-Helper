<?php
  session_start();
unset($_SESSION['username']);

$URL="index.php";
header ("Location: $URL");
?>
<html>
<body>

</body>
</html>
