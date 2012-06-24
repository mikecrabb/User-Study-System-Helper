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
  $validhtml = $row['w3cvalidhtml'];
  $validcss = $row['w3cvalidcss'];
  $fleshkincaid = $row['fleshkincaid'];
  $searchbox = $row['searchbox'];
  $sentenceonpage = $row['sentenceonpage'];
  $wordsonpage = $row['wordsonpage'];
  $syllablesonpage = $row['syllablesonpage'];
  $wordspersentence = $row['wordspersentence'];
  $syllablesperword = $row['syllablesperword'];
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
			<th>Readability</th>
		</tr>
		<tr>
			<td>Sentences on Page</td>
			<td width="25%"><input type="text" name="sentenceonpage" size="5" value="<? echo $sentenceonpage ?>"/></td>
		</tr>
		<tr>
			<td>Words on Page</td>
			<td><input type="text" name="wordsonpage" size="5" value="<? echo $wordsonpage ?>"/></td>
		</tr>
		<tr>
			<td>Syllables on Page</td>
			<td><input type="text" name="syllablesonpage" size="5" value="<? echo $syllablesonpage ?>"/></td>
		</tr>
		<tr>
			<td>Avg. Words Per Sentence</td>
			<td><input type="text" name="wordspersentence" size="5" value="<? echo $wordspersentence ?>"/></td>
		</tr>
		<tr>
			<td>Avg. Syllables Per Word</td>
			<td><input type="text" name="syllablesperword" size="5" value="<? echo $syllablesperword ?>"/></td>
		</tr>
		<tr>
			<td>Flesh Kincaid Score</td>
			<td><input type="text" name="fleshkincaid" size="5" value="<? echo $fleshkincaid ?>"/></td>
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
			<td width="25%"><input type="text" name="primaryNavigation" size="5" value="<? echo $primaryNavigation ?>"/></td>
		</tr>
		<tr>
			<td>Secondary Navigation</td>
			<td><input type="text" name="secondaryNavigation" size="5" value="<? echo $primaryNavigation ?>"/></td>

		</tr>
		<tr>
			<td>Nav. Placement Consistency</td>
			<td><input type="text" name="navPlacement" size="5" value="<? echo $navPlacement ?>"/></td>
		</tr>
		<tr>
			<td>Nav. Structure Consistency</td>
			<td><input type="text" name="navStructure" size="5" value="<? echo $navStructure ?>"/></td>
		</tr>
		<tr>
			<td>Site Map Present</td>
			<td width="25%"><input type="text" name="sitemap" size="5" value="<? echo $sitemap ?>"/></td>
		</tr>
		<tr>
			<td>Search Box Present</td>
			<td><input type="text" name="searchbox" size="5" value="<? echo $searchbox ?>"/></td>
		</tr>
		<tr>
			<td>Breadcrumbs Present</td>
			<td><input type="text" name="breadcrumbs" size="5" value="<? echo $breadcrumbs ?>"/></td>
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
			<td td width="25%"><input type="text" name="validhtml" size="5" value="<? echo $validhtml ?>"/></td>
		</tr>
		<tr>
			<td>W3C Valid CSS</td>
			<td><input type="text" name="validcss" size="5" value="<? echo $validcss ?>"/></td>
		</tr>
	</tbody>
</table>

<input type="submit" class="submitbutton" value="Submit">
</div>