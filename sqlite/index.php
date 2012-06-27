<?
echo "opening database connection<br/>";
include ("db_connect.php");
$participantID = $_GET["pid"];

$row = 1;
if (($handle = fopen("urls.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {    	
		//mysql_query("INSERT INTO urls ( urlid, url, userID) VALUES ('" . $data[0] . "', '" . $data[1] . "','" . $participantID . "')") ;
    }
    fclose($handle);
}
?>
</table>

<table border=1>
<tr>
<th>WebsiteID</th>
<th>Visit Time</th>
</tr>
<?php
$row = 1;
if (($handle = fopen("visits.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	//mysql_query("INSERT INTO visits ( urlID, visitTime, userID) VALUES ('" . $data[1] . "', '" . $data[2] . "','$participantID')") ;
    }
    fclose($handle);
}

echo "TOOL CURRENTLY DISABLED"
?>
</table>
