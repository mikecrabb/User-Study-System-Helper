<?
include ("admin.php");
$result = mysql_query("SELECT * FROM systemusers");
?>
<table id="fancytable">
<tr><th>Name</th><th>Username</th><th>Change Password</th><th>Delete User</th></tr>
<?
while($row = mysql_fetch_array($result))
{
	echo "<tr><td>". $row['name'] . " </td><td>". $row['userName']  . "</td><td><img src=\"images/change_password.png\"></td><td><a href = \"delete_tag.php?type=5&id=". $row['userName']."\"><img src = \"images/cross.png\"></a></td></th>";
}		
?>
</table>
<p><a href="adduser.php">Add User…</a></p>