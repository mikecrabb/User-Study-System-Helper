<? include ("header.php");
include ("db_connect.php");
?>
<div class="main_content">
<p class="warning"> Are you sure that you want to delete the following, all data attached to this will be also be deleted.</p>
<? $dataID=$_GET["id"];
$type=$_GET["type"];
switch ($type)
{
case 1:

$result = mysql_query("SELECT * FROM participant_data where data_ID = '". $dataID . "'");
break;

case 2:

$result = mysql_query("SELECT * FROM question_data where q_data_ID = '". $dataID . "'");
break;

case 3:

$result = mysql_query("SELECT * FROM participant where participant_ID = '". $dataID . "'");
break;

case 4:

$result = mysql_query("SELECT * FROM questions where questionID = '". $dataID . "'");
break;

case 5:

$result = mysql_query("SELECT * FROM systemusers where username = '". $dataID . "'");
break;
}


while($row = mysql_fetch_array($result))
{

switch ($type)
{
case 1:

echo "<p>This action will delete <strong>". $row['data_name'] . "</strong>.</p>";
echo "<p>Data description: ". $row['data_description'] . "</p>";
break;

case 2:

echo "<p>This action will delete <strong>". $row['q_data_name'] . "</strong>.</p>";
echo "<p>Data description: ". $row['q_data_description'] . "</p>";
break;

case 3:
echo "<p>This action will delete <strong>". $row['participant_name'] . "</strong>.</p>";
break;

case 4:
echo "<p>This action will delete <strong>". $row['questionText'] . "</strong>.</p>";
echo "<p>This action will delete <strong>". $row['questionWebsite'] . "</strong>.</p>";
break;

case 5:
echo "<p>This action will delete the system user account: <strong>". $row['userName'] . "</strong>.</p>";
break;

}



?>
<form action="final_delete_tag.php" method="post">
<input type="hidden" name="tagID" value="<? echo $dataID; ?>">
<input type="hidden" name="type" value="<? echo $type; ?>">
<input type="submit" class="submitbutton2" value="YES, delete this.">

</form>



<?



}
?>