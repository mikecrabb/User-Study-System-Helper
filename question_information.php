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
  $sitemap = $row['siteMap'];
  $breadcrumbs = $row['breadcrumbs'];
  $w3cvalidhtml = $row['w3cvalidhtml'];
  $w3cvalidcss = $row['w3cvalidcss'];
  $fleshkincaid = $row['fleshkincaid'];
  $searchbox = $row['searchbox'];
  $sentenceonpage = $row['sentenceonpage'];
  $wordsonpage = $row['wordsonpage'];
  $syllablesonpage = $row['syllablesonpage'];
  $wordspersentence = $row['wordspersentence'];
  $syllablesperword = $row['syllablesperword'];
  $divs = $row['divs'];
  $images = $row['images'];
  $links = $row['links'];
  $linkdensity = $row['linkdensity'];
  $accessibilitymention = $row['accessibilitymention'];
  }
?>
<div id="details">
<h2>Q<? echo $questionID ?>: <? echo $questionText; ?></h2>
<h3><a href="<? echo $questionWebsite; ?>"><? echo $questionWebsite; ?></a></h3>

<?php include ("question_data.php"); ?>

  </div>
  
  <div id="chart">

<table id="detailstable">
	<tbody>
		<tr>
			<th>Readability</th>

		</tr>
		<tr>
			<td>Sentences on Page</td>
			<td width="25%"><? echo $sentenceonpage; ?></td>
		</tr>
		<tr>
			<td>Words on Page</td>
			<td><? echo $wordsonpage; ?></td>
		</tr>
		<tr>
			<td>Syllables on Page</td>
			<td><? echo $syllablesonpage; ?></td>
		</tr>
		<tr>
			<td>Avg. Words Per Sentence</td>
			<td><? echo $wordspersentence; ?></td>
		</tr>
		<tr>
			<td>Avg. Syllables Per Word</td>
			<td><? echo $syllablesperword; ?></td>
		</tr>
		<tr>
			<td>Flesh Kincaid Score</td>
			<td><? echo $fleshkincaid; ?></td>
		</tr>
		</tbody>
		</table>
		<br/>

<table id="detailstable">
	<tbody>
	<tr>
			<th>Navigation Structure</th>
		</tr>
		<tr>
			<td>Primary Navigation</td>
			<td width="25%"><? echo $primaryNavigation; ?></td>
		</tr>
		<tr>
			<td>Secondary Navigation</td>
			<td><? echo $secondaryNavigation; ?></td>

		</tr>
		<tr>
			<td>Nav. Placement Consistency</td>
			<td><? echo $navPlacement; ?></td>
		</tr>
		<tr>
			<td>Nav. Structure Consistency</td>
			<td><? echo $navStructure; ?></td>
		</tr>
		<tr>
			<td>Site Map Present</td>
			<td width="25%"><? if ($sitemap == 1){ echo "Yes";}if ($sitemap == '0'){echo "No";} ?></td>
		</tr>
		<tr>
			<td>Search Box Present</td>
			<td><? if ($searchbox == 1){ echo "Yes";}if ($searchbox == '0'){echo "No";} ?></td>
		</tr>
		<tr>
			<td>Breadcrumbs Present</td>
			<td><? echo $breadcrumbs; ?></td>
		</tr>
		</tbody>
		</table>
		<br/>

		<table id="detailstable">
		<tbody>
		<tr>
			<th>Page Metrics</th>
		</tr>
		<tr>
			<td>DIVS on page</td>
			<td td width="25%"><? echo $divs; ?></td>
		</tr>
		<tr>
			<td>Images on page</td>
			<td><? echo $images; ?></td>
		</tr>
		<tr>
			<td>Links on page</td>
			<td><? echo $links; ?></td>
		</tr>
		<tr>
			<td>Link Density</td>
			<td><? echo $linkdensity; ?></td>
		</tr>
		<tr>
			<td>Accessibility Mentioned</td>
			<td><? if ($accessibilitymention == 1){ echo "Yes";}if ($accessibilitymention == '0'){echo "No";} ?></td>
		</tr>
	</tbody>
</table>
<br/>
		
		<table id="detailstable">
		<tbody>
		<tr>
			<th>Validity</th>
		</tr>
		<tr>
			<td>W3C Valid HTML</td>
			<td td width="25%"><? if ($w3cvalidhtml == 1){ echo "Yes";}if ($w3cvalidhtml == '0'){echo "No";} ?></td>
		</tr>
		<tr>
			<td>W3C Valid CSS</td>
			<td><? if ($w3cvalidcss == 1){ echo "Yes";}if ($w3cvalidcss == '0'){echo "No";} ?></td>
		</tr>
	</tbody>
</table>

<p><a href="edit_question.php?qno=<? echo $questionID; ?>">Edit...</a>

<form name="autofillform" action="question_autofill.php" method="post" >
<input name="questionID" type="hidden" value="<? echo $questionID ?>">
<input type="submit" class="submitbutton" value="AutoFill"></p>
</div>