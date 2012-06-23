<? $questionID=$_GET["qno"] ?>

<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>

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
<form name="questionform" action="edit_question2.php" method="post">
<input name="questionNumber" type="hidden" value="<? echo $questionID ?>">
<h2>Question: <input id="pnumber" type="text" name="questionText" size="40" value="<? echo $questionText ?>" required></h2>
<h3>Website: <input id="pweb" type="text" name="questionWebsite" size="20" value="<? echo $questionWebsite ?>" required></h3>

  </div>
  
  <div id="chart">

<table id="detailstable">
	<tbody>
		<tr>
			<th>Primary Navigation</th>
			<td width="25%"><input type="text" name="primaryNav" size="5" value="<? echo $primaryNavigation ?>"/></td>

		</tr>
		<tr>
			<th>Secondary Navigation</th>
			<td><input type="text" name="secondaryNav" size="5" value="<? echo $secondaryNavigation ?>"/></td>

		</tr>
		<tr>
			<th>Nav. Placement Consistancy</th>
			<td><input type="text" name="navPlacement" size="5" value="<? echo $navPlacement ?>"/></td>
		</tr>
		<tr>
			<th>Nav. Structure Consistancy</th>
			<td><input type="text" name="navConsistancy" size="5" value="<? echo $navStructure ?>"/></td>
		</tr>
		</tbody>
		</table>
		</br>
		
		<table id="detailstable">
		<tbody>
		<tr>
			<th>Site Map</th>
			<td width="25%"><input type="text" name="siteMap" size="5" value="<? echo $siteMap ?>"/></td>
		</tr>
		<tr>
			<th>Search Box</th>
			<td><input type="text" name="searchyBox" size="5" value="<? echo $searchbox ?>"/></td>
		</tr>
		<tr>
			<th>Breadcrumbs</th>
			<td><input type="text" name="breadcrumbs" size="5" value="<? echo $breadcrumbs ?>"/></td>
		</tr>
	</tbody>
</table>
</br>
		
		<table id="detailstable">
		<tbody>
		<tr>
			<th>Readability (Flesch Kincaid)</th>
			<td width="25%"><input type="text" name="readability" size="5" value="<? echo $readability ?>" /></td>
		</tr>
		<tr>
			<th>W3C Valid HTML</th>
			<td><input type="text" name="w3cvalidhtml" size="5" value="<? echo $w3cvalidhtml ?>"/></td>
		</tr>
		<tr>
			<th>W3C Valid CSS</th>
			<td><input type="text" name="w3cvalidcss" size="5" value="<? echo $w3cvalidcss ?>"/></td>
		</tr>
	</tbody>
</table>
<input type="submit" class="submitbutton" value="Submit">
</div>