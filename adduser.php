<?
include ("admin.php");
$result = mysql_query("SELECT * FROM systemusers");
?>
<table id="fancytable">
<tr><th>Name</th><th>Username</th><th>Change Password</th><th>Delete User</th></tr>
<?
while($row = mysql_fetch_array($result))
{
	echo "<tr><td>". $row['name'] . " </td><td>". $row['userName']  . "</td><td><img src=\"images/change_password.png\"></td><td><img src = \"images/cross.png\"></td></th>";
}		
?>
<tr><td colspan="2"><form name="input" action="add_user.php" method="post">
<input type="text" name="username" placeholder="username"/></td><td>
<input type="password" name="password" placeholder="password"/>
<input type="password" name="passwordcheck" placeholder="re-enter password"/></td><td>
<input class="submitbutton2" type="submit" value="Add User"/></td></tr>

</table>


</div>