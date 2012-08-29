<?

function get_main_title ()
{
$result = mysql_query("SELECT * FROM system_info where variable ='main_title'");
while($row = mysql_fetch_array($result))
{
return $row['value'];
}
}

function get_sub_title ()
{
$result = mysql_query("SELECT * FROM system_info where variable = 'sub_title' ");
while($row = mysql_fetch_array($result))
{
return $row['value'];
}
}


?>