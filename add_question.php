<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>


<div id="details">
<form name="questionform" action="insert_question.php" method="post">
<h2>Question Number: <input id="pnumber" type="text" name="questionNumber" size="5" required></h2>
<h2>Question: <input id="pnumber" type="text" name="questionText" size="40" required></h2>
<h3>Website: <input id="pweb" type="text" name="questionWebsite" size="20" required></h3>

  </div>
  
  <div id="chart">

<table id="detailstable">
	<tbody>
		<tr>
			<th>Primary Navigation</th>
			<td width="25%"><input type="text" name="primaryNav" size="5" /></td>

		</tr>
		<tr>
			<th>Secondary Navigation</th>
			<td><input type="text" name="secondaryNav" size="5" /></td>

		</tr>
		<tr>
			<th>Nav. Placement Consistancy</th>
			<td><input type="text" name="navPlacement" size="5" /></td>
		</tr>
		<tr>
			<th>Nav. Structure Consistancy</th>
			<td><input type="text" name="navConsistancy" size="5" /></td>
		</tr>
		</tbody>
		</table>
		</br>
		
		<table id="detailstable">
		<tbody>
		<tr>
			<th>Site Map</th>
			<td width="25%"><input type="text" name="siteMap" size="5" /></td>
		</tr>
		<tr>
			<th>Search Box</th>
			<td><input type="text" name="searchyBox" size="5" /></td>
		</tr>
		<tr>
			<th>Breadcrumbs</th>
			<td><input type="text" name="breadcrumbs" size="5" /></td>
		</tr>
	</tbody>
</table>
</br>
		
		<table id="detailstable">
		<tbody>
		<tr>
			<th>Readability (Flesch Kincaid)</th>
			<td width="25%"><input type="text" name="readability" size="5" /></td>
		</tr>
		<tr>
			<th>W3C Valid HTML</th>
			<td><input type="text" name="w3cvalidhtml" size="5" /></td>
		</tr>
		<tr>
			<th>W3C Valid CSS</th>
			<td><input type="text" name="w3cvalidcss" size="5" /></td>
		</tr>
	</tbody>
</table>
<input type="submit" class="submitbutton" value="Submit">
</div>