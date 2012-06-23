<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<? $questionID=$_GET["qno"] ?>
<? $result = mysql_query("SELECT * FROM questions WHERE questionID = '".$questionID."'");
while($row = mysql_fetch_array($result))
  {

  $questionWebsite = $row['questionWebsite'];
  $questionText = $row['questionText'];
  $primaryNavigation = $row['primaryNavigation'];
  $secondaryNavigation = $row['secondaryNavigation'];
  $navPlacement = $row['navPlacement'];
  $navStructure = $row['navStructure'];
  $siteMap = $row['siteMap'];
  $breadcrumbs = $row['breadcrumbs'];
  $w3cvalidhtml = $row['w3cvalidhtml'];
  $w3cvalidcss = $row['w3cvalidcss'];
  $readability = $row['readability'];
  $searchbox = $row['searchbox'];
  }
?>
<div id="details">
<h2>Q<? echo $questionID ?>: <? echo $questionText; ?></h2>
<h3><a href="<? echo $questionWebsite; ?>"><? echo $questionWebsite; ?></a></h3>

  </div>
  
  <div id="chart">

<table id="detailstable">
	<tbody>
		<tr>
			<th>Primary Navigation</th>
			<td width="25%"><? echo $primaryNavigation; ?></td>

		</tr>
		<tr>
			<th>Secondary Navigation</th>
			<td><? echo $secondaryNavigation; ?></td>

		</tr>
		<tr>
			<th>Nav. Placement Consistancy</th>
			<td><? echo $navPlacement; ?></td>
		</tr>
		<tr>
			<th>Nav. Structure Consistancy</th>
			<td><? echo $navStructure; ?></td>
		</tr>
		</tbody>
		</table>
		</br>
		
		<table id="detailstable">
		<tbody>
		<tr>
			<th>Site Map</th>
			<td width="25%"><? echo $siteMap; ?></td>
		</tr>
		<tr>
			<th>Search Box</th>
			<td><? echo $searchbox; ?></td>
		</tr>
		<tr>
			<th>Breadcrumbs</th>
			<td><? echo $breadcrumbs; ?></td>
		</tr>
	</tbody>
</table>
</br>
		
		<table id="detailstable">
		<tbody>
		<tr>
			<th>Readability (Flesch Kincaid)</th>
			<td width="25%"><? echo $readability; ?></td>
		</tr>
		<tr>
			<th>W3C Valid HTML</th>
			<td><? echo $w3cvalidhtml; ?></td>
		</tr>
		<tr>
			<th>W3C Valid CSS</th>
			<td><? echo $w3cvalidcss; ?></td>
		</tr>
	</tbody>
</table>

<p><a href="edit_question.php?qno=<? echo $questionID; ?>">Edit...</a></p>
</div>